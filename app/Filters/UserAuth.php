<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class  UserAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLogIn')) {
            return redirect()->to('/sign-in');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
//         TODO: Implement after() method.
    }
}