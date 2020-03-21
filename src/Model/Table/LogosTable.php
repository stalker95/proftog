<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logos Model
 *
 * @method \App\Model\Entity\Logo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Logo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Logo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Logo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Logo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Logo findOrCreate($search, callable $callback = null, $options = [])
 */
class LogosTable extends Table
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

        $this->setTable('logos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

      /*  $validator
            ->scalar('image')
            ->maxLength('image', 1000)
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);


        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);
        */
        return $validator;
    }
}
