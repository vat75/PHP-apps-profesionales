    <?php

    //Necesario para cargar las dependencias
    require '../vendor/autoload.php';

    //Creamos el objeto router una vez instalado el sistema de routung
    $router = new Altorouter();
    //Creamos las distintas rutas con el controlador FrontController con el método(#)home
    $router->map('GET','/','FrontController#home','home');
    $router->map( 'GET', '/otra/carpeta', 'FrontController#otraCarpeta' );
    $router->map( 'GET', '/producto/[i:id]', 'FrontController#producto' );
    
    //Hay que comprobar si la ruta a la que redireccionamos arriba, EXISTE
    //Con los metodos de error 404
    $match = $router->match();

    if ($match === false) {
        open404Error();
    } else {
        callController($match);
    }

    function open404Error() {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        $controllerObject = new App\Controllers\FrontController;
        $controllerObject->error404();
      }

      //Si la ruta EXISTE y es correcta llamamos a la función callController
      function callController($match) {
        //La funcion list mete el array del target, una variable en controller y la otra en action
        list( $controller, $action ) = explode( '#', $match['target'] );
          $controller = 'App\\Controllers\\' . $controller;
          if ( method_exists($controller, $action)) {
              $controllerObject = new $controller;
              call_user_func_array(array($controllerObject,$action), $match['params']);
          } else {
              open404Error();
          }
      }