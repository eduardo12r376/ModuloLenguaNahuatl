<?php
namespace App\Controllers;

use App\Models\Auth\LoginModel;

class LoginAlumnoController extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    public function login()
    {

        if ($this->request->getMethod() == 'POST') {

            $rules = [
                'matricula'    => 'required|min_length[1]|max_length[11]',
                'password' => 'required|min_length[8]|max_length[255]|validateAlumno[email,password]',
            ];

            $errors = [

                'password' => [
                    'validateAlumno' => "Correo o contraseña incorrectos",
                ],

            ];
        /*
            echo '<pre>';
            print_r($this->validate($rules, $errors));
            echo '</pre>';
            exit;
        */
            if (! $this->validate($rules, $errors)) {

                return redirect()->to(base_url('login'))->with('error', 'Matrícula o contraseñas incorrectos.');
            }

            $model  = new LoginModel();
            $alumno = $model->where('matricula', $this->request->getVar('matricula'))->first();
            
            if ($this->setAlumnoSession($alumno)) {
                return redirect()->to(base_url('/'))->with('success', '¡Inicio de sesión exitoso!');
            } else {
               return redirect()->to(base_url('login'))->with('error', 'Correo o contraseñas incorrectos.');
            }

        }

        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));

        }
        return view('auth/login');
    }

    private function setAlumnoSession($alumno)
    {
        $data = [
            'idAlumno'        => $alumno['idAlumno'],
            'nombre'          => $alumno['nombre'],
            'apellidoPaterno' => $alumno['apellidoPaterno'],
            'apellidoMaterno' => $alumno['apellidoMaterno'],
            'email'           => $alumno['email'],
            'isLoggedIn'      => true,
            'telefono'        => $alumno['telefono'],
            'matricula'       => $alumno['matricula'],
            'idGrado'         => $alumno['idGrado'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        if (session()->get('isLoggedIn')) {
            session()->destroy();
            return redirect()->to(base_url('/'));
        }
        /*
        if (session()->get('isLoggedIn') && session()->get('tipoUsuario') == 'operador'){
            session()->destroy();
            return redirect()->to(base_url('login'));
        }
        */
    }

}
