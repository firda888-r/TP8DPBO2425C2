CREATE DATABASE tp_mvc25;
USE tp_mvc25;


CREATE TABLE Dosen (
    id_dosen INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    Gmail VARCHAR(100) NOT NULL,
    join_date DATE NOT NULL
);

CREATE TABLE Mata_kuliah (
    id_matkul INT AUTO_INCREMENT PRIMARY KEY,
    id_dosen INT NOT NULL,
    kode_matkul INT NOT NULL,
    nama_matkul VARCHAR(100) NOT NULL,
    semester VARCHAR(100) NOT NULL,

    FOREIGN KEY (id_dosen) REFERENCES Dosen(id_dosen)
);

CREATE TABLE Jadwal (
    id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
    id_dosen INT NOT NULL,
    id_matkul INT NOT NULL,
    hari VARCHAR(100) NOT NULL,
    jam_mengajar VARCHAR(50) NOT NULL,
    ruangan VARCHAR(100) NOT NULL,

    FOREIGN KEY (id_dosen) REFERENCES Dosen(id_dosen),
    FOREIGN KEY (id_matkul) REFERENCES Mata_kuliah(id_matkul)
);

INSERT INTO Dosen (name, nidn, phone, Gmail, join_date) VALUES
("Yusuf", "123778", "081234558", "@mr.yusuf.com", "2025-11-17");

INSERT INTO mata_kuliah (id_dosen, kode_matkul, nama_matkul, semester) VALUES 
(2, 101, 'Pemrograman Web', 'Semester 2');

INSERT INTO jadwal (id_dosen, id_matkul, hari, jam_mengajar, ruangan)
VALUES (2, 1, 'Selasa', '08:00 - 10:00', 'R-203');

