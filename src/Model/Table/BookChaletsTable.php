<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookChalets Model
 *
 * @property \App\Model\Table\ChaletsTable&\Cake\ORM\Association\BelongsTo $Chalets
 *
 * @method \App\Model\Entity\BookChalet get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookChalet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookChalet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookChalet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookChalet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookChalet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookChalet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookChalet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BookChaletsTable extends Table
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

        $this->setTable('book_chalets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Chalets', [
            'foreignKey' => 'chalet_id',
            'joinType' => 'INNER',
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
            ->scalar('start_date')
            ->maxLength('start_date', 255)
            ->requirePresence('start_date', 'create')
            ->notEmptyString('start_date');

        // $validator
        //     ->scalar('end_date')
        //     ->maxLength('end_date', 255)
        //     ->requirePresence('end_date', 'create')
        //     ->notEmptyString('end_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['chalet_id'], 'Chalets'));

        return $rules;
    }
}
