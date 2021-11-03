<?php
namespace App\Controllers;

// Se trae/importa el modelo de datos
use App\Models\PetModel;
use CodeIgniter\Model;

// En UserModel se coloca el mismo nombre de la clase, en este caso se cambia
// UserModel por Mascotas
class Mascotas extends BaseController
{
    public function index()
    {
        return view('registroMascotas');
    }
}
?>