<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookChalet Entity
 *
 * @property int $id
 * @property int $chalet_id
 * @property string $start_date
 * @property string $end_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Chalet $chalet
 */
class BookChalet extends Entity
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
        'chalet_id' => true,
        'start_date' => true,
        // 'end_date' => true,
        'created' => true,
        'modified' => true,
        'chalet' => true,
    ];
}
