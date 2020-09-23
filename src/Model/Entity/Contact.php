<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property string $phone_no
 * @property string $whatsapp_no
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Contact extends Entity
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
        'image' => true,
        'name' => true,
        'phone_no' => true,
        'whatsapp_no' => true,
        'created' => true,
        'modified' => true,
    ];
}
