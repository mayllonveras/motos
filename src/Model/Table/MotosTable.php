<?php
namespace App\Model\Table;

use App\Model\Entity\Moto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Motos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Modelos
 * @property \Cake\ORM\Association\HasMany $Negocios
 */
class MotosTable extends Table
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

        $this->table('motos');
        $this->displayField('placa');
        $this->primaryKey('id');

        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Negocios', [
            'foreignKey' => 'moto_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('ano_fabricação', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ano_fabricação', 'create')
            ->notEmpty('ano_fabricação');

        $validator
            ->add('ano_modelo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ano_modelo', 'create')
            ->notEmpty('ano_modelo');

        $validator
            ->requirePresence('placa', 'create')
            ->notEmpty('placa');

        $validator
            ->allowEmpty('renavam');

        $validator
            ->requirePresence('cor', 'create')
            ->notEmpty('cor');

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
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'));
        return $rules;
    }
}
