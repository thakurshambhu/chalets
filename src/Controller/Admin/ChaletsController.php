<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
// use Cake\ORM\TableRegistry;

/**
 * Chalets Controller
 *
 * @property \App\Model\Table\ChaletsTable $Chalets
 *
 * @method \App\Model\Entity\Chalet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChaletsController extends AppController
{
    

    /**
     * View method
     *
     * @param string|null $id Chalet id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $this->loadModel('BookChalets');
        $chalet = $this->Chalets->get($id, [
            'contain' => ['Details', 'Images'],
        ]);

          $bookChalets = TableRegistry::get('BookChalets');
          $bookedDate = $bookChalets->find()->select(['id','chalet_id', 'start_date','created','modified'])
              ->where(['chalet_id' => $id])->toArray();
          $this->set(compact('bookedDate',$bookedDate,'chalet',$chalet));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout='admin';
        $this->loadModel('Images');
        $this->loadModel('Details');
        $chalet = $this->Chalets->newEntity();
        if ($this->request->is('post')) {
            $chaletsTable= TableRegistry::get('Chalets');
           
            $order_id=$chaletsTable->find('all',
            array('order'=>'Chalets.order_id DESC'))->first();
            if(!empty($order_id)){
                $new_order_id = $order_id['order_id']+1;
            }else{
                $new_order_id = 1;
            }
            $data = $this->request->getData();
            $data['order_id'] = $new_order_id;
            
            $chalet = $this->Chalets->patchEntity($chalet, $data);
            if ($this->Chalets->save($chalet)) {
                $data = $this->request->getData();
                $details = $data['description'];
                if(!empty($details)) {
                    foreach ($details as $detail) {

                          $description = $this->Details->newEntity();
                          $description->description = $detail;
                          $description->chalet_id = $chalet->id;
                          $this->Details->save($description);
                    }
                }else{
                         $this->Flash->error(__('Please insert descriptions.'));
                }
                
                $images = $data['image'];
                $path = 'img/uploads/';
                foreach ($images as $image) {
                     if(!empty($image['name'])) {
                        $fileName = $image['name'];
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
                        if(move_uploaded_file($image['tmp_name'], $uploadFile)) {
                            $uploadedImage = $this->Images->newEntity();
                            $uploadedImage->name = $fileName;
                            $uploadedImage->chalet_id = $chalet->id;
                            $this->Images->save($uploadedImage);

                        }else{
                            // $this->Flash->error(__('Unable to upload image, please try again.'));
                        }
                     }else{
                             // $this->Flash->error(__('Please choose an image to upload.'));
                        }

                }
                $this->Flash->success(__('The chalet has been saved.'));

                return $this->redirect(['controller'=>'Chalets','action' => 'dashboard']);
            }
            $this->Flash->error(__('The chalet could not be saved. Please, try again.'));
        }
        $this->set(compact('chalet'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chalet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $this->loadModel('Images');
        $this->loadModel('Details');
        $chalet = $this->Chalets->get($id, [
            'contain' => ['Details', 'Images'],
        ]);
        $this->set('chalet', $chalet);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note_msg = 0;
            $chalet = $this->Chalets->patchEntity($chalet, $this->request->getData());
            if ($this->Chalets->save($chalet)) {
                $data = $this->request->getData();
                $detils = $data['description'];
                $info = array();
                foreach ($detils as $key => $detil) {
                    $details_id =TableRegistry::get('Details')->find()->where(['id'=>$key])->first();
                    if(!empty($details_id)){
                        $info['description'] = $detil;
                        $info['chalet_id'] = $id;
                        $details = $this->Details->patchEntity($details_id, $info);
                        $this->Details->save($details);
                    }else{
                    $info['description'] = $detil;
                    $info['chalet_id'] = $id;    
                    $details = $this->Details->newEntity();
                    $details = $this->Details->patchEntity($details, $info);
                    $this->Details->save($details);

                    }
                   
                    $note_msg++;

                }
            $path = 'img/uploads/';
            $data = $this->request->getData();
            $images = $data['image'];
            $imginfo = array();
            foreach ($images as $key => $image) {
                if(!empty($image['name'])){
                    $fileName = '';
                    $image_id = TableRegistry::get('Images')->find()->where(['id' => $key])->first();
                    if (!empty($image_id)) {
                        if (!empty($image['name'])) {
                            $fileName = time().'-'.$image['name'];
                           
                            $uploadPath = WWW_ROOT . $path;
                            $uploadFile = $uploadPath . $fileName;
                            move_uploaded_file($image['tmp_name'], $uploadFile);
                        }
                      
                        if ($fileName != '') {
                            $imginfo['name'] = $fileName;
                        }

                        $imginfo['chalet_id'] = $id;

                        $image_update = $this->Images->patchEntity($image_id, $imginfo);
                        $this->Images->save($image_update);
                    } else {
                        $fileName = time().'-'.$image['name'];
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
                        move_uploaded_file($image['tmp_name'], $uploadFile);
                       
                        $imginfo['image'] = $fileName;
                        $imginfo['chalet_id'] = $id;
                        $images = $this->Images->newEntity();
                        $images = $this->Images->patchEntity($images, $imginfo);
                        $this->Images->save($images);
                    }  
                    $note_msg++;
                }
                    
            }  
               
             if($note_msg>0){ 

                $this->Flash->success(__('The chalet has been saved.'));

                return $this->redirect(['controller'=>'Chalets','action' => 'dashboard']);
            }else{

                $this->Flash->error(__('The chalet could not be saved. Please, try again.'));
            }
        }
        }   
        $this->set(compact('chalet'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chalet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $chalet = $this->Chalets->get($id);
        if ($this->Chalets->delete($chalet)) {
            $this->Flash->success(__('The chalet has been deleted.'));
        } else {
            $this->Flash->error(__('The chalet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Chalets','action' => 'dashboard']);
    }

    public function dashboard()
    {
        $this->layout = 'admin';
        $this->loadModel('Images');
        $this->loadModel('Details');
        $chaletsTable= TableRegistry::get('Chalets');
        $chalets = $chaletsTable->find('all',[
            'contain' => ['Details', 'Images'],
        ], [
            'order' => ['Chalets.order_id' => 'DESC']
        ])->toArray();
       
        
        $this->set('chalets', $chalets);
    } 


    function compareByTimeStamp($time1, $time2) 
    { 
        if (strtotime($time1) < strtotime($time2)) 
            return 1; 
        else if (strtotime($time1) > strtotime($time2))  
            return -1; 
        else
            return 0; 
    } 
      
    



    public function book_chalet(){
    
     $this->autoRender = false; 
     $this->loadModel('BookChalets');
     if ($this->request->is('post')) {
        $book_chalet = array();
        $id = $this->request->getData(['chalet_id']);
        $start_date = $this->request->getData(['start_date']);
        $arr = explode(',', $start_date);
        usort($arr, array($this, "compareByTimeStamp"));
        
        $sorted_start_date = implode(',', $arr);
        $bookedRecord =TableRegistry::get('BookChalets')->find()->where(['chalet_id'=>$id])->count();
        if($bookedRecord>0){
                 $this->BookChalets->updateAll(['start_date' => $sorted_start_date], ['chalet_id' => $id]);
            $this->Flash->success(__('The chalet has been book.'));
        }else{
            $bookchalet = $this->BookChalets->newEntity();
                $book_chalet['chalet_id'] = $this->request->getData(['chalet_id']);
                $book_chalet['start_date'] = $sorted_start_date;

                $bookchalet = $this->BookChalets->patchEntity($bookchalet,  $book_chalet);
                if ($this->BookChalets->save($bookchalet)) {
                    $this->Flash->success(__('The chalet has been book.'));

                    return $this->redirect(['action' => 'dashboard']);
                }
                $this->Flash->error(__('The chalet could not be book. Please, try again.'));
        }
       
    }
     
    }


     public function chalet_status(){
     $this->autoRender = false;
     $id = $this->request->getData(['id']);
     $status= $this->request->getData(['status']);
     $chaletsTable= TableRegistry::get('Chalets');
     $chalets = $chaletsTable->find()->where(['id'=>$id])->first();
     $chalets->status = $status;
     if($chaletsTable->save($chalets)){
        $this->Flash->success(__('The chalet status has been update.'));

            return $this->redirect(['action' => 'dashboard']);
     } else {
         $this->Flash->error(__('The chalet status could not be update. Please, try again.'));
         
     }  
     
   
    }
  /**
     * Delete method
     *
     * @param string|null $id Chalet image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete_chalet_image($id = null)
    {
        $this->loadModel('Images');
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The chalet image has been deleted.'));
        } else {
            $this->Flash->error(__('The chalet image could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Chalet detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete_chalet_detail($id = null)
    {
        $this->loadModel('Details');
        $detail = $this->Details->get($id);
        if ($this->Details->delete($detail)) {
            $this->Flash->success(__('The chalet detail has been deleted.'));
        } else {
            $this->Flash->error(__('The chalet detail could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    } 

    public function header_footer(){
        $this->layout='admin';
        $this->loadModel('HeaderFooter');
        $header_footer = $this->HeaderFooter->find()->first();
        if ($this->request->is('post')) {

            $header_footer = $this->HeaderFooter->patchEntity($header_footer, $this->request->getData());
            if ($this->HeaderFooter->save($header_footer)) {
                $this->Flash->success(__('The header footer has been saved.'));

                return $this->redirect(['action' => 'header_footer']);
            }
            $this->Flash->error(__('The header footer could not be saved. Please, try again.'));
        }
        $this->set(compact('header_footer'));
    }

    public function chalet_sorting(){
       $this->autoRender = false;
       $order_id = $this->request->getData(['order_id']);
       $order_type = $this->request->getData(['order_type']);
       if($order_type=='up'){
            $chaletsTable= TableRegistry::get('Chalets');
           $old_order_id = $chaletsTable->find()->where(['order_id'=>$order_id])->select(['order_id', 'id'])->first();
           $new_order_id = $chaletsTable->find()->where(['order_id >'=>$order_id])->select(['order_id', 'id'])->first();
          
           if(!empty($new_order_id)){
                 $this->Chalets->updateAll(['order_id' => $order_id], ['id' => $new_order_id->id]);
                 $this->Chalets->updateAll(['order_id' => $new_order_id->order_id], ['id' => $old_order_id->id]);
                $this->Flash->success(__('The order has been up.'));
           }
       }else{

            $chaletsTable= TableRegistry::get('Chalets');
            $old_order_id = $chaletsTable->find()->where(['order_id'=>$order_id])->select(['order_id', 'id'])->first();
            $new_order_id = $chaletsTable->find()->order(['Chalets.order_id' => 'DESC'])->where(['order_id <'=>$order_id])->select(['order_id', 'id'])->first();
           
           if(!empty($new_order_id)){
                 $this->Chalets->updateAll(['order_id' => $order_id], ['id' => $new_order_id->id]);
                 $this->Chalets->updateAll(['order_id' => $new_order_id->order_id], ['id' => $old_order_id->id]);
                $this->Flash->success(__('The order has been down.'));
           }
       }
    }

}
