<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index(){ 
        $this->layout = 'website';
        $this->loadModel('Images');
        $this->loadModel('Details');
        $this->loadModel('Chalets');
        $chalets = $this->paginate($this->Chalets,
        [
       
        'order' => [
            'Chalets.order_id' => 'DESC'
        ],'conditions' => ['Chalets.status' => 'Yes'],
            'contain' => ['Details', 'Images']
        ]);

        
        $this->set('chalets', $chalets);
    }

    public function contactus(){ 
        $this->layout = 'website'; 
        $this->loadModel('Contact');
        $contacts = $this->paginate($this->Contact,['limit' => 8,
        'order' => [
            'Contact.id' => 'DESC'
        ]
        ]);

        $this->set(compact('contacts'));
    }

    public function chaletdetail($id = null){ 
        $this->layout = 'website'; 
        $this->loadModel('Images');
        $this->loadModel('Details');
        $this->loadModel('Chalets');
        $this->loadModel('GeneralNotes');
        $this->loadModel('BookChalets');
        // $chalets = $this->paginate($this->Chalets,[
        //     'contain' => ['Details', 'Images'],
        // ]);
        $chalet = $this->Chalets->get($id, [
            'contain' => ['Details', 'Images'],
        ]);
            
        $bookChalets = TableRegistry::get('BookChalets');
         
        $bookedDate = $bookChalets->find()->select(['id', 'start_date', 'chalet_id', 'created', 'modified'])
              ->where(['chalet_id' => $id])->toArray();
       
        $this->set('bookedDate', $bookedDate);
        $pages = $this->findNeighbors($id);
        $this->set('pages', $pages);    
        $this->set('chalet', $chalet);
        $generalNotes = $this->paginate($this->GeneralNotes);
        $this->set(compact('generalNotes'));
    }

    public function findNeighbors($id) {
        $previous = $this->Chalets->find()
                ->select('id')
                ->order(['id' => 'DESC'])
                ->where(['id <' => $id])
                ->andWhere(['status' =>'Yes'])
                ->first();
        $next = $this->Chalets->find()
                ->select('id')
                ->order(['id' => 'ASC'])
                ->where(['id >' => $id])
                ->andWhere(['status' =>'Yes'])
                ->first();
        return ['prev' => $previous['id'], 'next' => $next['id']];
    }
}
