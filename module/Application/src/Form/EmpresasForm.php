<?php
namespace Application\Form;

use Zend\Form\Form;

class EmpresasForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('empresas');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nombre',
            'type' => 'text',
            'options' => [
                'label' => 'Nombre',
            ],
        ]);
        $this->add([
            'name' => 'descripcion',
            'type' => 'text',
            'options' => [
                'label' => 'Descripción',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Guardar',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}