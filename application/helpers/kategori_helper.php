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
