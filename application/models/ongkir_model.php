<?php 
	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Ongkir_model extends CI_Model {
	
		function GetCity($query)
		{
			$loginpassw = 'luthfi_hamid_m:underground1';  //your proxy login and password here
			$proxy_ip = '167.205.3.80'; //proxy IP here
			$proxy_port = 110; //proxy port from your proxy list
			$url = 'http://api.ongkir.info/city/list';
			
			$myvars = "API-Key=1323142e311d28bb7a001206204116e1";
			$myvars .= "&origincity=Bandung";
			$myvars .= "&query=".$query;
			$myvars .= "&type=origin";
			$myvars .= "&courier=jne";
			$myvars .= "&format=json";
			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
			curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
			curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);
			$response = json_decode(curl_exec($ch));
			if ($response->status->code == 0)
				$list_city = array_unique($response->cities);
			else
				$list_city = array(0 => 'not');
			return $list_city;
		}
		
		function GetOngkir($city,$weight,$service)
		{
			$loginpassw = 'luthfi_hamid_m:underground1';  //your proxy login and password here
		    $proxy_ip = '167.205.3.80'; //proxy IP here
		    $proxy_port = 110; //proxy port from your proxy list
		    $url = 'http://api.ongkir.info/cost/find';

		    $myvars = "API-Key=1323142e311d28bb7a001206204116e1";
		    $myvars .= "&from=Bandung";
		    $myvars .= "&to=".$city;
		    $myvars .= "&weight=".$weight;
		    $myvars .= "&courier=jne";
		    $myvars .= "&format=json";
		    $ch = curl_init( $url );
		    curl_setopt( $ch, CURLOPT_POST, 1);
		    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
		    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		    curl_setopt( $ch, CURLOPT_HEADER, 0);
		    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
		    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
		    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
		    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);
		    $response = json_decode(curl_exec($ch));
		    if ($response->status->code == 0)
		    {
		    	$hasil = 0;
		    	foreach ($response->price as $price)
		    	{
		    		if ($price->service == $service)
		    		{
		    			$hasil = $price->value;
		    		}
		    	}
		    	return $hasil;
		    }
		    else
		    {
		    	return 0;
		    }
		}
	}
	
	/* End of file ongkir_model.php */
	/* Location: ./application/models/ongkir_model.php */
 ?>