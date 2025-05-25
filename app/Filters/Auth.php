<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if (session()->get('user_id')) {
        // session()->set('logged_in', TRUE);
        // }
        //   if (!session()->get('user_id')) {
        //   return redirect()->to('/login')->with('error', 'You must log in first.');
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
