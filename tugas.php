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

    // Encapsulation: Getters and setters
    public function setName($name)
    {
        $this->name = $name;
    }
}

class Student extends Person
{
    public function consult(Person $person, $message)
    {
        echo $this->getName() . " berkonsultasi dengan " . $person->getName() . ": " ;
    }
}

class Dosen extends Person
{
    public function manageCourse(MataKuliah $mataKuliah, $action)
    {
        echo $this->getName() . " mengurus mata kuliah " . $mataKuliah->getNama() . ": ";
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
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    // Encapsulation: Hiding internal details of Kampus class
    public function handleInteraction(Person $person1, Person $person2, MataKuliah $mataKuliah, $message, $action)
    {
        echo "Di kampus " . $this->getNama() . ":\n";
        $person1->consult($person2, $message);
        $person2->manageCourse($mataKuliah, $action);
    }
}

// Contoh penggunaan:
$kampus = new Kampus("UNISSULA");

$student = new Student("AVU");
$dosen = new Dosen("Ghufron");
$mataKuliah = new MataKuliah("Pemrograman Web");

$kampus->handleInteraction($student, $dosen, $mataKuliah, "Saya butuh bantuan dengan tugas", "Mengupdate kurikulum");
