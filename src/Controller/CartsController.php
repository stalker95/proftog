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
        $this->loadModel('Producers');
        $this->loadModel('ProducersDiscounts');
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
      
      $products_discount = $this->Producers
                                ->find()
                                ->contain(['ProducersDiscounts'])
                                ->where(['Producers.id' => $_SESSION['cart'][$index]['product']['producer_id']])
                                ->first();

      $product_discount = $this->Products
                               ->find()
                               ->contain(['Discounts'])
                               ->where(['Products.id' => $_SESSION['cart'][$index]['product']['id']])
                               ->first();

        debug($products_discount->producers_discounts[0]['discount']);
      
      $persent = 0;
      $price_product = $_SESSION['cart'][$index]['product']['price'];
      if (!isset( $_SESSION['cart'][$index]['total_sum'])) {

        if (isset($products_discount->producers_discounts[0]['discount'])) {
            $new_price = $products_discount->producers_discounts[0]['discount'];
            $price_product = $price_product - ($price_product * ($new_price / 100)) ;
        }
        
        $fina_discount = 0;
        $data = date("Y-m-d H:i:s");
        debug($product_discount);
        foreach ($product_discount['discounts'] as $key => $values): 
           $date_compare1= date("d-m-Y", strtotime($data));
        // date now
    $date_compare2= date("d-m-Y", strtotime($values['end_data']));
    $start_data = date("d-m-Y", strtotime($values['start_data']));
    if ($date_compare1 < $date_compare2 AND $date_compare1 > $start_data) {
              echo "2";
                  $price_product = $price_product - $values['price'];
              break;
            }
        endforeach; 
        
        $sum = ($_SESSION['cart'][$index]['count'] * $price_product) + ($_SESSION['cart'][$index]['count'] * array_sum($_SESSION['cart'][$index]['array_option_value']));

         $_SESSION['cart'][$index]['total_sum'] = $sum;
         $_SESSION['cart'][$index]['one_price'] = $price_product;
      }


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

      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['product']['id'] == $data['id_product']) {
          unset($_SESSION['cart'][$key]);
        }
      }
    }

    public function list()
    {
      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      
      
      foreach ($_SESSION['cart'] as $key => $value) {
         $sum = ($value['count'] * $value['product']['price']) + ($value['count'] * array_sum($value['array_option_value']));
        // $_SESSION['cart'][$key]['total_sum'] = $sum;
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
        if (!isset($_SESSION['cart'][$key]['total_sum'])) {
            $sum = ($value['count'] * $value['product']['price']) + array_sum($value['array_option_value']);
            $_SESSION['cart'][$key]['total_sum'] = $sum;
            $sum = 0;
          }
      }

      $this->response->body(json_encode($_SESSION['cart']));
      return $this->response;
    }
}
