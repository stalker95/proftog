<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    public function initialize()
     {
        parent::initialize();
        $this->Auth->allow(['index']);
        $this->loadComponent('Flash');
        $this->loadModel('Aboutus');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contacts = $this->Contacts->find()->first();

        $this->set(compact('contacts'));
    }

}
