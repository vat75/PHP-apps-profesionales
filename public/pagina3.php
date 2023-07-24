<?php
    //Necesario para cargar las dependencias
    require '../vendor/autoload.php';
    //Uso templates
    use League\Plates\Engine;

    $templates = new Engine('../views');

    echo $templates->render('pagina3');