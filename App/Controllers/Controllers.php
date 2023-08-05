<?php
//Cramos un archivo base controlador para no repetir esta estaructura en todos los controladores
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class FrontController {

    private $templates;
    //Constructor de los controladores que permite crear un nuevo objeto ENGINE
    public function __construct() {
        $this->templates = new Engine('../views');
      }

 
}