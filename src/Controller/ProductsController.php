<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
        $this->loadModel('AttributesProducts');
        $this->loadModel('AttributesItems');
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {

        $product = $this->Products->find()->contain(['AttributesProducts','Categories'])->where(['Products.slug' => $slug])->first();

        $attributes_products = $this->AttributesProducts->find()->contain(['AttributesItems'])->where(['product_id' => $product->id])->toArray();

        if (empty($product)) {
            return $this->redirect(['controller'=>'main', 'action'=>'indx']);          
        }
      
        $this->set('product', $product);
        $this->set(compact('attributes_products'));
    }

}
