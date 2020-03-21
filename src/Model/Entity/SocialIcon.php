<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialIcon Entity
 *
 * @property int $id
 * @property string $name
 * @property string $class
 * @property string $url
 */
class SocialIcon extends Entity
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
        'class' => true,
        'url' => true
    ];
}
