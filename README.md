README: MINI APPLICATION OOP - SISTEM PEMINJAMAN ALAT LABORATORIUM UCIC

1. Masalah & Tujuan
Pencatatan peminjaman alat laboratorium komputer (seperti router dan kabel) masih sulit dilacak status ketersediaannya jika dilakukan secara manual. Selain itu, setiap jenis alat memiliki spesifikasi pendataan yang berbeda-beda (contoh: router memiliki tipe enterprise/home, sedangkan kabel memiliki ukuran panjang). Sistem ini dibangun untuk mengotomatisasi pencatatan peminjaman alat dengan status ketersediaan yang jelas dan mendetail sesuai spesifikasi masing-masing alat.

<img width="1480" height="1698" alt="p5" src="https://github.com/user-attachments/assets/1b3d9e23-c0ec-4903-9829-ce4c97a7c9d6" />

2. Desain Class
Sistem ini dirancang menggunakan 4 Class dan 1 Interface:

AlatLab (Abstract Class): Bertindak sebagai cetakan dasar untuk semua entitas alat di laboratorium.

Router dan Kabel (Subclass): Wujud nyata dari alat yang akan dipinjam.

BisaDipinjam (Interface): Kontrak standar yang wajib dimiliki oleh barang yang bisa dipinjam.

Peminjaman (Class Pengelola): Bertindak sebagai keranjang atau pencatat transaksi yang mengelola proses peminjaman alat oleh mahasiswa.

3. Alasan Pilihan Relasi OOP
   
<img width="1788" height="1128" alt="p5-pt2" src="https://github.com/user-attachments/assets/7b5090e3-230f-4682-a5b1-1cbbf010124c" />
Inheritance (Pewarisan): Class Router dan Kabel diturunkan (extends) dari abstract class AlatLab karena secara hierarki keduanya merupakan "Alat Lab" (Hubungan Is-a). Keduanya mewarisi atribut dasar seperti idAlat, namaAlat, dan statusTersedia.



Overriding: Method tampilkanInfo() pada Router dan Kabel di-override dari induknya untuk menambahkan pencetakan data spesifik yang hanya dimiliki alat tersebut (mencetak tipe pada Router, dan mencetak ukuran panjang pada Kabel).

<img width="1648" height="1242" alt="p5-inter" src="https://github.com/user-attachments/assets/a7a3a56b-be5d-405b-ad3a-7cd407e842fd" />

<img width="1680" height="1052" alt="p5-inter2" src="https://github.com/user-attachments/assets/0781919f-d92b-4af2-a388-f4ac7638d7d8" />

Interface (Kontrak): Digunakan antarmuka BisaDipinjam (Hubungan Can-do) agar kita memiliki jaminan bahwa setiap objek yang masuk ke keranjang peminjaman pasti memiliki fungsi pinjamAlat().

<img width="1664" height="1242" alt="p5-compos" src="https://github.com/user-attachments/assets/76e414b8-17c2-427c-9964-9407efe53cc8" />
Composition: Class Peminjaman memiliki hubungan Composition (Has-a) dengan alat-alat lab, di mana class transaksi ini menampung sebuah alat (atau sekumpulan alat) untuk diproses. Class Peminjaman bisa menangani transaksi tanpa memedulikan apakah itu Router atau Kabel.
<img width="1494" height="1242" alt="p5-hasil" src="https://github.com/user-attachments/assets/a619e06b-30e1-43d8-86da-e9fc37c748ba" />
<img width="475" height="533" alt="hasil" src="https://github.com/user-attachments/assets/190f76a8-e32d-445c-94b6-85e5ead791e3" />
