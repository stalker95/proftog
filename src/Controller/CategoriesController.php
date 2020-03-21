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
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
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

        
        $this->set('category', $category);
        $this->set('products', $products);

    }
}
