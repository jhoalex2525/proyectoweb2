<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
    {
        return view('registroProductos');
    }

    public function registrar()
    {
        //1. Recibo los datos enviados desde el formulario
        //En parentesis son los name de cada input del forms
        $product = $this->request->getPost("product");
        $photo = $this->request->getPost("photo");
        $price = $this->request->getPost("price");
        $description = $this->request->getPost("description");
        $animaltype = $this->request->getPost("animaltype");

        //2. Validar que se llenó el formulario

        if($this->validate('producto')){
            echo("Todo funcionó");
        }
        else{
            echo("Datos pendientes");
        }

        // //3. Crear un arreglo asociativo con los datos del paso 1
        // $datos = array(
        //     "product" => $product,
        //     "photo" => $photo,
        //     "price" => $price,
        //     "description" => $description,
        //     "animaltype" => $animaltype
        // );

        // print_r($datos);
    }
}
