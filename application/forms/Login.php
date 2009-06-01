<?php

class Default_Form_Login extends Zend_Form
{
  public function init()
  {
	$this->setAction('/profile/login')
			  ->setMethod('post');
	
	$email = new Zend_Form_Element_Text('email', array('label' => 'Email'));
	$email ->setRequired(true)
              ->addDecorators(array(
                  array('HtmlTag', array('tag' => 'dd')),
                  array('Label', array('tag' => 'dt'))
                ));
                
    $password = new Zend_Form_Element_Password('password', array('label' => 'Mot de passe'));
	
	$this->addElement($email);
	$this->addElement($password);
	$this->addElement('submit', 'login', array('ignore' => true, 'label' => 'Login'));
    $this->addElement('hash', 'csrf', array('ignore' => true,));
  }
}



