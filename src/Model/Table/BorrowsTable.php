<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Borrows Model
 *
 * @property \App\Model\Table\ReadersTable&\Cake\ORM\Association\BelongsTo $Readers
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\Borrow newEmptyEntity()
 * @method \App\Model\Entity\Borrow newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Borrow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Borrow get($primaryKey, $options = [])
 * @method \App\Model\Entity\Borrow findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Borrow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Borrow[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Borrow|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Borrow saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Borrow[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Borrow[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Borrow[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Borrow[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BorrowsTable extends Table
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

        $this->setTable('borrows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Readers', [
            'foreignKey' => 'reader_id',
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
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
            ->date('begin_date')
            ->allowEmptyDate('begin_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->allowEmptyString('reader_id');

        $validator
            ->allowEmptyString('book_id');

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
        $rules->add($rules->existsIn('reader_id', 'Readers'), ['errorField' => 'reader_id']);
        $rules->add($rules->existsIn('book_id', 'Books'), ['errorField' => 'book_id']);

        return $rules;
    }
}
