<?php

class Consultation {
    private $mahasiswa;
    private $kampus;
    private $dosenWali;

    public function __construct($mahasiswa, $kampus, $dosenWali) {
        $this->mahasiswa = $mahasiswa;
        $this->kampus = $kampus;
        $this->dosenWali = $dosenWali;
    }

    public function displayConsultationInfo() {
        echo "<p>Mahasiswa <strong>{$this->mahasiswa}</strong> sedang berkonsultasi dengan Dosen Wali <strong>{$this->dosenWali}</strong> mengurus KRS di lingkungan Kampus <strong>{$this->kampus}</strong>.</p>";
    }
}

// Membuat objek konsultasi
$consultation = new Consultation("Navira", "Unissula", "FIDIA");

// Menampilkan informasi konsultasi
$consultation->displayConsultationInfo();

?>