<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/14
 * Time: 3:41 PM
 */

namespace Slabs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SlabManagerController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }

    public function editAction()
    {
        $slabTable = $this->getServiceLocator()->get('SlabTable');
        $slab = $slabTable->getSlab($this->params()->fromRoute('id', 0));

        $viewModel = new ViewModel(array(
            'slab' => $slab,
        ));

        return $viewModel;
    }
} 