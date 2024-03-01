<?php
class Person
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Student extends Person
{
    public function consult(Dosen $dosen, $message)
    {
        echo $this->getName() . " berkonsultasi dengan " . $dosen->getName() . ": ";
    }
}

class Dosen extends Person
{
    public function manageCourse(MataKuliah $mataKuliah, $action)
    {
        echo $this->getName() . " mengurus mata kuliah " . $mataKuliah->getNama() . ": " . $action . "\n";
    }
}

class MataKuliah
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }
}

class Kampus
{
    public function handleInteraction(Student $student, Dosen $dosen, MataKuliah $mataKuliah, $message, $action)
    {
        $student->consult($dosen, $message);
        $dosen->manageCourse($mataKuliah, $action);
    }
}

// Contoh penggunaan:
$student = new Student("Navira Restu Ananda Tyana");
$dosen = new Dosen("Erlan S, T., M.Kom.");
$mataKuliah = new MataKuliah("Web Programmer");

$kampus = new Kampus();
$kampus->handleInteraction($student, $dosen, $mataKuliah, "Saya butuh bantuan dengan tugas", "Mengupdate kurikulum");
