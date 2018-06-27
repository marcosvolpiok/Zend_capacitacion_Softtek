<?php
namespace Application\Model;

class Empresas
{
    public $id;
    public $nombre;
    public $descripcion;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->nombre = !empty($data['nombre']) ? $data['nombre'] : null;
        $this->descripcion  = !empty($data['descripcion']) ? $data['descripcion'] : null;
    }
}