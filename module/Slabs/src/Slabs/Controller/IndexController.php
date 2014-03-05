<?php
namespace Slabs\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $slabTable = $this->getServiceLocator()->get('SlabTable');
        $viewModel = new ViewModel(array('slabs' => $slabTable->fetchAll()));
        return $viewModel;
    }
}