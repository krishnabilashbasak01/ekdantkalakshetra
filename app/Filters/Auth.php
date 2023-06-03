<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class  Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            // if (session()->get('user_type') == 'admin'){
            return redirect()->to('admin/sign-in');
            // }else{

            // }

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //         TODO: Implement after() method.
    }
}
