<?php
function tampilkanAkses(Buku $buku): void {
    echo $buku->caraAkses(), PHP_EQL;
}

$daftar = [
    new BukuFisik(),
    new BukuDigital(),
];

foreach ($daftar as $buku) {
    tampilkanAkses($buku);
}