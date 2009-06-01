<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $users = new Default_Model_Users();
		$this->view->entries = $users->fetchAll();
    }

    public function signupAction()
    {
      $request = $this->getRequest();
      $form    = new Default_Form_Users();

      if ($this->getRequest()->isPost()) {
		if ($form->isValid($request->getPost())) {
		    $this->_helper->redirector('index');
		}
      }
      $this->view->form = $form;
    }
}



