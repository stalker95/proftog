<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * Settings Controller
 *
 *
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController
{
    public function initialize(){
        parent::initialize();
        
        // Include the FlashComponent
        $this->loadComponent('Flash');

        $this->loadModel('Playlist');
        $this->loadModel('Settings');

        ini_set('memory_limit', '2048M');
        
    }
   

    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settings = $this->Settings->find()->first();
        $old_picture = $settings->logo;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settings = $this->Settings->patchEntity($settings, $this->request->getData());
            $settings->logo = $old_picture;

             if ($this->request->getData('image.error')['error'] == 0) {
            $mm_dir = new Folder(WWW_ROOT . DS . 'settings', true, 0777);
            $target_path = $mm_dir->pwd() . DS;
                    $this->Settings->updateAll(['logo' => ""], ['id' => $settings->id]);    
                    $img = $this->request->getData('image');
                    if ($img['name']) {
                        $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
                        $filename = md5(microtime(true)) . '.' . $ext;
                        move_uploaded_file($img['tmp_name'], $target_path . $filename);
                        $settings->logo=$filename;
                        $this->Settings->updateAll(['logo' => $filename], ['id' => $settings->id]);
                    }
                }
            if ($this->Settings->save($settings)) {                
                $this->Flash->admin_success(__('Зміни збережно'));

               return $this->redirect(['controller' => 'settings', 'action' => 'edit', 'prefix' => 'admin']);
            }
            $this->Flash->admin_error(__('Зміни не збережено. Спробуйте пізніше'));
        }
        $this->set('settings',$settings);
    }

    
}
