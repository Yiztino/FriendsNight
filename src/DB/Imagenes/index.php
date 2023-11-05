<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriendsNight</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content-wrapper">
        <h1>Friends Night</h1>
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="Nombre" placeholder="Nombre..." value=""/>
            <select name="Genero">
                <option value="Accion">Accion</option>
                <option value="Romance">Romance</option>
                <option value="Comedia">Comedia</option>
            </select>
            <input type="file" name="Imagen"/>
            <textarea name="Sinopsis" placeholder="Escribe la sinopsis de la película..." rows="4" cols="50"></textarea>
            <input type="text" name="LinkTrailer" placeholder="Enlace del tráiler..." value=""/>
            <input type="submit" value="Aceptar">
        </form>
    </div>
</body>
</html>