<?php
namespace App\Controllers\Modulos;

use App\Controllers\BaseController;

class Modulo2Controller extends BaseController{
    
    public function index(){
        return view('modules/mod2');
    }
}