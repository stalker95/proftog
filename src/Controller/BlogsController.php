<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 *
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::initialize();
        $this->Auth->allow(['index','register','view']);
        $this->loadModel('BlogCategories');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
                'limit' => '2'
            ];

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
       
       



        $blogCategories = $this->BlogCategories->find()->toArray();
        $blogs = $this->Paginate($this->Blogs->find())->toArray();

        foreach ($blogs as $key => $value) {
            $_mD = date("m", strtotime($value['created']));
            $blogs[$key]['month'] = $_monthsList[$_mD];
        }

        $this->set(compact('blogs', 'blogCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        debug($slug);
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
        $blog = $this->Blogs->find()->contain(['BlogCategories'])->where(['Blogs.slug' => $slug])->first();

        $prev_post = $this->Blogs
                          ->find()
                          ->contain(['BlogCategories'])
                          ->where(['Blogs.id < ' <= $blog->id])
                          ->limit('1')
                          ->first();
     //   debug($prev_post);

        $next_post =  $this->Blogs
                          ->find()
                          ->contain(['BlogCategories'])
                          ->where(['Blogs.id > ' => $blog->id])
                          ->limit('1')
                          ->first();
      //  debug($next_post);

        $other_posts = $this->Blogs
                             ->find()
                             ->order(['id DESC'])
                             ->limit(2)
                             ->toArray();

        $_mD = date("m", strtotime($blog->created));

        foreach ($other_posts as $key => $value) {
           $_mDD = date("m", strtotime($value['created']));
            $other_posts[$key]['month'] = $_monthsList[$_mDD];
        }

        
        

        $blogCategories = $this->BlogCategories->find()->toArray();

        $this->set('blog', $blog);
        $this->set('blogCategories', $blogCategories);
        $this->set(compact('next_post', 'prev_post', 'other_posts'));
    }

    public function category($slug = null)
    {
        $blog_category = $this->BlogCategories->find()->where(['slug' => $slug])->first();
        $blogs = $this->Blogs->find()->contain(['BlogCategories'])->where(['category_id' => $blog_category->id])->toArray();
        
        $this->set('blogs', $blogs);

    }

}
