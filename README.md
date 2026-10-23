README: MINI APPLICATION OOP - SISTEM PEMINJAMAN ALAT LABORATORIUM UCIC

1. Masalah & Tujuan
Pencatatan peminjaman alat laboratorium komputer (seperti router dan kabel) masih sulit dilacak status ketersediaannya jika dilakukan secara manual. Selain itu, setiap jenis alat memiliki spesifikasi pendataan yang berbeda-beda (contoh: router memiliki tipe enterprise/home, sedangkan kabel memiliki ukuran panjang). Sistem ini dibangun untuk mengotomatisasi pencatatan peminjaman alat dengan status ketersediaan yang jelas dan mendetail sesuai spesifikasi masing-masing alat.

2. Desain Class
Sistem ini dirancang menggunakan 4 Class dan 1 Interface:

AlatLab (Abstract Class): Bertindak sebagai cetakan dasar untuk semua entitas alat di laboratorium.

Router dan Kabel (Subclass): Wujud nyata dari alat yang akan dipinjam.

BisaDipinjam (Interface): Kontrak standar yang wajib dimiliki oleh barang yang bisa dipinjam.

Peminjaman (Class Pengelola): Bertindak sebagai keranjang atau pencatat transaksi yang mengelola proses peminjaman alat oleh mahasiswa.

3. Alasan Pilihan Relasi OOP

Inheritance (Pewarisan): Class Router dan Kabel diturunkan (extends) dari abstract class AlatLab karena secara hierarki keduanya merupakan "Alat Lab" (Hubungan Is-a). Keduanya mewarisi atribut dasar seperti idAlat, namaAlat, dan statusTersedia.

Overriding: Method tampilkanInfo() pada Router dan Kabel di-override dari induknya untuk menambahkan pencetakan data spesifik yang hanya dimiliki alat tersebut (mencetak tipe pada Router, dan mencetak ukuran panjang pada Kabel).

Interface (Kontrak): Digunakan antarmuka BisaDipinjam (Hubungan Can-do) agar kita memiliki jaminan bahwa setiap objek yang masuk ke keranjang peminjaman pasti memiliki fungsi pinjamAlat().

Composition: Class Peminjaman memiliki hubungan Composition (Has-a) dengan alat-alat lab, di mana class transaksi ini menampung sebuah alat (atau sekumpulan alat) untuk diproses. Class Peminjaman bisa menangani transaksi tanpa memedulikan apakah itu Router atau Kabel.