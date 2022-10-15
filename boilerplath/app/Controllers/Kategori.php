<?php

namespace App\Controllers;
use App\Models\Model_Front_Kategori;
class Kategori extends BaseController
{
    public function index($slug=null)
    {

        // berita highlights
        $model = new Model_Front_Kategori();
        $data['highlight'] = $model->highlights($slug);

        // berita running text
        $data['runningtext'] = $model->runningtext();

        // // // berita utama
        $data['beritautama'] = $model->beritautama($slug);

        // // // berita terbaru
        $data['beritaterbaru'] = $model->beritaterbaru($slug);

        // // // berita trending
        $data['beritatrending'] = $model->beritatrending($slug);

             return view('kategori',$data);
    }
}
