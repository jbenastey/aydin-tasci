<?php
function kategori($nilai){
	$hasil = null;
	if ($nilai >= 1 && $nilai <= 2.6):
		$hasil = 'Belum siap dan butuh banyak peningkatan';
	elseif ($nilai > 2.6 && $nilai <= 3.4):
		$hasil = 'Tidak siap dan butuh sedikit peningkatan';
	elseif ($nilai > 3.4 && $nilai <= 4.2):
		$hasil = 'Siap, tetapi masih butuh sedikit peningkatan';
	elseif ($nilai > 4.2 && $nilai <= 5):
		$hasil = 'Siap dan penerapan dapat dilakukan';
	endif;
	return $hasil;
}

function jurusan($jurusan){
	$hasil = null;
	if ($jurusan == 'Syariah dan Ilmu Hukum'){
		$hasil = 'fasih';
	} elseif ($jurusan == 'Sains dan Teknologi'){
		$hasil = 'fst';
	} elseif ($jurusan == 'Tarbiyah dan Keguruan'){
		$hasil = 'ftk';
	} elseif ($jurusan == 'Psikologi'){
		$hasil = 'fpsi';
	} elseif ($jurusan == 'Ekonomi dan Sosial'){
		$hasil = 'fekonsos';
	} elseif ($jurusan == 'Dakwah dan Komunikasi'){
		$hasil = 'fdk';
	} elseif ($jurusan == 'Pertanian dan Peternakan'){
		$hasil = 'fapertapet';
	} elseif ($jurusan == 'Ushuluddin'){
		$hasil = 'fud';
	}
	return $hasil;
}

function isNan($angka){
	if (is_nan($angka)){
		return 0;
	}else {
		return $angka;
	}
}
