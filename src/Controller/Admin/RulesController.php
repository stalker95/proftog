<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Rules Controller
 *
 * @property \App\Model\Table\RulesTable $Rules
 *
 * @method \App\Model\Entity\Rule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RulesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rules = $this->Rules->find()->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rules = $this->Rules->patchEntity($rules, $this->request->getData());
            if ($this->Rules->save($rules)) {
                $this->Flash->success(__('Зміни збережено'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Зміни не збережено. Спробуйте пізніше'));
        }
        $this->nav_['content'] = true;
        $this->set(compact('rules'));
    }

   
}
