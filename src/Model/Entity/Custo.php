<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Custo Entity.
 *
 * @property int $id
 * @property int $tipo_id
 * @property \App\Model\Entity\Tipo $tipo
 * @property int $negocio_id
 * @property \App\Model\Entity\Negocio $negocio
 * @property float $valor
 * @property string $observação
 */
class Custo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
