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

        if (!isset($_SESSION['visits'])) {
            $_SESSION['visits'] = [];
        }

        $this->viewBuilder()->setLayout('product');



        $product = $this->Products->find()->contain(['AttributesProducts','Categories','Categories.ParentCategories','Categories.ParentCategories.ParentCategories','Rewiev','Producers','Discounts','ProductsGallery'])->where(['Products.slug' => $slug])->first();

        if (!in_array($product->id, $_SESSION['visits'])) {
            array_push($_SESSION['visits'], $product->id);
        }



        $attributes_products = $this->AttributesProducts->find()->contain(['AttributesItems'  => [
                                                                     'conditions' => [
                                                                       'AttributesItems.parent_id' => 8
                                    ]]])->where(['AttributesProducts.product_id' => $product->id])->toArray();

        $main_attributes =  $this->AttributesProducts
                                    ->find()
                                    ->contain(['AttributesItems','AttributesItems.ParentAttributesItems' => [
                                                                     'conditions' => [
                                                                       'ParentAttributesItems.id' => 8
                                    ]],
                                        'AttributesItems.AttributesProducts' => [
                                                                     'conditions' => [
                                                                       'AttributesProducts.product_id' => $product->id
                                    ]]])
                                    ->where(['AttributesProducts.product_id' => $product->id])
                                    
                                    ->toArray();

        $option_group = $product->getOptionsGroup($product->id);
        $option_group_json = json_encode($option_group);

        $products = $this->Products
                         ->find('all')
                         ->limit(10)
                         ->contain(['ActionsProducts','ActionsProducts.Actions', 'Discounts', 'Rewiev'])
                         ->where(['category_id' => $product->category_id])
                         ->where(['id !=' => $product->id])
                         ->toArray();


        if (empty($product)) {
            return $this->redirect(['controller'=>'main', 'action'=>'indx']);          
        }
      
        $this->set('product', $product);
        $this->set(compact('attributes_products','option_group','option_group_json', 'products', 'main_attributes'));
    }

}
