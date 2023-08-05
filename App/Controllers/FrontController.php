<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class FrontController extends Controller {


    public function home() {
        //Aquí obtenemos los datos de la base de datos (CONTROLADOR llama al MODELO)
        $manualModel = new Manual;
        $manuals = $manualModel->getAll();
        //Aquí se la enviamos a la vista para que su renderizado mediante PLATES (CONTROLADOR lo envía a la VISTA)
        echo $this->templates->render('sections/home', [
            'manuals' => $manuals,
        ]);
    }

    public function error404() {
        echo $this->templates->render('sections/404');
      }
    
    
    public function otraCarpeta() {
        echo $this->templates->render('sections/otra');
    }

    public function producto($id) {
        echo $this->templates->render('sections/producto', [
        'id' => $id
        ]);
    }
}