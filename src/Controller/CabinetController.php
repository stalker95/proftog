<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cabinet Controller
 *
 *
 * @method \App\Model\Entity\Cabinet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CabinetController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $id = $this->Auth->user('id');

       $_user = $this->Users->get($id);

       $_monthsList = array(
            "01" => "Січня",
            "02" => "Лютого",
            "03" => "Березня",
            "04" => "Квітня",
            "05" => "Травня",
            "06" => "Червня",
            "07" => "Липня",
            "08" => "Серпня",
            "09" => "Вересня",
            "10" => "Жовтня",
            "11" => "Листопада",
            "12" => "Грудня"
        );
       
       $_mD = date("m", strtotime($_user->created));
         $_user->month_begin = $_monthsList[$_mD];

       if ($this->request->is('post')) {

        $_user = $this->Users->patchEntity($_user, $this->request->getData());
            if ($this->Users->save($_user)) {
                debug($_user);
                $this->Flash->admin_success(__('Зміни збережно'));

                return $this->redirect(['action' => 'index']);
            }

       } 

    
       $this->set(compact('_user','_monthsList'));
        
    }

    public function changeData()
    {
      $this->autoRender = false;
    // debug($this->request);
      if ($this->request->is('put')) {
        $id = $this->Auth->user('id');

       $_user = $this->Users->get($id);

        $_user = $this->Users->patchEntity($_user, $this->request->getData());
        $_user->role = 0;
        //debug($_user);
            if ($this->Users->save($_user)) {
               // debug($_user);
                //$this->Flash->admin_success(__('Зміни збережно'));

                return $this->redirect(['action' => 'index']);
            }

       } 

    }

    public function change()
    {
    	$id = $this->Auth->user('id');

       $_user = $this->Users->get($id);

       $this->set(compact('_user'));
    }

    public function wishlist()
    {
        $this->loadModel('Wishlists');
        $id = $this->Auth->user('id');
        
       $wishlist = $this->Wishlists->find()->contain(['Products','Products.Actions','Products.Rewiev','Products.Discounts'])->where(['user_id' => $id])->toArray();

       $this->set(compact('wishlist'));

    }

    public function deletechecked()
    {
      $this->loadModel('Wishlists');
      $id = $this->Auth->user('id');

       $_user = $this->Users->get($id);

            $ids=$this->request->getData('ids');
     $this->request->allowMethod(['post', 'delete']);

     foreach ($ids as $key => $value) {
       $user_wishlist = $this->Wishlists->find()->where(['user_id' => $_user->id])->where(['product_id' => $value])->first();
       $this->Wishlists->delete($user_wishlist);
       return $this->redirect(['action' => 'wishlist']);

     }

    }

    public function buyAllList()
    {
      $this->loadModel('Wishlists');
      $id = $this->Auth->user('id');

       $_user = $this->Users->get($id);

       $wishlists = $this->Wishlists->find()->contain('Products')->where(['user_id' => $_user->id])->toArray();

       foreach ($wishlists as $key => $value) {

         $index = $value['product']['id']."_".""."_";
         if (!isset($_SESSION['cart'][$index])) {
         $_SESSION['cart'][$index] = [];

         $_SESSION['cart'][$index]['count'] = 1;
         $_SESSION['cart'][$index]['product'] = $value['product'];
         $_SESSION['cart'][$index]['array_options_name'] = [];
         $_SESSION['cart'][$index]['array_option_item'] = [];
         $_SESSION['cart'][$index]['array_option_value'] = [];
       }

    }
    return $this->redirect(['controller' => 'orders', 'action' => 'index']);
  }

  public function orders()
  {
    $id = $this->Auth->user('id');

    $this->loadModel('Orders');
    $this->loadModel('OrdersItems');
    $orders = $this->Paginate($this->Orders->find()->contain(['OrdersItems','OrdersItems.Products'])->where(['Orders.user_id' => $id]))->toArray();
   // debug($orders);

    foreach ($orders as $key => $value) {
       $orders[$key]['total_from_orders_items'] = array_sum(array_column($value['orders_items'], 'summa'));
    }

    $this->set(compact('orders'));
  }

  public function review()
  {
    $id = $this->Auth->user('id');
     $_user = $this->Users->get($id);
     $this->loadModel('Rewiev');

     $reviews = $this->Paginate($this->Rewiev->find()->contain(['Products'])->where(['Rewiev.user_email' => $_user->mail]))->toArray();

     $this->set(compact('reviews'));

  }

 
}
