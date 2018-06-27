<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\EmpresasTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EmpresasController extends AbstractActionController
{

    // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(EmpresasTable $table)
    {
        $this->table = $table;
    }




    public function indexAction()
    {
        //return new ViewModel();

        //var_dump($this->table->fetchAll());
        //die;


        return new ViewModel([
            'empresas' => $this->table->fetchAll(),
        ]);        
    }



    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }    
}
