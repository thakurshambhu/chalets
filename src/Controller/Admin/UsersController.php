<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\TransportFactory;
use Cake\Validation\Validator;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeRender(Event $event) {
        $this->set('Auth', $this->Auth);
    }

    public function login()
    {
		
        $this->layout = 'admin-login';
        if ($this->request->is('post')) {
            
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
            $this->Flash->error(__('Invalid Email or password, try again'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    } 

    public function forgotpassword(){
       $this->layout = 'admin-login';
        if($this->request->is('post')){
            $myemail = $this->request->getData('email');
            $mytoken = Security::hash(Security::randomBytes('25'));
            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>''])->first();
            if($myemail !=  $user['email'])
            {

              $this->Flash->error(__('your email id is not match, Please try again.'));
            }else{
               $user->token =  $mytoken;
              if($userTable->save($user)){
                 $this->Flash->success('Reset password link has been sent to your email.please open your inbox.');
                 Email::configTransport('gmail', [
                      'host' => 'smtp.gmail.com',
                      'port' => 587,
                      'username' => 'shambhu.smartdata@gmail.com',
                      'password' => 'cnliyyajhevuxtkm',
                      'className' => 'Smtp',
                      'tls' => true
                  ]);
                 $url = 'http://'.$_SERVER['SERVER_NAME'].'/chalets/admin/users/resetpassword/'.$mytoken;
                 $email = new Email('default');
                 $email->transport('gmail');
                 $email->emailFormat('html');
                 $email->from('chalets@yopmail.com','Chalets');
                 $email->subject('please confirm your reset password');
                 $email->to($myemail);
                 $email->send('Hello '.$myemail.'</br> please click link below to reset your password <br/><br/> <a href="'.$url.'">Reset password</a>');

                
              }

            }
           

        }

    } 


    public function resetpassword($token){
           $this->layout = 'admin-login';
        if($this->request->is('post')){

          if($this->request->data['password'] !=  $this->request->data['confirm_password'])
          {
            $this->Flash->error(__('New Password and Confirm Password is not match, Please try again.'));
          }else{
            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>$token])->first();
            $user->password = $this->request->data['password'];

            if($userTable->save($user)){
              $user_token = $userTable->find('all')->where(['token'=>$token])->first();
              $user_token->token = '';
              $userTable->save($user_token);
               $this->Flash->success('Password has been update please login now');
                return $this->redirect(['action'=>'login']);

            }

          }
             
        }
    }
    /**
     * profile method
     *
     * @return \Cake\Http\Response|null
     */
   
   

     public function profile($id = null){
         $this->layout = 'admin';
         $uid = $this->Auth->user('id');
          $user = $this->Users->get($uid, [
                'contain' => []
            ]);
          $this->set('user', $user);
          if ($this->request->is('post')) {
             $data = $this->request->getData();

            $path = 'img/profile/';
            $images = $data['logo'];
            $imageFileName = "";
             if (!empty($this->request->data['logo']['name'])) {
            $file = $this->request->data['logo']; //put the data into a var for easy use

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext)) {
                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                //where we are putting it
                move_uploaded_file($file['tmp_name'], WWW_ROOT . $path . $setNewFileName . '.' . $ext);

                //prepare the filename for database entry 
                $imageFileName = $setNewFileName . '.' . $ext;
                }
            }
            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $user = $usersTable->get($uid); // Return user with id 
            $user->username = $data['username'];
            $user->email = $data['email'];   
            if($imageFileName != "")        {
              $user->logo = $imageFileName;
            }
              if($usersTable->save($user))
              {
                $this->Flash->success(__('The Profile has been saved.'));
                return $this->redirect(['controller'=>'Users','action' => 'profile']);
              }
              else
              {
                $this->Flash->error(__('The Profile could not be saved. Please, try again.'));
              }
          }
       $this->set(compact('user'));   
          
    }

    public function changePassword() {
        $user = $this->Users->get($this->Auth->user('id'));
          if ($this->request->is(['patch', 'post', 'put'])) {
              $user = $this->Users->patchEntity($user, $this->request->data);
              if ($this->Users->save($user)) {
                  $this->Flash->success(__('The Password has been changed successfully.'));
                return $this->redirect(['controller'=>'Users','action' => 'profile']);
              } else {
                if($this->request->data['password'] !=  $this->request->data['confirm_password'])
                  {
                    $this->Flash->error(__('New Password and Confirm Password is not match, Please try again.'));
                    return $this->redirect(['controller'=>'Users','action' => 'profile']);
                  }else
                  {
                    $this->Flash->error(__('The Password could not be changed. Please, try again.'));
                    return $this->redirect(['controller'=>'Users','action' => 'profile']);
                  }
                  
              }
          }
    }

   


   

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }



}
