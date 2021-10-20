<?php

namespace App\Models;

// El modelo es una clase por eso empieza por mayuscula
// La documentación de este modelo salió de codeigniter, docu, ModelingData, Creating Your Model

use CodeIgniter\Model;

// La clase se debe llamar como el modelo por tanto se cambia UserModel por ProductModel
class ProductModel extends Model 
{
    // La info que viene a continuación es la configuración de la info, sale de codeigniter
    // docu, Modeling data, using codeigniter model, configuring your model
    protected $table      = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product','photo','price','description','animaltype'];

}