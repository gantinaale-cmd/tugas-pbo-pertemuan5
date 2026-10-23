<?php
class AlatLab {
    // 1. Property (Sudah Encapsulation)
    private string $idAlat;
    private string $namaAlat;
    private bool $statusTersedia = false;

    // 2. Constructor
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

// Menampilkan Judul 
echo "SISTEM PEMINJAMAN ALAT LABORATORIUM UCIC<br>";
echo "---------------------------------------------------------<br>";

// 4. Instantiation (Membuat Object)
$alat1 = new AlatLab("R001", "Router Cisco");
$alat2 = new AlatLab("K005", "Kabel Tester");

// 5. Memanggil Method untuk Alat 1
$alat1->tampilkanInfo();
$alat1->setDipinjam("Nibraas Ale");
$alat1->setTersedia();

echo "---------------------------------------------------------<br>";

// Memanggil Method untuk Alat 2
$alat2->tampilkanInfo();
$alat2->setDipinjam("Budi Santoso");
$alat2->setTersedia();
?>