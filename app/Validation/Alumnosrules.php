<?php
namespace App\Validation;

use App\Models\Auth\LoginModel;

class Alumnosrules
{
    public function validateAlumno(string $str, string $fields, array $data): bool
    {
       
        $model = new LoginModel();
        $alumno = $model->where('matricula', $data['matricula'])->first();
        
        if (!$alumno || !password_verify($data['password'], $alumno['password'])) {
            return false; // No existe el correo
        }

        return true;
    }
}