<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HeaderFooter Model
 *
 * @method \App\Model\Entity\HeaderFooter get($primaryKey, $options = [])
 * @method \App\Model\Entity\HeaderFooter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HeaderFooter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HeaderFooter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HeaderFooter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HeaderFooter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HeaderFooter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HeaderFooter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HeaderFooterTable extends Table
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

        $this->setTable('header_footer');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('header')
            ->requirePresence('header', 'create')
            ->notEmptyString('header');

        $validator
            ->scalar('footer')
            ->requirePresence('footer', 'create')
            ->notEmptyString('footer');

        return $validator;
    }
}
