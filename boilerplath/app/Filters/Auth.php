<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
       
        if(is_null(session()->get('logged_in'))|| is_null(session()->get('user_id'))){
            // maka redirct ke halaman login
           
            return redirect()->to('/login'); 
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    
    }
}