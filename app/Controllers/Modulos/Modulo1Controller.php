<?php
namespace App\Controllers\Modulos;

use App\Controllers\BaseController;

class Modulo1Controller extends BaseController{
    
    public function index(){
        return view('modules\mod1');
    }
}