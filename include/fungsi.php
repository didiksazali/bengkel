<?php

function id_orang($id){
		$data = $GLOBALS['prefix_id_pelanggan'];
		$hitung = count($id);
		if($hitung==1){
			$data = "$data"."00$id";
		}else if($hitung==2){
			$data = "$data"."0$id";
		}else{
			$data = "$data$id";
		}
		return $data;
	}
	
	function kode_kamar_pria($id){
		$data = $GLOBALS['prefix_kode_kamar_pria'];
		$hitung = count($id);
		if($hitung==1){
			$data = "$data"."00$id";
		}else if($hitung==2){
			$data = "$data"."0$id";
		}else{
			$data = "$data$id";
		}
		return $data;
	}
	
	function kode_kamar_wanita($id){
		$data = $GLOBALS['prefix_kode_kamar_wanita'];
		$hitung = count($id);
		if($hitung==1){
			$data = "$data"."00$id";
		}else if($hitung==2){
			$data = "$data"."0$id";
		}else{
			$data = "$data$id";
		}
		return $data;
	}
	
	function rupiah($angka,$pre=0){
        $jadi="Rp. ".number_format($angka,$pre,',','.').",-";
        return $jadi;
    }
	
	function contains($soource,$partof){
		$hasil_validate=substr_count($soource, $partof);
		if($hasil_validate>0){
			return true;
		}else{
			return false;
		}
	}
	
?>