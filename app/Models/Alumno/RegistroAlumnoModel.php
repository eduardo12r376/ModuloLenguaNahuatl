<?php
namespace App\Models\Alumno;

use CodeIgniter\Model;

class RegistroAlumnoModel extends Model
{
    protected $table            = 'alumnos';
    protected $primaryKey       = 'idAlumno';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'password',
        'email',
        'telefono',
        'idGrado',
        'enabledFlag',
        'matricula', 'ATRIBUTE2', 'ATRIBUTE3', 'ATRIBUTE4', 'ATRIBUTE5',
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_en';
    protected $updatedField  = 'actualizado_en';
    protected $deletedField  = 'eliminado_en';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

}
