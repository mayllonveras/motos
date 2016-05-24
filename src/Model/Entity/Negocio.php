<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Negocio Entity.
 *
 * @property int $id
 * @property int $cliente_id
 * @property \App\Model\Entity\Cliente $cliente
 * @property int $moto_id
 * @property \App\Model\Entity\Moto $moto
 * @property \Cake\I18n\Time $data
 * @property string $tipo
 * @property float $valor
 * @property \App\Model\Entity\Custo[] $custos
 */
class Negocio extends Entity
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
