<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * GeneralNotes Controller
 *
 * @property \App\Model\Table\GeneralNotesTable $GeneralNotes
 *
 * @method \App\Model\Entity\GeneralNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneralNotesController extends AppController
{
   

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout='admin';
            $generalNotes = $this->GeneralNotes->find('all')->toArray();
       
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $generalNotes = $data['general_note'];
            
            $note_msg = 0;
            $info = array();
            foreach ($generalNotes as $key => $note) {
                $general_id =TableRegistry::get('GeneralNotes')->find()->where(['id'=>$key])->first();
                if(!empty($general_id)){
                    $info['general_note'] = $note;
                    $generalNote = $this->GeneralNotes->patchEntity($general_id, $info);
                    $this->GeneralNotes->save($generalNote);
                }else{
                $info['general_note'] = $note;    
                $generalNote = $this->GeneralNotes->newEntity();
                $generalNote = $this->GeneralNotes->patchEntity($generalNote, $info);
                $this->GeneralNotes->save($generalNote);

                }
               
                $note_msg++;

            }
            
            if ($note_msg>0) {
                $this->Flash->success(__('The general note has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The general note could not be saved. Please, try again.'));
        }
        $this->set(compact('generalNotes'));
    }


    public function delete_general_note($id = null)
    {
        
        $id = $this->GeneralNotes->get($id);
        if ($this->GeneralNotes->delete( $id)) {
            $this->Flash->success(__('The chalet general note has been deleted.'));
        } else {
            $this->Flash->error(__('The chalet general note could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    } 


   
}
