<?php
namespace App\Controller\Admin;

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
        $this->Auth->allow(['forgot','resetpassword']);
        $this->nav_['users'] = true;
    }

	public function login()
	{
		if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            
            if ($user) {
                $this->Auth->setUser($user);
               
                if ($this->Auth->user('is_admin') == 0) {
                $this->Flash->admin_error(__('Access denied'));
                return $this->redirect(['action'=>'logout']);
                }

                if ($this->Auth->user('active') == 0) {
                $this->Flash->admin_error(__('Account is not active'));
                return $this->redirect(['action'=>'logout']);
                }

                if (!$this->request->getQuery('redirect')) {
                    return $this->redirect(['controller' => 'dashboard', 'action' => 'index', 'prefix' => 'admin']);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->admin_error(__('Invalid username or password, try again'));
        }
		$this->viewBuilder()->setLayout('login');
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
                $email= new Email('default');
                $email->setEmailFormat('html');
                $email->setTransport('default');
                $email->setSubject('Please confirm your reset password');
                $email->setTo($myemail);

                $baseUrl = \Cake\Routing\Router::url('/', true);
                $baseUrl = rtrim($baseUrl, '/').'/';

                $email->send('Hello '.$myemail.' Please click link below to reset your password <a href="'.$baseUrl.'/admin/users/resetpassword/'.$mytoken.'">Reser password</a> ');
            }
    	}
		$this->set('is_forgot', true);
        $this->viewBuilder()->setLayout('login');
        $this->render('login');
    }
    public function resetpassword($token) {
        if ($this->request->is('post')) {
            $hasher = new DefaultPasswordHasher();
            $mypass = $this->request->getData('password');
            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->find('all')->where(['token'=>$token])->first();
            
            $user->password = $mypass;
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

    public function index()
    {
        $users = $this->Paginate($this->Users->find()->order('Users.id DESC'))->toArray();
        $this->set(compact('users'));
    }

    public function edit($id = null) 
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->admin_success(__('Користувач збереженийй'));

                return $this->redirect(['controller'=>'users','action' => 'index']);
            }
            $this->Flash->admin_error(__('Данні не збережено. Спробуйте пізніше'));
        }
        $this->set(compact('program'));
    }
}
