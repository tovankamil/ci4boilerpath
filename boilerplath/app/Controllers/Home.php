<?php

namespace App\Controllers;
use App\Models\Model_Front_Berita;
class Home extends BaseController
{
    public function index()
    {
        // berita highlights
        $model = new Model_Front_Berita();
        $data['highlight'] = $model->highlights();
        // berita running text
        $data['runningtext'] = $model->runningtext();

        // // berita utama
        $data['beritautama'] = $model->beritautama();

        // // berita terbaru
        $data['beritaterbaru'] = $model->beritaterbaru();

        // // berita trending
        $data['beritatrending'] = $model->beritatrending();
             return view('home',$data);
    }
}
