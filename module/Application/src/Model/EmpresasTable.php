<?php

namespace Application\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EmpresasTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getEmpresas($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveEmpresas(Empresas $empresas)
    {
        $data = [
            'nombre' => $empresas->nombre,
            'descripcion'  => $empresas->descripcion,
        ];

        $id = (int) $empresa->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getEmpresa($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update empresa with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteEmpresas($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}