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
     public function initialize()
    {
        
        parent::initialize();
        $this->Auth->allow(['index','view']);
        $this->loadModel('Products');
        $this->nav_['users'] = true;
    }
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
        $data_today = date('Y-m-d H:i:s');
        $new_date = date('Y-m-d H:i:s', strtotime($data_today));

        $producer = $this->Producers->get($id);

        $title = $producer->title;
        $description = $producer->description_page;
        $keywords = $producer->keywords;

        $products = $this->Products->find()->contain(['Actions' => [
                                                                     'conditions' => [
                                                                       'Actions.date_end >' => $new_date
            ]]
        ])->where(['producer_id' => $producer->id])->toArray();

        //debug($products);

         $this->viewBuilder()->setLayout('producer');

        $this->set('producer', $producer);
        $this->set('products', $products);
    }
}
