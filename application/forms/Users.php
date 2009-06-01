<?php

class Default_Form_Users extends Zend_Form
{
  public function init()
  {
    $this->setMethod('post');
    $this->addElement('text', 'email', array(
        'label'     => 'Your email:',
        'required'  => true,
        'filters'   => array('StringTrim'),
        'validator' => array('EmailAddress')
    ));

    $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Guestbook',
        ));

    $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
  }
}