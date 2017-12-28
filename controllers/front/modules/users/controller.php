 <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class usersController 
{ 
    public $aLayout = array('login'=>'main');
    public $aLoginRequired = array('login'=>false,'logout'=>true);
    
    public function __construct() 
    {
        global $sAction;
        global $oUser;
        global $oSession;
        
        if($this->aLoginRequired[$sAction])
        {                   
            if(!$oUser->isLoggedin())
            {
                redirect(getConfig('siteUrl').'/'.getConfig('loginModule').'/'.getConfig('loginAction'));
            }
      }
    }
     public function callLogin()
    {
        global $oSession;
        global $oUser;
       
        $sMessage =__('user_logged_in_successfully');
        $sEmail =  isset($_POST['email']) ? $_POST['email'] : '';
        $sPassword =  isset($_POST['password']) ? $_POST['password'] : '';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $sTableName = 'users';   
            $aFields = array
                           (   
                                array 
                                    (
                                        'field'=>'wrong_credentials',
                                        'aCredentials'=>array('email','password'),
                                        'aDataForSession'=>  array('id_user','email'),
                                        'tableName'=>$sTableName,
                                        'value'=>array($sEmail,$sPassword),
                                        'validation'=>'isLoggedin',
                                        'message'=>__('adminname_or_password_is_not_valid')
                                    ),
                                array 
                                    (
                                        'field'=>'email',
                                        'value'=>$sEmail,
                                        'validation'=>'required',
                                        'message'=>__('email_required')
                                    ),
                                array 
                                    (
                                        'field'=>'password',
                                        'value'=>$sPassword,
                                        'validation'=>'required',
                                        'message'=>__('password_required')
                                    )
                          );
            $bIsValid = $oUser->validateData($aFields);
            if($bIsValid)
            {         
                 $oUser->doLogin($bIsValid);
                 $oUser->isLoggedin();
                 $oSession->setSession('sDisplayMessage',$sMessage);
                 $oSession->setSession('sDisplayName', $bIsValid[0]['email']);
                 redirect(getConfig('siteUrl').'/'.getConfig('homeModule').'/'.getConfig('homeAction'));
             }
        }
        if($oUser->isLoggedin())
        {
            redirect(getConfig('siteUrl').'/'.getConfig('homeModule').'/'.getConfig('homeAction'));
        }
        else
        {    
            require 'login.tpl.php';
        }   
    }
    public function callLogOut()
    {   
        global $oUser;

        $oUser->doLogOut();
        unset($oUser);
        redirect(getConfig('siteUrl').'/users/login');
    }

}
           