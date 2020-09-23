<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chalet Entity
 *
 * @property int $id
 * @property string $name
 * @property string $week
 * @property string $weekend
 * @property string $weekdays
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Detail[] $details
 * @property \App\Model\Entity\Image[] $images
 */
class Chalet extends Entity
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
        'name' => true,
        'week' => true,
        'weekend' => true,
        'weekdays' => true,
        'created' => true,
        'modified' => true,
        'details' => true,
        'images' => true,
        'status' => true,
        'order_id' => true,
    ];
}
