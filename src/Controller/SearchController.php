<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Search Controller
 *
 *
 * @method \App\Model\Entity\Search[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','search']);

        $this->loadModel('Products');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

    }

    public function search()
    {

        $data = $this->request->getData();

        $name = $data['search'];
        $name = trim($name);

        $title_a = str_replace($name, "%".$name."%", $name);


        $products = $this->Products
        ->find('all')
        ->select(['title','slug','image', 'currency_id', 'price'])
        ->where(['title LIKE' => '%'.$name.'%'])
        ->orWhere(['title LIKE' => '%'.$name.' %'])
        ->orWhere(['title LIKE' => '%'.$name.'  %'])
        ->orWhere(['title LIKE' => $name.'%'])
        ->orWhere(['title LIKE' => $name.' %'])
        ->toArray();

      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $this->response->body(json_encode(array('products' => $products)));

    }

  
}
