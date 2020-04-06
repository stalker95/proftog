<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Socials Controller
 *
 * @property \App\Model\Table\SocialsTable $Socials
 *
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $socials = $this->paginate($this->Socials);

        $this->set(compact('socials'));
    }

    public function edit()
    {
        
    }

}
