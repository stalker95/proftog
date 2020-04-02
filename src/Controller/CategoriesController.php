<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
     public function initialize()
    {
        
        parent::initialize();
        $this->Auth->allow(['index','view']);
        $this->loadModel('Products');
        $this->loadModel('Attributes');
        $this->loadModel('Producers');
        $this->loadModel('AttributesProducts');
        $this->loadModel('AttributesItems');
        $this->nav_['users'] = true;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategories']
        ];
        $categories_main = $this->Categories->find()->contain(['ChildCategories.Products'])->toArray();
        $count = 0;
        foreach ($categories_main as $key => $value) {
            if ($value['parent_id'] == 0) {
            foreach ($value['child_categories'] as $keys => $item) {
                $count = $count + count($item['products']);
            }
            $categories_main[$key]['product_count'] = $count;
            $count = 0;
    }
}
           // debug($categories_main);

            $this->set(compact('categories_main'));

}

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $category = $this->Categories->find()->where(['slug' => $slug])->first();
        $id = $category->id;

        $attributes_items = $this->AttributesItems->newEntity();
        $producers = $this->Producers->newEntity();

        $producers_list = $producers->getAllProducers($id);

        $min_price = 0;
        $current_value_min = 0;
        $selected_values = [];
       

        $products = $this->Paginate(
                    $this->Products
                         ->find()
                         ->contain(['Actions','Producers'])
                         ->where(['category_id' => $category->id]))
                         ->toArray();
                       //  debug($products);

        $max_price = $this->Products->find('all',[
                    'fields' => array('amount' => 'MAX(Products.price)')])->toArray();

        $max_price = $max_price[0]['amount'] * 30;
        $current_value_max = $max_price;
        
        $id_products = array_column($products, 'id');
       
        $attributes_to_view = $attributes_items->getListAttributesBeforeFilter($id);
        if ($this->request->is(['post', 'put'])) {
            
            $attibutes_items = [];
            $attributes_names = [];
            $producers = [];
            foreach ($this->request->getData() as $key => $value) {
                if (stristr($key, 'checkbox')) {
                    $item_checkbox = explode('_', $key);
                    array_push($attibutes_items, $item_checkbox[2]);
                    array_push($attributes_names, $item_checkbox[1]);
                }

                if (stristr($key, 'producer')) {
                    $item_checkbox = explode('_', $key);
                    array_push($producers, $item_checkbox[2]);
                }
            }
            $products_attributes = [];        

            if (!empty($attibutes_items) AND !empty($attributes_names)) {
            $products_attributes = $this->AttributesProducts
                                        ->find()
                                        ->select(['product_id'])
                                        ->where(['attribute_id IN' => $attibutes_items])
                                        ->where(['value IN' => $attributes_names])
                                        ->toArray();
            }
            
            $query_for_products = $this->Products
                                        ->find()
                                        ->contain(['Actions'])
                                        ->where(['category_id' => $category->id])
                                        ->where(['price >=' => $this->request->getData('start_price')])
                                        ->where(['price <=' => $this->request->getData('end_price')]);

            if (!empty($products_attributes)) {
                $query_for_products = $query_for_products->where(['id IN ' => array_column($products_attributes,'product_id')]);
            }

             if (!empty($producers)) {
                $query_for_products = $query_for_products->where(['producer_id  IN ' => $producers]);
            }

            $products = $this->Paginate($query_for_products)->toArray();

          $data = $this->request->getData();
          $selected_values = $this->request->getData();
        //  debug($attibutes_items);

          

          $min_value  = $this->request->getData('start_price');
          $max_value  = $this->request->getData('end_price');
          $this->set('min_price', $min_value);
          $this->set('max_price', $max_value);
          $this->set('selected_values', $selected_values);
        }
        else {
        $this->set('selected_values', $selected_values);
        $this->set('max_price', $max_price);
        $this->set('min_price', $min_price);
        }

        $this->viewBuilder()->setLayout('category');

        $this->set('current_value_min', $current_value_min);
        $this->set('current_value_max', $current_value_max);

        $this->set('category', $category);
        $this->set('products', $products);
        $this->set('attributes_to_view', $attributes_to_view);
        $this->set('producers_list', $producers_list);


    }
}
