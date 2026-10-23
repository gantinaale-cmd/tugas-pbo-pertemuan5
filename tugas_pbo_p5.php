<?php
abstract class AlatLab {
    // 1. Property (Sudah Encapsulation)
    protected string $idAlat;
    protected string $namaAlat;
    protected bool $statusTersedia = true; // Diatur true agar bisa dipinjam

    // 2. Constructor Induk
    public function __construct(string $idAlat, string $namaAlat) {
        $this->idAlat = $idAlat;
        $this->namaAlat = $namaAlat;
    }

    public function getIdAlat(): string {
        return $this->idAlat;
    }

    public function setIdAlat(string $idAlat): void {
        $this->idAlat = $idAlat;
    }

    public function getNamaAlat(): string {
        return $this->namaAlat;
    }

    public function setNamaAlat(string $namaAlat): void {
        $this->namaAlat = $namaAlat;
    }

    public function getStatusTersedia(): bool {
        return $this->statusTersedia;
    }

    public function setStatusTersedia(bool $statusTersedia): void {
        $this->statusTersedia = $statusTersedia;
    }
    
    // 3. Method
    public function tampilkanInfo(): void {
        $status = $this->statusTersedia ? 'Tersedia' : 'Dipinjam';
        echo "ID: " . $this->idAlat . "<br>";
        echo "Nama Alat: " . $this->namaAlat . "<br>";
        echo "Status: " . $status . "<br>";
    }

    public function setDipinjam(string $peminjam): void {
        if ($this->statusTersedia) {
            $this->statusTersedia = false;
            echo "Alat '" . $this->namaAlat . "' berhasil dipinjam oleh " . $peminjam . ".<br>";
        } else {
            echo "Maaf, Alat '" . $this->namaAlat . "' sedang dipinjam.<br>";
        }
    }

    public function setTersedia(): void {
        $this->statusTersedia = true;
        echo "Alat '" . $this->namaAlat . "' telah dikembalikan ke Lab dan kini tersedia.<br>";
    }
}

// Class Peminjaman (Composition)
class Peminjaman {
    private AlatLab $alat;
    private string $namaPeminjam;

    public function __construct(string $namaPeminjam) {
        $this->namaPeminjam = $namaPeminjam;
    }

    public function setAlat(AlatLab $alat): void {
        $this->alat = $alat;
    }

    public function pinjamAlat(): void {
        if ($this->alat->getStatusTersedia()) {
            $this->alat->setDipinjam($this->namaPeminjam);
        } else {
            echo "Maaf, Alat '" . $this->alat->getNamaAlat() . "' sedang dipinjam.<br>";
        }
    }

    public function kembalikanAlat(): void {
        $this->alat->setTersedia();
    }
}

// Interface
interface BisaDipinjam {
    public function pinjamAlat(): bool;
}

// Subclass Router (Ditambahkan Constructor & Overriding Info)
class Router extends AlatLab implements BisaDipinjam {
    private string $tipeRouter;

    // Constructor khusus Router untuk menangkap parameter ke-3 ("Enterprise")
    public function __construct(string $idAlat, string $namaAlat, string $tipeRouter) {
        parent::__construct($idAlat, $namaAlat); // Mengirim 2 data ke induk AlatLab
        $this->tipeRouter = $tipeRouter;
    }

    // Overriding method tampilkanInfo agar tipe routernya ikut tampil
    public function tampilkanInfo(): void {
        parent::tampilkanInfo();
        echo "Tipe Router: " . $this->tipeRouter . "<br>";
    }

    public function pinjamAlat(): bool {
        return $this->statusTersedia;
    }
}

// Subclass Kabel (Ditambahkan Constructor & Overriding Info)
class Kabel extends AlatLab implements BisaDipinjam {
    private string $panjangKabel;

    // Constructor khusus Kabel untuk menangkap parameter ke-3 ("5 Meter")
    public function __construct(string $idAlat, string $namaAlat, string $panjangKabel) {
        parent::__construct($idAlat, $namaAlat); // Mengirim 2 data ke induk AlatLab
        $this->panjangKabel = $panjangKabel;
    }

    // Overriding method tampilkanInfo agar panjang kabelnya ikut tampil
    public function tampilkanInfo(): void {
        parent::tampilkanInfo();
        echo "Panjang Kabel: " . $this->panjangKabel . "<br>";
    }

    public function pinjamAlat(): bool {
        return $this->statusTersedia;
    }
}

// ==========================================
// PENGUJIAN PROGRAM
// ==========================================
echo "SISTEM PEMINJAMAN ALAT LABORATORIUM UCIC<br>";
echo "---------------------------------------------------------<br>";

// Instisiasi objek dengan 3 parameter yang sudah didukung *constructor* baru
$router1 = new Router("R002", "Router Juniper", "Enterprise");
$kabel1 = new Kabel("K006", "Kabel Ethernet", "5 meter");

// Menampilkan info awal alat 1
echo "<b>Informasi Router Awal:</b><br>";
$router1->tampilkanInfo();
echo "<br>";

// Proses peminjaman menggunakan class Peminjaman
$transaksi = new Peminjaman("Nibraas Ale");
$transaksi->setAlat($router1);
$transaksi->pinjamAlat();

echo "<br>";
// Menampilkan info setelah dipinjam (status berubah jadi Dipinjam)
echo "<b>Informasi Router Setelah Dipinjam:</b><br>";
$router1->tampilkanInfo();
?>