<?php
/***************************************************************************************/
/*                                                                                     */ 
/* Source   : application/controllers/ProfileController.php                            */
/* Auteur   : Emmanuel Convers                                                         */
/* Cr�ation : 31/05/2009                                                               */
/*                                                                                     */
/* Objectif : Classe controller pour la gestion de la page du profil utilisateur       */
/*                                                                                     */
/*                                 MODIFICATIONS                                       */
/* ----------------------------------------------------------------------------------- */
/*  Auteur | Date       | Description                                                  */
/* --------|------------|------------------------------------------------------------- */
/*   ECON  | 31/05/2009 | Exemple de cartouche d'en-t�te de fichier                    */
/* --------|------------|------------------------------------------------------------- */
/*   NPER  | 01/05/2009 | C'est de la merde ce cartouche il fait plus de 80 caracteres */
/* --------|------------|------------------------------------------------------------- */
/*                                                                                     */
/***************************************************************************************/

class ProfileController extends Zend_Controller_Action
{
	///////////////////////////
	// Fonctions disponibles //
	///////////////////////////
	
	public function init()
	{
		
	}
	
	public function getFormLogin()
	{
		$formLogin = new Zend_Form();
		$formLogin->setAction('/profile/login')
				  ->setMethod('post');
		
		$email = new Zend_Form_Element_Text('email', array('label' => 'Email'));
		$email ->setRequired(true)
               ->addDecorators(array(
                   array('HtmlTag', array('tag' => 'dd')),
                   array('Label', array('tag' => 'dt'))
                 ));
                 
        $password = new Zend_Form_Element_Password('password', array('label' => 'Mot de passe'));
		
		$formLogin->addElement($email);
		$formLogin->addElement($password);
		$formLogin->addElement('submit', 'login', array('label' => 'Login'));
				
		return $formLogin;
	}
	
	/////////////////////////
	// Actions disponibles //
	/////////////////////////	
	
	public function indexAction()
	{
	   $request = $this->getRequest();
       
       if ($this->getRequest()->isPost()) {
            
        } else {
          $formLogin = new Default_Form_Login();
          $this->view->formLogin = $formLogin;
	    }
	}
	
	public function loginAction()
    {
	    $dbAdapter = $this->getFrontController()->getParam('bootstrap')->getResource('db'); 
	    $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter,'users','emailUsr','pwdUsr');
	    $authAdapter->setIdentity('nicolas@alain.com')
					->setCredential('12345678');
	    $result = $authAdapter->authenticate();
	    print_r($authAdapter->getResultRowObject());
    }
}
?>