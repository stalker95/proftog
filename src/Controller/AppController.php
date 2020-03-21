<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * @var App\Model\Entity\User
     */
    protected $employee;

    /**
     * @var App\Model\Entity\User
     */
    protected $user;

    /**
     * @var string
     */
    protected $action_name = '';

    /**
     * @var string
     */
    protected $php_self = '';

    /**
     * @var array
     */
    protected $nav_ = array(
        'dashboard'       => false,
        'category'        => false,
        'blogs'           => false, 
        'products'        => false, 
        'options'         => false, 
        'producers'       => false, 
        'attributes'      => false, 
        'content'         => false, 
        'seo'             => false, 
        'blog_categories' => false,
        'actions'         => false,
    );

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');


    if ($this->request->getParam('prefix') == 'admin') {
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => $this->request->getParam('prefix')
            ],
            'logoutAction' => [
                'controller' => 'Users',
                'action' => 'logout',
                'prefix' => $this->request->getParam('prefix')
            ],
            // 'authError' => 'Only logged user could access to this page. Please log in.',
            'authError' => false,
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'mail'],
                    'userModel' => 'Users'
                ]
            ],
            'storage' => 'Session'
        ]);
    }
    elseif ($this->request->getParam('controller')=="Main") {
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Main',
                'action' => 'login',
                'prefix' => $this->request->getParam('prefix')
            ],
            'logoutAction' => [
                'controller' => 'Main',
                'action' => 'logout',
                'prefix' => $this->request->getParam('prefix')
            ],
            // 'authError' => 'Only logged user could access to this page. Please log in.',
            'authError' => false,
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'mail'],
                    'userModel' => 'Users'
                ]
            ],
            'storage' => 'Session'
        ]);
    }
      else {
           $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'login',
                'prefix' => $this->request->getParam('prefix')
            ],
            'logoutAction' => [
                'controller' => 'Login',
                'action' => 'logout',
                'prefix' => $this->request->getParam('prefix')
            ],
            // 'authError' => 'Only logged user could access to this page. Please log in.',
            'authError' => false,
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'mail'],
                    'userModel' => 'Users'
                ]
            ],
            'storage' => 'Session'
        ]);

    }
        if ($this->request->getParam('prefix') == 'admin') {
            $this->Auth->__set('sessionKey', 'employees');
        } else {
            $this->Auth->__set('sessionKey', 'users');
        }

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Users');

        if ($this->request->getParam('prefix') == 'admin') {
            $this->viewBuilder()->setLayout('admin');
            if ($this->Auth->user('id')) {
                    $this->employee = $this->user = $this->Users->get($this->Auth->user('id'));
            } else {
                    $this->employee = $this->user = $this->Users->newEntity();
            }
        } else {
            if ($this->Auth->user('id')) {
            $this->user = $this->Users->get($this->Auth->user('id'));
        }
        }
    }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->set('action_name', $this->action_name);
        $this->set('controller_name', $this->php_self);
        $this->set('nav_', $this->nav_);
        $baseUrl = \Cake\Routing\Router::url('/', true);
        $baseUrl = rtrim($baseUrl, '/').'/';
        $this->set('baseUrl', $baseUrl);
        $this->set('employee', $this->employee);
        $this->set('user', $this->user);
        
        $this->loadModel('Categories');

        $categories = $this->Categories->find()->contain(['ChildCategories'])->order('Categories.position ASC')->toArray();
        $this->categories = $categories;
        $this->set('categories', $this->categories);
        
        $this->loadModel('Seo');




        $seo = $this->Seo->find()->first();
        $this->set(compact('seo')); 

        if ($this->request->getParam('prefix') == 'admin') {

            $this->set(compact('permition_count'));
        }
    }

    public function sendEmail($subject,$text)
    {
        $to = "";
        $email= new Email('default');
        $email->setTransport('default');
        $email->setEmailFormat('html');

        try {
        $res = $email
              ->setTo($to)
              ->setSubject($subject)                   
              ->send($text);

              //var_dump($res);
        } catch (Exception $e) {
            var_dump("ergerg");
            echo 'Exception : ',  $e->getMessage(), "\n";

        }

        
    }
}
