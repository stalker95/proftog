<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Carts Controller
 *
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','add', 'change', 'delete', 'list', 'cart']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carts = $this->paginate($this->Carts);

        $this->set(compact('carts'));
    }
    
    public function add()
    {
      session_start();
      $this->loadModel('Products');
      $data = $this->request->getData();
      //debug($data);
      
      $options_name = [];
      $options_items = [];

      array_push($options_name, $data['total_options_name']);
      array_push($options_items, $data['total_options']);
      
      $names = implode("_", $options_name[0]);
      $types = implode("_", $options_items[0]);

     // debug($names);
     // debug($types);

      $index = $data["product_id"].'_'.$names.'_'.$types;

      $product = $this->Products->find()->where(['id' => $data["product_id"]])->first();
      
      if (!isset($_SESSION['cart'][$index])) {
        var_dump("e4rgerg");

         $_SESSION['cart'][$index] = [];
         $_SESSION['cart'][$index]['count'] = $data['count_id_bascket'];
         $_SESSION['cart'][$index]['product'] = $product;
         

      $_SESSION['cart'][$index]['array_options_name'] = [];
      $_SESSION['cart'][$index]['array_option_item'] = [];
      $_SESSION['cart'][$index]['array_option_value'] = [];

      foreach ($data['array_options_name'] as $key => $value):
       array_push($_SESSION['cart'][$index]['array_options_name'], $value);
       array_push($_SESSION['cart'][$index]['array_option_item'], $data['total_options_name'][$key]);
       array_push($_SESSION['cart'][$index]['array_option_value'], $data['total_options'][$key]);
      endforeach;


      }
      else {
        $_SESSION['cart'][$index]['count'] = $_SESSION['cart'][$index]['count'] + $data['count_id_bascket'];
        var_dump("reg");
      }

    
     debug($_SESSION['cart']);


      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $this->response->body(json_encode(array('result' => $data)));
    }

    public function change()
    {
      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $data = $this->request->getData();

      $_SESSION['cart'][$data['key']]['count'] = (int)$data['count'];
    }

    public function delete()
    {
      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $data = $this->request->getData();

      unset($_SESSION['cart'][$data['id_product']]);
    }

    public function list()
    {
      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      
      
      foreach ($_SESSION['cart'] as $key => $value) {
         $sum = ($value['count'] * $value['product']['price']) + ($value['count'] * array_sum($value['array_option_value']));
         $_SESSION['cart'][$key]['total_sum'] = $sum;
         $sum = 0;
      }

      $this->response->body(json_encode(array('products' => array_values($_SESSION['cart']))));
    }

    public function cart()
    {
      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      
      
      foreach ($_SESSION['cart'] as $key => $value) {
         $sum = ($value['count'] * $value['product']['price']) + array_sum($value['array_option_value']);
         $_SESSION['cart'][$key]['total_sum'] = $sum;
         $sum = 0;
      }

      $this->response->body(json_encode($_SESSION['cart']));
      return $this->response;
    }
}
