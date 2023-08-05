        <?php
    
        //Necesario para cargar las dependencias
        require '../vendor/autoload.php';

        //Aquí hacemos uso de las variables de entorno instaladas por previamente con composer
        use Dotenv\Dotenv;

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
    
        //Creamos el objeto router una vez instalado el sistema de routung
        $router = new Altorouter();
        //Creamos las distintas rutas con el controlador FrontController con el método(#)home
        $router->map('GET','/','FrontController#home','home');
        $router->map( 'GET', '/otra/carpeta', 'FrontController#otraCarpeta' );
        $router->map( 'GET', '/producto/[i:id]', 'FrontController#producto' );
        //Las rutas de editar aconseja ponerlas antes de las dos dos posteriores de manuales
        $router->map( 'GET', '/manuales/[*:slug]/editar', 'ManualController#edit' );
        $router->map( 'POST', '/manuales/[*:slug]/editar', 'ManualController#edit' );
        //Creamos nueva ruta para acceder a los manuales con un nuevo controlador "ManualController" 
        //que tenemos que crear
        $router->map( 'GET', '/manuales/[*:slug]', 'ManualController#single' );
        //Nueva ruta para buscar manueales
        $router->map( 'POST', '/manuales/buscar', 'ManualController#search' );
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
  