<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Wishlist Controller
 *
 *
 * @method \App\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WishlistController extends AppController
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
        
    }
    
    public function add()
    {
      $data = $this->request->getData();
      $id_product = $data['id_product'];
    
      if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
      }

      if (!in_array($data['id_product'], $_SESSION['wishlist'])) {
        array_push($_SESSION['wishlist'], $data['id_product']);

      }

    


      debug($_SESSION['wishlist']);

      $this->autoRender = false;
      $this->RequestHandler->renderAs($this, 'json');
      $this->response->disableCache();
      $this->response->type('application/json');
      $this->response->body(json_encode(array('result' => $data)));
    }
}
