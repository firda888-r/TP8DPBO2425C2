## Janji
Saya Firda Ridzki Utami dengan Nim 2401626 mengerjakan TP 8 dalam Praktikum mata kuliah Desain Pemograman Berorientasi Objek (DPBO) untuk keberkahannya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamin

## Diagram
<img width="968" height="320" alt="Diagram" src="https://github.com/user-attachments/assets/7dbee95d-3b40-4a10-8edc-36258bfe627c" />

## Alur Kode Program
Sistem manajemen Jadwal Mengajar Dosen menggunakan arsitektur Model-View-Controller (MVC) untuk memisahkan logika, data, dan antarmuka pengguna secara efektif. Bagian Controller (spesifiknya JadwalController) bertindak sebagai pusat kendali yang menerima permintaan pengguna, baik itu untuk menampilkan seluruh jadwal, menambahkan jadwal baru, atau menghapus entri lama. Ketika permintaan diterima, Controller akan berinteraksi dengan Model (JadwalModel), yang bertanggung jawab penuh atas komunikasi dengan database. Model ini tidak hanya melakukan operasi CRUD (Create, Read, Update, Delete) pada tabel Jadwal, tetapi juga memiliki relasi antar tabel dengan melakukan operasi JOIN pada tabel Dosen dan Mata_kuliah. Setelah Model mengembalikan data yang sudah lengkap, Controller meneruskannya ke View (views/jadwalView.php, MataKuliahView.php, JadwalView.php) lalu dihubungkan oleh index.php, yang kemudian bertugas memvisualisasikan data tersebut—misalnya, dalam bentuk tabel interaktif dengan field yang sudah diterjemahkan seperti 'Nama Dosen' dan 'Nama Mata Kuliah' lengkap dengan opsi untuk mengedit atau menghapus entri yang bersangkutan.


## Dokumentasi
ID loncat ke 16 dikarenakan id sebelumnya sudah terdelete
##

https://github.com/user-attachments/assets/ae925568-3276-44c3-b76e-dce948441e36

##



https://github.com/user-attachments/assets/ba21ba1b-d28e-4b97-b401-e7e7d24aa76d






