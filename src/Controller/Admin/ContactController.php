<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Contact Controller
 *
 * @property \App\Model\Table\ContactTable $Contact
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController {
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->layout = 'admin';
        $contactus = $this->Contact->find('all')->toArray();
        if ($this->request->is('post')) {
            $path = 'img/uploads/';
            $data = $this->request->getData();
            $images = $data['image'];
            $contact_msg = 0;
            foreach ($images as $key => $image) {
                $fileName = '';
                $info = array();

                $contact_id = TableRegistry::get('Contact')->find()->where(['id' => $key])->first();
                if (!empty($contact_id)) {
                    if (!empty($image['name'])) {
                        $fileName =  time().'-'.$key.'-'.$image['name'];
                        
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
                        move_uploaded_file($image['tmp_name'], $uploadFile);
                    }
                    $info['name'] = $data['name'][$key];
                    $info['phone_no'] = $data['phone_no'][$key];
                    $info['whatsapp_no'] = $data['whatsapp_no'][$key];
                    if ($fileName != '') {
                        $info['image'] = $fileName;
                    }
                   
                    $contact = $this->Contact->patchEntity($contact_id, $info);
                    $this->Contact->save($contact);
                } else {
                    if (!empty($image['name'])) {
                        $fileName =  time().'-'.$key.'-'.$image['name'];
                        
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
                        move_uploaded_file($image['tmp_name'], $uploadFile);
                    }
                    // $fileName = $image['name'];
                    // $uploadPath = WWW_ROOT . $path;
                    // $uploadFile = $uploadPath . $fileName;
                    // move_uploaded_file($image['tmp_name'], $uploadFile);
                    $info['name'] = $data['name'][$key];
                    $info['phone_no'] = $data['phone_no'][$key];
                    $info['whatsapp_no'] = $data['whatsapp_no'][$key];
                    // $info['image'] = $fileName;
                    if ($fileName != '') {
                        $info['image'] = $fileName;
                    }
                    $contact = $this->Contact->newEntity();
                    $contact = $this->Contact->patchEntity($contact, $info);
                    $this->Contact->save($contact);
                }
                $contact_msg++;
                    
            }
            if ($contact_msg > 0) {
                $this->Flash->success(__('The Contact has been saved.'));
                return $this->redirect(['controller' => 'Contact', 'action' => 'add']);
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contactus'));
    }
    public function delete_contact($id = null) {
        $id = $this->Contact->get($id);
        if ($this->Contact->delete($id)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }
}
