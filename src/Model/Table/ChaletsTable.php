<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chalets Model
 *
 * @property \App\Model\Table\DetailsTable&\Cake\ORM\Association\HasMany $Details
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\HasMany $Images
 *
 * @method \App\Model\Entity\Chalet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chalet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chalet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chalet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chalet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chalet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chalet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chalet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChaletsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('chalets');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Details', [
            'dependent' => true,
            'foreignKey' => 'chalet_id',
        ]);
        $this->hasMany('Images', [
            'dependent' => true,
            'foreignKey' => 'chalet_id',
        ]);
        $this->hasMany('BookChalets', [
            'dependent' => true,
            'foreignKey' => 'chalet_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('week')
            ->maxLength('week', 255)
            ->requirePresence('week', 'create')
            ->notEmptyString('week');

        $validator
            ->scalar('weekend')
            ->maxLength('weekend', 255)
            ->requirePresence('weekend', 'create')
            ->notEmptyString('weekend');

        $validator
            ->scalar('weekdays')
            ->maxLength('weekdays', 255)
            ->requirePresence('weekdays', 'create')
            ->notEmptyString('weekdays');

        return $validator;
    }
}
