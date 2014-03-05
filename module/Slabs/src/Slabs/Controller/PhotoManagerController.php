<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/14
 * Time: 3:55 PM
 */

namespace Slabs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PhotoManagerController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
} 