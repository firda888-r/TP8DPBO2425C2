## Janji
Saya Firda Ridzki Utami dengan Nim 2401626 mengerjakan TP 8 dalam Praktikum mata kuliah Desain Pemograman Berorientasi Objek (DPBO) untuk keberkahannya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamin

## Diagram
<img width="968" height="320" alt="Diagram" src="https://github.com/user-attachments/assets/7dbee95d-3b40-4a10-8edc-36258bfe627c" />

## Alur Kode Program
Sistem manajemen Jadwal Mengajar Dosen menggunakan arsitektur Model-View-Controller (MVC) untuk memisahkan logika, data, dan antarmuka pengguna secara efektif. Bagian Controller (spesifiknya JadwalController) bertindak sebagai pusat kendali yang menerima permintaan pengguna, baik itu untuk menampilkan seluruh jadwal, menambahkan jadwal baru, atau menghapus entri lama. Ketika permintaan diterima, Controller akan berinteraksi dengan Model (JadwalModel), yang bertanggung jawab penuh atas komunikasi dengan database. 

Model ini tidak hanya melakukan operasi CRUD (Create, Read, Update, Delete) pada tabel Jadwal, tetapi juga memiliki relasi antar tabel dengan melakukan operasi JOIN pada tabel Dosen dan Mata_kuliah. Setelah Model mengembalikan data yang sudah lengkap, Controller meneruskannya ke View (views/jadwalView.php, MataKuliahView.php, JadwalView.php) Sementara itu, index.php bertindak sebagai Front Controller atau Router utama yang mengarahkan request ke Controller yang benar. View kemudian bertanggung jawab memvisualisasikan data dalam format yang mudah dipahami, seperti tabel interaktif yang menyajikan 'Nama Dosen' dan 'Nama Mata Kuliah' lengkap dengan opsi tombol Edit dan Hapus, yang memicu Controller untuk memanggil method spesifik (seperti delete atau edit form) berdasarkan parameter GET di URL.

**DosenController.php**	Mengelola request CRUD untuk tabel Dosen.	
index(): Menampilkan daftar semua Dosen.
add(data)/store(): Memproses data POST dan menyimpannya.
edit(id): Menampilkan form edit yang sudah terisi data Dosen berdasarkan ID.
delete(id): Menghapus data Dosen berdasarkan ID.

**MataKuliahController.php** Mengelola request CRUD untuk tabel Mata_kuliah.	
create(): Menampilkan form tambah (mungkin perlu memuat daftar Dosen dari DosenModel untuk dropdown relasi).
update(data): Memproses data POST dan memperbarui entri Mata Kuliah.

**JadwalController.php** Mengelola request CRUD untuk tabel Jadwal.	
index(): Menampilkan daftar jadwal bersama nama Dosen dan Mata Kuliah (memanggil Model dengan fungsi JOIN).
destroy(id): Menghapus entri jadwal.

**DosenModel.php**	Berinteraksi langsung dengan tabel Dosen. Menyediakan method dasar CRUD.	
getAll(): Mengambil semua data Dosen.
getById(id): Mengambil satu baris data Dosen.
create(data): Menjalankan query INSERT.
update(data): Menjalankan query UPDATE.

**MataKuliahModel.php**	Berinteraksi dengan tabel Mata_kuliah.	
getAll(): Mengambil semua Mata Kuliah.
getAllWithDosenName(): Menggunakan JOIN dengan tabel Dosen untuk menampilkan nama dosen pengampu.

**JadwalModel.php** Berinteraksi dengan tabel Jadwal. Model paling kompleks karena melibatkan dua relasi.	
getAllWithRelations(): Melakukan JOIN dengan Dosen dan Mata_kuliah untuk mengambil detail jadwal lengkap.
delete(id): Menjalankan query DELETE pada tabel Jadwal.


## Dokumentasi
ID loncat ke 16 dikarenakan id sebelumnya sudah terdelete
##

https://github.com/user-attachments/assets/ae925568-3276-44c3-b76e-dce948441e36

##



https://github.com/user-attachments/assets/ba21ba1b-d28e-4b97-b401-e7e7d24aa76d






