<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Controllers\Utils;
class Admin_dashboard extends Controller
{
    public function index()
    {
        helper(['form']);
        $model = new AdminModel();
       // $data['dataOffice'] =$model->getDataOffice();
        // echo view('admin/login',$data);
        echo view('admin/dashboard');
    }


}
