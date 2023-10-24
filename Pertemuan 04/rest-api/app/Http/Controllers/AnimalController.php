<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // property
    public $animals = ['ayam', 'ikan'];

    // menampilkan semua hewan
    public function index()
    {
        echo "Menampilkan data animals <br>";

        foreach ($this->animals as $animal) {
            echo "- $animal <br>";
        }

    }

    // menambahkan data baru
    public function store(request $request)
    {
        echo "Menambahkan hewan baru $request->animal <br>";

        // menambahkan data baru
        array_push($this->animals, $request->animal);

        // panggil method index
        $this->index();
    }

    // mengupdate data 
    public function update(request $request, $id)
    {
        echo "Mengupdate data dengan id $id <br>";

        // mengubah data
        if (!isset($request->animals[$id])) {
            throw new \Exception("invalid index to update");
        }
        ;

        $this->animals[$id] = $request->animal;

        // panggil method index
        $this->index();
    }

    // menghapus data pada hewan
    public function destroy($id)
    {
        echo "Mengdelete data dengan id $id <br>";

        if (!isset($this->animals[$id])) {
            throw new \Exception("invalid index to delete");
        }
        ;
        // menghapus data dengan index
        unset($this->animals[$id]);

        // panggil method index
        $this->index();
    }
}
