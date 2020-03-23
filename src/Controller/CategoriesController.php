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

        $products = $this->Paginate($this->Products->find()->where(['category_id' => $category->id]))->toArray();

        $this->viewBuilder()->setLayout('category');

        
        $this->set('category', $category);
        $this->set('products', $products);

    }
}
