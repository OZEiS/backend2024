<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {
    private $animals = ["Kucing", "Ayam", "Ikan"];

    public function index() {
        foreach ($this->animals as $animal) {
            echo $animal . "<br>";
        }
    }

    public function store(Request $request) {
        $newAnimal = $request->input('animal');
        array_push($this->animals, $newAnimal);
        echo "Hewan {$newAnimal} berhasil ditambahkan!<br>";
        $this->index();
    }


    public function update(Request $request, $id) {
        if (isset($this->animals[$id])) {
            $updatedAnimal = $request->input('animal');
            $this->animals[$id] = $updatedAnimal;
            echo "Data hewan id {$id} berhasil diupdate menjadi {$updatedAnimal}!<br>";
            $this->index();
        } else {
            echo "Hewan dengan id {$id} tidak ditemukan!<br>";
        }
    }

    
    public function destroy($id) {
        if (isset($this->animals[$id])) {
            $deletedAnimal = $this->animals[$id];
            unset($this->animals[$id]); 
            $this->animals = array_values($this->animals); 
            echo "Data hewan {$deletedAnimal} berhasil dihapus!<br>";
            $this->index(); 
        } else {
            echo "Hewan dengan id {$id} tidak ditemukan!<br>";
        }
    }
}
