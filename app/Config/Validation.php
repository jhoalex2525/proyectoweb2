<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $producto = [ // Acá se ponen los name que se tengan en el formulario
        'product' => 'required', //si se requiere mas de una validación se usa | ej: required|string
        'photo' => 'required',
        'price' => 'required',
        'description' => 'required',
        'animaltype' => 'required'
    ];
    
    public $productoeditado = [ // Acá se ponen los name que se tengan en el formulario
        'product' => 'required', //si se requiere mas de una validación se usa | ej: required|string
        'price' => 'required'
    ];

    public $mascota = [ // Acá se ponen los name que se tengan en el formulario
        'animalname' => 'required', //si se requiere mas de una validación se usa | ej: required|string
        'animalphoto' => 'required',
        'animalage' => 'required',
        'animaldescription' => 'required',
        'animaltype' => 'required'
    ];


    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
