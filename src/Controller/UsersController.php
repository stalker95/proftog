<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	protected $php_self = 'Users';

    public function initialize()
    {
        
        parent::initialize();
        $this->Auth->allow(['forgot','resetpassword','logout','login']);
        $this->nav_['users'] = true;
    }

	public function login()
	{
		if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            
            if ($user) {
                $this->Auth->setUser($user);
                
                if (!$this->request->getQuery('redirect')) {
                    return $this->redirect(['controller' => 'dashboard', 'action' => 'index', 'prefix' => 'admin']);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->admin_error(__('Invalid username or password, try again'));
        }
		$this->viewBuilder()->setLayout('default');
	}

	public function forgot()
    {
    	if ($this->request->is(['post', 'put'])) {
            $myemail=$this->request->getData('mail');
            $mytoken=Security::hash(Security::randomBytes(25));
            
            $usersTable=TableRegistry::get('Users');
            $user=$usersTable->find('all')->where(['mail'=>$myemail])->first();
            $user->password='';
            $user->token=$mytoken;
            if ($usersTable->save($user)) {
                $this->Flash->admin_success('Reset password link was benn sent to your email');
                Email::configTransport('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 465,
                    'username' => '35b090f1ed4fe2',
                    'password' => '24238598e6b61f',
                    'className'=> 'Smtp'
                ]);

                $email= new Email('default');
                $email->emailFormat('html');
                $email->transport('mailtrap');
                $email->from('andrsaw4@gmail.com', 'Andrii Savchynetch');
                $email->subject('Please confirm your reset password');
                $email->to($myemail);
                
                $email->send('Hello '.$myemail.' Please click link below to reset your password <a href="http://omry/admin/users/resetpassword/'.$mytoken.'">Reser password</a> ');
            }
    	}
		$this->set('is_forgot', true);
        $this->viewBuilder()->setLayout('login');
        $this->render('login');
    }
    public function resetpassword($token) {
        if ($this->request->is('post')) {
            $hasher=new DefaultPasswordHasher();
            $mypass=$this->request->getData('password');
            $usersTable=TableRegistry::get('Users');
            $user= $usersTable->find('all')->where(['token'=>$token])->first();
            
            $user->password=$mypass;
            if ($usersTable->save($user)) {
                $this->Flash->admin_success('Password was changed');
                return $this->redirect(['action'=>'login']);
            }
        }
        $this->viewBuilder()->setLayout('login');
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function registerMain()
    {
                $this->autoRender = false;

       $this->RequestHandler->renderAs($this, 'json');  
       $this->response->disableCache();
       $this->response->type('application/json'); 

         $_user = $this->Users->newEntity();
         
         if ($this->request->is('post')) {
         $_user = $this->Clients->patchEntity($_user, $this->request->getData()); 
         $pass = md5($_user->id.md5(substr(md5(time()), 0, 50)).time());
         $_user->password = $pass;

         if ($this->Clients->save($_user)) {
          $_user->hash = md5($_user->id.md5(substr(md5(time()), 0, 50)).time());
          $this->Clients->save($_user);
            $this->Auth->setUser($_user);

             $text = 'Привет '.$_user->login.' Ваш пароль: '.$this->request->getData('password');
             $subject = 'Поздравляем с регистрацией';
             $to = $_user->email;
             $this->sendEmail($to, $subject, $text);
             $this->response->body(json_encode(array('status'=>true, 'message' => '')));

             return $this->response; 
            }
            else {
            $error_msg = [];
            foreach ($_user->getErrors() as $errors) {
                if (is_array($errors)) {
                    foreach ($errors as $error) {
                        $error_msg[] = $error."<br>";
                    }
                } else {
                    $error_msg[] = $errors;
                }
              }
             $this->response->body(json_encode(array('status'=>false, 'message' => $error_msg)));
             return $this->response; 
            }

        }

    }
}
