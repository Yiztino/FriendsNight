<?php
include("conexion.php");

// Validar y escapar datos del formulario
$nombre = mysqli_real_escape_string($conexion, $_POST['Nombre']);
$genero = mysqli_real_escape_string($conexion, $_POST['Genero']);
$sinopsis = mysqli_real_escape_string($conexion, $_POST['Sinopsis']);
$linkTrailer = mysqli_real_escape_string($conexion, $_POST['LinkTrailer']);

// Protección de carga de archivos
if ($_FILES['Imagen']['error'] === 0) {
    $allowedTypes = ['image/jpeg', 'image/png']; // Tipos de archivo permitidos
    $maxFileSize = 2 * 1024 * 1024; // Tamaño máximo permitido (en este caso, 2 MB)

    if (in_array($_FILES['Imagen']['type'], $allowedTypes) && $_FILES['Imagen']['size'] <= $maxFileSize) {
        $imagen = mysqli_real_escape_string($conexion, file_get_contents($_FILES['Imagen']['tmp_name']));
    } else {
        echo "El tipo de archivo o el tamaño no son válidos.";
        exit;
    }
} else {
    echo "Error al cargar la imagen.";
    exit;
}

// Consulta preparada para la inserción de datos
$query = "INSERT INTO imagenes(nombre, imagen, genero, sinopsis, linkTrailer) VALUES(?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "sssss", $nombre, $imagen, $genero, $sinopsis, $linkTrailer);

if (mysqli_stmt_execute($stmt)) {
    echo "Se guardó la imagen, el género, la sinopsis y el enlace del tráiler.";
} else {
    echo "No se guardó la información.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
