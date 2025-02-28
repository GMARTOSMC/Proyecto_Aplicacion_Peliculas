<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL); 

// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="La próxima película de Marvel">
    <title>La próxima película de Marvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-white">

    <header class="text-center mt-5">
        <h1>La próxima película de Marvel</h1>
    </header>

    <main class="container text-center mt-5">
        <section id="daredevil" class="d-flex justify-content-center">
           <img src="<?= $data["poster_url"]; ?>" class="img-fluid rounded" width="300" alt="Poster de <?= $data["title"]; ?>" />
        </section>

        <hgroup id="info" class="mt-4">
            <h3 class="my-2"> <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
            <h3 class="my-2">Fecha de Estreno: <?= $data["release_date"]; ?></h3>
            <h3 class="my-2">Reseña: <?= $data["overview"]; ?></h3>
        </hgroup>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
