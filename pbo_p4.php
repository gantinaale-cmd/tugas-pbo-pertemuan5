<?php
	class mobil{
		private $jenis = "sedan";
		private $merk = "BMW";
		private $warna = "merah";
		
		function dataMobil(){
			echo "Jenis Mobil : " . $this->jenis . "<br>"; //dipanggil dari dalam class
		}
	}
	class warnaMobil extends mobil { //class turunan dari mobil
		function warnanya(){
			echo "Warna Mobil : ".$this->warna."<br>";
		}
	}
	$mobilsaya = new mobil();
	$mobilsaya->dataMobil(); 
	$warnamobilsaya = new warnaMobil();
	$warnamobilsaya->warnanya();
	echo "Merk Mobil : ".$mobilsaya->merk; //dipanggil dari luar class
?>
