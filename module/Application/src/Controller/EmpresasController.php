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
use Application\Form\EmpresasForm;
use Application\Model\Empresas;



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
        $form = new EmpresasForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $empresas = new Empresas();
        $form->setInputFilter($empresas->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $empresas->exchangeArray($form->getData());
        $this->table->saveEmpresas($empresas);
        return $this->redirect()->toRoute('empresasList');        
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {

        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('empresasList');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteEmpresas($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('empresasList');
        }

        return [
            'id'    => $id,
            'empresas' => $this->table->getEmpresas($id),
        ];        
    }    
}
