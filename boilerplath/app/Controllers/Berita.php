<?php

namespace App\Controllers;

use App\Models\Model_Front_Detail_Berita;
class Berita extends BaseController
{
    public function index()
    {
        return view('berita');
    }

    public function detail($id=null)
    {
        $model = new Model_Front_Detail_Berita();
        $data['highlight'] = $model->detailberita($id);
        // berita running text
        $data['runningtext'] = $model->runningtext();
        return view('berita',$data);
    }

    public function kategori($id=null)
    {
        // cari detail berita berdasarkan kategori

        echo "<title>$id</title>";
    }

}
