<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Readers Model
 *
 * @property \App\Model\Table\BorrowsTable&\Cake\ORM\Association\HasMany $Borrows
 *
 * @method \App\Model\Entity\Reader newEmptyEntity()
 * @method \App\Model\Entity\Reader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Reader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reader get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Reader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReadersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('readers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Borrows', [
            'foreignKey' => 'reader_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('fname')
            ->maxLength('fname', 150)
            ->allowEmptyString('fname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 150)
            ->allowEmptyString('lname');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);

        return $rules;
    }
}
