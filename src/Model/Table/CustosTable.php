<?php
namespace App\Model\Table;

use App\Model\Entity\Custo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Custos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tipos
 * @property \Cake\ORM\Association\BelongsTo $Negocios
 */
class CustosTable extends Table
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

        $this->table('custos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tipos', [
            'foreignKey' => 'tipo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Negocios', [
            'foreignKey' => 'negocio_id',
            'joinType' => 'INNER'
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
            ->add('valor', 'valid', ['rule' => 'numeric'])
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->allowEmpty('observação');

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
        $rules->add($rules->existsIn(['tipo_id'], 'Tipos'));
        $rules->add($rules->existsIn(['negocio_id'], 'Negocios'));
        return $rules;
    }
}
