<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Managers Controller
 *
 *
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManagersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $this->loadModel('Users');

       $users  = $this->paginate($this->Users->find()->where(['is_admin' => 1]))->toArray();
       $this->set(compact('users'));
    }

    public function add()
    {
        $this->loadModel('Users');

        $_user = $this->Users->newEntity();
         if ($this->request->is('post')) {
         $_user = $this->Users->patchEntity($_user, $this->request->getData()); 
         $_user->is_admin = 1;

         if ($this->Users->save($_user)) {

            $this->Flash->admin_success(__('Менеджера додано'));
            return $this->redirect(['action' => 'index']);
            } else {
            $this->Flash->admin_error(__('Менеджера не додано. '));
            return $this->redirect(['action' => 'index']);
            
         }
     }

        $this->set(compact('_user'));
    }

    public function edit($id= null) {
      $this->loadModel('Users');
      if (!is_numeric($id) OR  !$this->Users->exists(['id' => $id])) {
        $this->Flash->admin_error(__('Користувача не знайденео'));
        return $this->redirect(['action' => 'index']);
      }
      
      $_user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
           
            if ($this->Users->save($_user)) {
                $this->Flash->admin_success(__('Данні змінено'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->admin_error(__('Данні не змінено. Спробуйте пізніше'));
        }
        $this->set('_user',$_user);
    }


 
}
