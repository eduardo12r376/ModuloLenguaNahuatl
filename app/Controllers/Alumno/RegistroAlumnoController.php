<?php
namespace App\Controllers\Alumno;

use App\Controllers\BaseController;
use App\Models\Alumno\GradoEstudioModel;
use App\Models\Alumno\RegistroAlumnoModel;

class RegistroAlumnoController extends BaseController
{

    private $registroAlumnoModel;

    public function __construct()
    {
        $this->registroAlumnoModel = new RegistroAlumnoModel;
    }
    // CARGAR FORMULARIO DE REGISTRO
    public function index()
    {
        $gradoModel       = new GradoEstudioModel();
        $grados['grados'] = $gradoModel->where('activo', 1)->findAll();

        return view('alumno/registro', $grados);
    }

    public function create()
    {

        $data = [
            'nombre'          => mb_strtoupper(trim($this->request->getVar('nombre')), 'UTF-8'),
            'apellidoPaterno' => mb_strtoupper(trim($this->request->getVar('apellidoPaterno')), 'UTF-8'),
            'apellidoMaterno' => mb_strtoupper(trim($this->request->getVar('apellidoMaterno')), 'UTF-8'),
            'email'           => $this->request->getVar('email'),
            'telefono'        => $this->request->getVar('telefono'),
            'password'        => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'matricula'       => $this->request->getVar('matricula'),
            'idGrado'         => $this->request->getVar('idGrado'),
        ];

        $rules = [
            'nombre'           => 'required|regex_match[/^[a-zA-ZÁÉÍÓÚáéíóúÜüñÑ\s]+$/]',
            'apellidoPaterno'  => 'required|regex_match[/^[a-zA-ZÁÉÍÓÚáéíóúÜüñÑ\s]+$/]',
            'apellidoMaterno'  => 'required|regex_match[/^[a-zA-ZÁÉÍÓÚáéíóúÜüñÑ\s]+$/]',
            'password'         => 'required|min_length[8]|max_length[30]',
            'email'            => 'required|valid_email|is_unique[alumnos.email]',
            'telefono'         => 'required|numeric|exact_length[10]',
            'password_confirm' => 'matches[password]',
            'matricula'        => 'required|numeric|exact_length[11]|is_unique[alumnos.matricula]',
        ];

        if (! $this->validate($rules)) {
            // Guardar los errores en flashdata para mostrar en el modal
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->registroAlumnoModel->insert($data);

        return redirect()->to(base_url('login'))->with('success', 'Registro completado correctamente');
    }
}
