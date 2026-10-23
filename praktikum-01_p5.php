<?php

// Class Dasar (Parent Class)
class Buku {
    public function caraAkses(): string {
        return "Akses umum";
    }
}

// Langkah A - TODO 1: Buat BukuFisik extends Buku
class BukuFisik extends Buku {
    
    // Langkah B - TODO 3: Override method caraAkses()
    public function caraAkses(): string {
        return "Baca langsung di rak perpustakaan";
    }
}

// Langkah A - TODO 2: Buat BukuDigital extends Buku
class BukuDigital extends Buku {
    
    // Langkah B - TODO 3: Override method caraAkses()
    public function caraAkses(): string {
        return "Buka dan baca melalui aplikasi e-library";
    }
}

// Langkah C - TODO 4: Buat 1 object masing-masing dan cetak hasilnya
echo "<h3>HASIL PRAKTIKUM 1: INHERITANCE & OVERRIDING</h3>";

function tampilkanAkses(Buku $buku): void {
    echo $buku->caraAkses() . "<br>";
}

$daftar = [
    new BukuFisik(),
    new BukuDigital(),
];

foreach ($daftar as $buku) {
    tampilkanAkses($buku);
}

// 1. Objek Buku (Parent)
$bukuUmum = new Buku();
echo "Pribumi Aseli -> " . $bukuUmum->caraAkses() . "<br>";

// 2. Objek Buku Fisik (Subclass 1)
$bukuFisik = new BukuFisik();
echo "Cara menjadi timoty no root -> " . $bukuFisik->caraAkses() . "<br>";

// 3. Objek Buku Digital (Subclass 2)
$bukuDigital = new BukuDigital();
echo "Kukukukuk-Fajar Sadboy -> " . $bukuDigital->caraAkses() . "<br>";

?>