<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Compares Controller
 *
 *
 * @method \App\Model\Entity\Compare[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComparesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->autoRender = false;
       if (isset($_SESSION['compares'])) {
            print_r($_SESSION['compares']);
       }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $data = $this->request->getData();
      $id_product = $data['id_product'];
 
      if (!isset($_SESSION['compares'])) {
        $_SESSION['compares'] = [];
      }

      if (!in_array($data['id_product'], $_SESSION['compares'])) {
        array_push($_SESSION['compares'], $data['id_product']);

      }

      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $this->response->body(json_encode(array('result' => $data)));
    }

}
