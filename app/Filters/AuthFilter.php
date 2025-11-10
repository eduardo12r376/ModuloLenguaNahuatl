<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
           // if ($request->uri->getPath() !== 'login') {
          /*  echo '<pre>';
            print_r('Entro');
            echo '</pre>';
            exit;
        */
                return redirect()->to(base_url('login'))
                    ->with('error', 'Debes iniciar sesión para acceder al modulo.');
          //  }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
