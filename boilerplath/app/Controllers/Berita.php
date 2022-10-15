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
        $data['detailberita'] = $model->detailberita($id);
        // berita running text
        $data['runningtext'] = $model->runningtext();
        // // berita terbaru
        $data['beritaterbaru'] = $model->beritaterbaru();
        // // berita utama

         // berita trending
        $data['beritatrending'] = $model->beritatrending();
        return view('berita',$data);
    }

    public function kategori($id=null)
    {
        // cari detail berita berdasarkan kategori

        echo "<title>$id</title>";
    }

}
