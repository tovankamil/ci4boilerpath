<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Controllers\Utils;
class Admin_login extends Controller
{
    public function index()
    {
        helper(['form']);
        $model = new AdminModel();
        echo view('admin/login');
    }

     function auth()
    {
        $session = session();
        $model = new AdminModel();
        $utils = new Utils();
        $username = trim($utils->anti_injection(addslashes( $this->request->getVar('username'))));
        $password = trim($utils->anti_injection(addslashes($this->request->getVar('password'))));//Password tidak boleh menggunakan spasi
         $data = $model->where('username', $username)->first();

        if($data){
            $pass = $data['password_hash'];
            $verify_pass = password_verify($password, $pass);

             if($verify_pass)
             {

                $ses_data = [
                    'user_id_admin'       => $data['username'],
                    'user_name_admin'     => $data['email'],
                    'user_nama'           => $data['nama'],
                    'logged_in_admin'     => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{

                $session->setFlashdata('msg', 'Wrong Password');
            //    return redirect()->to('/loginadmin');
            }
        }else{
            // print_r('error2v');
            $session->setFlashdata('msg', 'Username Tidak Diketemukan');
            // return redirect()->to('/loginadmin');
        }
    }

     function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/loginadmin');
    }
}
