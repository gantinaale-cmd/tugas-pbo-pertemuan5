<?php

class Buku {
    // Menambahkan properti judul
    protected string $judul;

    // Constructor untuk mengisi judul saat object dibuat
    public function __construct(string $judul) {
        $this->judul = $judul;
    }

    // Method untuk mengambil judul
    public function getJudul(): string {
        return $this->judul;
    }

    public function caraAkses(): string {
        return "Akses umum";
    }
}

class BukuFisik extends Buku {
    // Override caraAkses() untuk Buku Fisik
    public function caraAkses(): string {
        return "baca langsung di meja perpustakaan atau pinjam bawa pulang.";
    }
}

class BukuDigital extends Buku {
    // Override caraAkses() untuk Buku Digital
    public function caraAkses(): string {
        return "unduh pdf dan baca melalui aplikasi perpustakaan.";
    }
}

// Membuat object dengan memasukkan judul buku ke dalam parameter
$bukuFisik = new BukuFisik("Laskar Pelangi");
$bukuDigital = new BukuDigital("Belajar PHP dari Nol");

// Menampilkan output sesuai format yang diminta
echo "==PRAKTIKUM 1==" . "<br>";
echo "judul: " . $bukuFisik->getJudul() . "\n";
echo "cara akses: " . $bukuFisik->caraAkses() . "\n\n";

echo "judul: " . $bukuDigital->getJudul() . "\n";
echo "cara akses: " . $bukuDigital->caraAkses() . "\n";

?>