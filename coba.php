<?php

// Kelas Mahasiswa
class Mahasiswa
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function konsultasiKrs()
    {
        return $this->nama;
    }
}

// Kelas Kampus
class Kampus
{
    protected $namaKampus;

    public function __construct($namaKampus)
    {
        $this->namaKampus = $namaKampus;
    }

    public function getNamaKampus()
    {
        return $this->namaKampus;
    }
}

// Kelas Dosen Wali sebagai turunan dari Mahasiswa dan Kampus
class DosenWali extends Mahasiswa
{
    private $dosenWali;

    public function __construct($nama, $dosenWali)
    {
        parent::__construct($nama);
        $this->dosenWali = $dosenWali;
    }

    public function konsultasiKrs()
    {
        return parent::konsultasiKrs() . "<br><br>Dosen Pembimbing : {$this->dosenWali}.";
    }
}

// Inisialisasi objek
$namaMahasiswa = "Navira Restu Ananda Tyana";
$namaKampus = "Islam Sultan Agung Semarang";
$namaDosenWali = "Badieah Assegaf";

$mahasiswa = new DosenWali($namaMahasiswa, $namaDosenWali);
$kampus = new Kampus($namaKampus);

// Tampilkan hasil di browser

echo "<p>Nama : {$mahasiswa->konsultasiKrs()}</p>";
echo "<p>Universitas : {$kampus->getNamaKampus()}.</p>";
 ?>