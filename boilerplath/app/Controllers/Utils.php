<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Libraries\AllFunction;
class Utils extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {

    }

    public function index()
    {

    }

    function get_time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes      = round($seconds / 60);        // value 60 is seconds
        $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec
        $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;
        $weeks        = round($seconds / 604800);     // 7*24*60*60;
        $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60
        $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minutes ago";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        } else if ($weeks <= 4.3) {  //4.3 == 52/12
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        } else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }


    function slug($judul)
    {
        $t = preg_replace('/\s+/', ' ', $judul);
        $judulseox = str_replace(" ", "-", $t);
        $judulseoxx = str_replace(",", "-", $judulseox);
        $judulseoxxxx = str_replace(":", "-", $judulseoxx);
        $judulseoxxx = str_replace("+", "-", $judulseoxxxx);
        $judulseoxxxxx = str_replace(")", "-", $judulseoxxx);
        $judulseoxxxxxx = str_replace("(", "-", $judulseoxxxxx);
        $judulseoxxxxxxz = str_replace("!", "-", $judulseoxxxxxx);
        $judulseoxxxxxxzz = str_replace("?", "-", $judulseoxxxxxxz);
        $judulseo = str_replace("'", "-", $judulseoxxxxxxzz);
        return $judulseo;
    }
    function RandomString()
    {
        $characters = uniqid(rand(10,100)*rand(10,100));
        return $characters;
    }
     function getCaptha()
    {
        return $this->getSession()->get('session_captcha');
    }
    function getCapthaUpgradeAkun()
    {
        return $this->getSession()->get('session_captcha_validasi_ugprade_akun');
    }
    function setCaptcha()
    {
        return rand(10,100000);
    }
    function getCapthaTransferpin()
    {
        return $this->getSession()->get('session_captcha_validasi_transfer');
    }
    function setCaptchaTransferpin()
    {
        return rand(10,100000);
    }





    function anti_injection($data){$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));return $filter;}

    public function getUsernameSession()
	{
		return $this->getSession()->get('user_id');
	}
    public function getNameSession()
    {
        return $this->getSession()->get('user_nama');
    }

    public function getAdminSession()
	{
		return $this->getSession()->get('user_id_admin');
	}

    public function getSessionItem($data)
	{
		return $this->getSession()->get($data);
	}

	public function getSession()
	{
		return $session = session();
	}
    public function setSession($data)
	{
		return $this->getSession()->set($data);
	}
    public function removeSession($data)
	{
		return $this->getSession()->remove($data);
	}
    function rupiah($angka){

        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;

    }

    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;
}
function tgl_indo_bulan_2($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $bulan.' '.$tahun;
}
function tgl_indo_jam($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        $jam = substr($tgl,11,2);
        $menit = substr($tgl,14,2);
        return $tanggal.' '.$bulan.' '.$tahun.'&nbsp; Jam '.$jam.':'.$menit;
}
function tgl_indo_jam_detik($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        $jam = substr($tgl,11,2);
        $menit = substr($tgl,14,2);
        $detik = substr($tgl,17,2);
        return $tanggal.' '.$bulan.' '.$tahun.'&nbsp; Jam '.$jam.':'.$menit.':'.$detik;
}
function tgl_indo_jam_detik2($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        $jam = substr($tgl,11,2);
        $menit = substr($tgl,14,2);
        $detik = substr($tgl,17,2);
        return $tanggal.'&nbsp;'.$bulan.'&nbsp;'.$tahun.'<br>Jam&nbsp;'.$jam.':'.$menit.':'.$detik;
}
function tgl_indo_jam2($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan2(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        $jam = substr($tgl,11,2);
        $menit = substr($tgl,14,2);
        return $tanggal.' '.$bulan.' '.$tahun.'&nbsp; '.$jam.':'.$menit;
}
function tgl_indo_jam_hari($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        $jam = substr($tgl,11,2);
        $menit = substr($tgl,14,2);

        $tagg = "$tgl";
        $day = date('D', strtotime($tagg));
        $dayList = array(
            "Sun" => "Minggu",
            "Mon" => "Senin",
            "Tue" => "Selasa",
            "Wed" => "Rabu",
            "Thu" => "Kamis",
            "Fri" => "Jumat",
            "Sat" => "Sabtu"
        );
        return $dayList[$day].', '.$tanggal.' '.$bulan.' '.$tahun.'&nbsp; Jam '.$jam.':'.$menit;
}
function tgl_jam($tgl){
        $jam = substr($tgl,0,2);
        $menit = substr($tgl,3,2);
        return $jam.' Jam '.$menit.' Menit';
}

function getBulan($bln){
            switch ($bln){
                case 1: return "Januari"; break;
                case 2: return "Februari"; break;
                case 3: return "Maret"; break;
                case 4: return "April"; break;
                case 5: return "Mei"; break;
                case 6: return "Juni"; break;
                case 7: return "Juli"; break;
                case 8: return "Agustus"; break;
                case 9: return "September"; break;
                case 10: return "Oktober"; break;
                case 11: return "November"; break;
                case 12: return "Desember"; break;
            }
        }
function getBulan2($bln){
            switch ($bln){
                case 1: return "Jan"; break;
                case 2: return "Feb"; break;
                case 3: return "Mar"; break;
                case 4: return "Apr"; break;
                case 5: return "Mei"; break;
                case 6: return "Jun"; break;
                case 7: return "Jul"; break;
                case 8: return "Agt"; break;
                case 9: return "Sep"; break;
                case 10: return "Okt"; break;
                case 11: return "Nov"; break;
                case 12: return "Des"; break;
            }
        }
}