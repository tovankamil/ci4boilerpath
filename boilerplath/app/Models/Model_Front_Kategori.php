<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Front_Kategori extends Model
{

    public function connectDatabase()
    {
        return $db  = \Config\Database::connect();
    }

    // berita highlights
    function highlights($slug)
    {

        $data = array();
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='y' and a.running_text='t'  and b.nama_kategori='$slug' order by tanggal desc limit 1 ");
        array_push($data, $query->getResult('array'));
        $querypeliput = $db->query("select * from reporter where id_berita='" . $query->getResult('array')[0]['berita'] . "'");

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
    // berita utama
    function beritautama($slug)
    {
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='t' and a.running_text='t'   order by tanggal desc limit 12  ");


        return $query->getResultArray();
    }
    // berita terbaru
    function beritaterbaru($slug)
    {
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='t' and a.running_text='t' and b.nama_kategori='$slug'   order by tanggal desc  LIMIT 12,6");
        return $query->getResultArray();
    }
    // berita trending
    function beritatrending($slug)
    {
        $db = $this->connectDatabase();
        $query = $db->query("select a.id_berita as berita,a.tanggal as tanggal,a.judul_seo as judul_seo,a.judul as judul,a.gambar as gambar,b.nama_kategori AS kategoriberita
         from berita a inner join kategori b on a.id_kategori = b.id where a.status='0' and a.fokus_berita='t' and a.running_text='t'  and b.nama_kategori='$slug'   order by dibaca desc  LIMIT 8");
        return $query->getResultArray();
    }



    function allberita()
    {
        $db = $this->connectDatabase();
        $query = $db->query("select id_berita,judul_seo,judul,gambar,isi,tanggal,peliput
         from berita where status='0'  order by tanggal desc ");
        return $query->getResultArray();
    }
    function beritaById($id)
    {
        $db = $this->connectDatabase();
        $query = $db->query("select id_berita,judul_seo,judul,gambar,isi,tanggal,peliput
         from berita where status='0' and id_berita ='$id'  order by tanggal desc limit 1 ");
        return $query->getResultArray();
    }
}
