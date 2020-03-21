<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Producers Controller
 *
 * @property \App\Model\Table\ProducersTable $Producers
 *
 * @method \App\Model\Entity\Producer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProducersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $producers = $this->paginate($this->Producers);

        $this->set(compact('producers'));
    }

    /**
     * View method
     *
     * @param string|null $id Producer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producer = $this->Producers->get($id, [
            'contain' => []
        ]);

        $this->set('producer', $producer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producer = $this->Producers->newEntity();
        if ($this->request->is('post')) {
            $producer = $this->Producers->patchEntity($producer, $this->request->getData());
            if ($this->Producers->save($producer)) {
                $this->Flash->success(__('The producer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producer could not be saved. Please, try again.'));
        }
        $this->set(compact('producer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producer = $this->Producers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producer = $this->Producers->patchEntity($producer, $this->request->getData());
            if ($this->Producers->save($producer)) {
                $this->Flash->success(__('The producer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producer could not be saved. Please, try again.'));
        }
        $this->set(compact('producer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producer = $this->Producers->get($id);
        if ($this->Producers->delete($producer)) {
            $this->Flash->success(__('The producer has been deleted.'));
        } else {
            $this->Flash->error(__('The producer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
