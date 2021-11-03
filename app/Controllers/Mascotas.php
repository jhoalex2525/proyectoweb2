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

    public function registrar()
    {
        //1. Recibo los datos enviados desde el formulario
        //En parentesis son los name de cada input del forms
        $animalname = $this->request->getPost("animalname");
        $animalphoto = $this->request->getPost("animalphoto");
        $animalage = $this->request->getPost("animalage");
        $animaldescription = $this->request->getPost("animaldescription");
        $animaltype = $this->request->getPost("animaltype");

        //2. Validar que se llenó el formulario

        if ($this->validate('mascota')) {
            // 3. Crear un arreglo asociativo con los datos del paso 1
            // En naranja van las claves que estan en la base de datos, columnas
            $datos = array(
                "animalname" => $animalname,
                "animalphoto" => $animalphoto,
                "animalage" => $animalage,
                "animaldescription" => $animaldescription,
                "animaltype" => $animaltype
            );

            // Se intenta grabar los datos en la base de datos
            try {
                $modelo = new PetModel();
                $modelo->insert($datos);
                return redirect()->to(site_url('/mascotas/registro'))->with('mensaje', 'Éxito registrando la mascota');
            } catch (\Exception $error) {
                return redirect()->to(site_url('/mascotas/registro'))->with('mensaje', $error->getMessage());
            }
        } else {
            $mensaje = "Datos pendientes por diligenciar";
            return redirect()->to(site_url('/mascotas/registro'))->with('mensaje', $mensaje);
        }
    }

    public function buscar()
    {
        try {
            $modelo = new PetModel();
            $resultado = $modelo->findAll();
            $mascotas = array('mascotas' => $resultado);
            return view('listaMascotas', $mascotas);
        } catch (\Exception $error) {
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $error->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $modelo = new PetModel();
            $modelo->where('id', $id)->delete();
            return redirect()->to(site_url('/mascotas/registro'))->with('mensaje', "Éxito borrando mascota");
        } catch (\Exception $error) {
            return redirect()->to(site_url('/mascotas/registro'))->with('mensaje', $error->getMessage());
        }
    }

    public function editar($id){
        // Recibo datos
        $animalname = $this->request->getPost("animalname");
        $animalage = $this->request->getPost("animalage");

        //2. Validar que se llenó el formulario
        if ($this->validate('mascotaeditada')) {
            // 3. Crear un arreglo asociativo con los datos del paso 1
            // En naranja van las claves que estan en la base de datos, columnas
            $datos = array(
                "animalname" => $animalname,
                "animalage" => $animalage                
            );

            // Se intenta grabar los datos en la base de datos
            try {
                $modelo = new PetModel();
                $modelo->update($id,$datos);
                return redirect()->to(site_url('/mascotas/listado'))->with('mensaje', 'Éxito editando mascota');
            } catch (\Exception $error) {
                return redirect()->to(site_url('/mascotas/listado'))->with('mensaje', $error->getMessage());
            }
        } else {
            $mensaje = "Datos pendientes por diligenciar";
            return redirect()->to(site_url('/mascotas/listado'))->with('mensaje', $mensaje);
        }
    }
}
?>