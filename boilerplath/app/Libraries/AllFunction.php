<?php

namespace App\Libraries;

class AllFunction
{

	function flashmessagesdata($item,$data)
	{
		$session = session();
		$session->setFlashdata($item, $data);
	}
    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();
	}

	function rupiah($angka){

		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;

	}

	public function min_length($data,$min)
	{
		if($data < $min)
		{
			return false;
		}
		else{
			return true;
		}
	}
	public function max_length($data,$min)
	{
		if($data > $min)
		{
			return false;
		}
		else{
			return true;
		}
	}

		function getBrowser($request)
		{
			$agent =$request->getUserAgent();

			if ($agent->isBrowser())
			{
					$currentAgent = $agent->getBrowser().' '.$agent->getVersion();
			}
			elseif ($agent->isRobot())
			{
					$currentAgent = $this->agent->robot();
			}
			elseif ($agent->isMobile())
			{
					$currentAgent = $agent->getMobile();
			}
			else
			{
					$currentAgent = 'Unidentified User Agent';
			}

			return $currentAgent;
		}

		function getOperatingSystem($request)
		{
			$agent = $request->getUserAgent();
			return $agent->getPlatform(); // Platform info (Windows, Linux, Mac, etc.)
		}

	// validasi data
}