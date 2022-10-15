<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Front_Detail_Berita extends Model
{

    public function connectDatabase()
    {
        return $db  = \Config\Database::connect();
    }

    // berita highlights
    function detailberita($slug)
    {
        $data = array();
        $db = $this->connectDatabase();
        $query = $db->query("select * from berita where judul_seo='$slug' limit 1");
        array_push($data, $query->getResult('array'));
        $querypeliput = $db->query("select * from reporter where id_berita='" . $query->getResult('array')[0]['id_berita'] . "'");

        array_push($data, $querypeliput->getResult('array'));

        return $data;
    }
    // berita running text
    function runningtext()
    {
        $db = $this->connectDatabase();
        $query = $db->query("select id_berita,judul_seo,judul,gambar
         from berita where status='0' and running_text='y'  order by tanggal desc ");
        return $query->getResultArray();
    }

    // berita terbaru
    function beritaterbaru()
    {
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='t' and a.running_text='t'   order by tanggal desc  LIMIT 12,6");
        return $query->getResultArray();
    }
    // berita trending
    function beritatrending()
    {
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='t' and a.running_text='t'   order by dibaca desc  LIMIT 20");
        return $query->getResultArray();
    }
}
