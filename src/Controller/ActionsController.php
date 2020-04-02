<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController
{
    public function initialize()
    {
        
        parent::initialize();
        $this->Auth->allow(['view','index']);
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
        $data_today = date('Y-m-d H:i:s');
        $new_date = date('Y-m-d H:i:s', strtotime($data_today));

        $_monthsList = array(
            ".01." => "Січня",
            ".02." => "Лютого",
            ".03." => "Березня",
            ".04." => "Квітня",
            ".05." => "Травня",
            ".06." => "Червня",
            ".07." => "Липня",
            ".08." => "Серпня",
            ".09." => "Вересня",
            ".10." => "Жовтня",
            ".11." => "Листопада",
            ".12." => "Грудня"
        );

        $actions = $this->paginate($this->Actions->find()->where(['Actions.date_end >' => $new_date]))->toArray();

        //debug($actions);


        foreach ($actions as $key => $value):
         $datetime1 = date_create($value['date_end']); 
         $datetime2 = date_create($data_today); 
  
         // calculates the difference between DateTime objects 
         $interval = date_diff($datetime2, $datetime1); 
         $_mD = date(".m.", strtotime($value['date_end']));
         $value['month_end']   = $_monthsList[$_mD];
         $value['day_end'] = date('j', strtotime($value['date_end']));

         $_mD = date(".m.", strtotime($value['created']));
         $value['month_begin'] = $_monthsList[$_mD];
         $value['day_begin'] = date('j', strtotime($value['created']));
         $difference = (int)$interval->format('%R%a');

         $value['days_left'] = $difference;
         endforeach;

        $this->set(compact('actions'));
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $action = $this->Actions->get($id, [
            'contain' => ['ActionsProducts.Products']
        ]);

       // debug($action);

        $this->set('action', $action);
    }

}
