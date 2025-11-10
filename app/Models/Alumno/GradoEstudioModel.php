<?php
namespace App\Models\Alumno;

use CodeIgniter\Model;

class GradoEstudioModel extends model {

    protected $table          = 'grados_estudio';
    protected $primaryKey     = 'idGrado';
    protected $allowedFields  = ['nombre','nivel','activo'];
    protected $returnType     = 'array';
}