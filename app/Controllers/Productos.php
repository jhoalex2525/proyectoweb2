<?php

namespace App\Controllers;

// Se trae/importa el modelo de datos
use App\Models\ProductModel;
use CodeIgniter\Model;

// En UserModel se coloca el mismo nombre de la clase, en este caso se cambia
// UserModel por Productos
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
            // 3. Crear un arreglo asociativo con los datos del paso 1
            // En naranja van las claves que estan en la base de datos, columnas
            $datos = array(
                "product" => $product,
                "photo" => $photo,
                "price" => $price,
                "description" => $description,
                "animaltype" => $animaltype
            );

            // Se intenta grabar los datos en la base de datos
            try{                
                $modelo = new ProductModel(); 
                $modelo -> insert($datos);                
                return redirect()->to(site_url('/productos/registro'))->with('mensaje','Éxito agregando el producto');

            }   
            catch(\Exception $error){
                return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
            }        
        }
        else{
            $mensaje = "Datos pendientes por diligenciar";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$mensaje);            
        }        
    }

    public function buscar(){         
         try{
            $modelo = new ProductModel();
            $resultado = $modelo->findAll();            
            $productos = array('productos'=>$resultado); //En naranja es la variable que se usa en la vista en foreach
            return view('listaProductos',$productos);
         }
         catch(\Exception $error){
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         }         
    }

    public function eliminar($id){
        try{
            $modelo = new ProductModel();
            $modelo-> where('id',$id)->delete();
            return redirect()->to(site_url('/productos/listado'))->with('mensaje',"Éxito eliminando el producto");
        }   
        catch(\Exception $error){
            return redirect()->to(site_url('/productos/listado'))->with('mensaje',$error->getMessage());
         }         
    }

    public function editar($id){
        // Recibo datos
        $product = $this->request->getPost("product");
        $price = $this->request->getPost("price");

        //2. Validar que se llenó el formulario
        if ($this->validate('productoeditado')) {
            // 3. Crear un arreglo asociativo con los datos del paso 1
            // En naranja van las claves que estan en la base de datos, columnas
            $datos = array(
                "product" => $product,
                "price" => $price                
            );

            // Se intenta grabar los datos en la base de datos
            try {
                $modelo = new ProductModel();
                $modelo->update($id,$datos);
                return redirect()->to(site_url('/productos/listado'))->with('mensaje', 'Éxito editando el producto');
            } catch (\Exception $error) {
                return redirect()->to(site_url('/productos/listado'))->with('mensaje', $error->getMessage());
            }
        } else {
            $mensaje = "Datos pendientes por diligenciar";
            return redirect()->to(site_url('/productos/listado'))->with('mensaje', $mensaje);
        }
    }
}
