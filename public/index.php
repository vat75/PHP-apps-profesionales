<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spagheti</title>
</head>
<body>
    <h1>Spagheti PHP!!</h1>
    <?php
    //Necesario para cargar las dependencias
    require '../vendor/autoload.php';
    //Libreria "Carbon" para generar fechas
    use Carbon\Carbon;
    //Uso de mi propio espacio de nombres para no entrar en coflicto con las dependencias
    use Lib\Breadcrumbs;
    //Uso de mi ADAPTADOR
    use Lib\Dates;
    //Uso templates
    use League\Plates\Engine;

    $templates = new Engine('../views');

    //Utilizamos los métodos de la clase Carbon de la libreria para generar fecha 
    //del día de mañana
    $date = Carbon::now();
    echo $date->format('Y');

    Carbon::setlocale('es');
    $today = Carbon::now();
    $tomorrow = $today->addDay(1);
    echo $tomorrow->isoFormat(' dddd DD [de] MMMM');

    //Hacemos uso de nuestro archivo de libreria "Breadcrumbs.php" creada por nosotros para 
    //mostrar la ruta
    //include 'Lib/Dates.php'; (YA NO ME HACE FALTA AL HACER EL AUTOLOAD EN "composer.json")
    //Hacemos uso de nuestro archivo de libreria "Dates.php" creada por nosotros para 
    //mostrar el codigo html con PHP embebido usando funciones del ADAPTADOR (*)
    //include 'Lib/Breadcrumbs.php'; (YA NO ME HACE FALTA AL HACER EL AUTOLOAD EN "composer.json")

    $scrumbs = new Breadcrumbs();
    $scrumbs->add('/link', 'Seccion');
    $scrumbs->show();
    ?>
    
    <p>
    Con PHP es fácil hacer Spaghetti Code y mezclar la presentación, el HTML con código PHP, lo que produce diversos problemas, afectando seriamente a la mantenibilidad de los proyectos.
    </p>
    <p>
    Pero en 
    <?= Dates::longDate(Dates::tomorrow()) ?> 
    lo vamos a solucionar.
    </p>

    <?= $templates->render('template-test', [
        'subtitle' => 'Bienvenidos a EscuelaIT'
    ]); ?>
</body>
</html>