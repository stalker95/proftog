<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryPage Entity
 *
 * @property int $id
 * @property string $title_page
 * @property string $keywords
 * @property string $description_page
 * @property string $title
 * @property string $description
 */
class DeliveryPage extends Entity
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
        'title_page' => true,
        'keywords' => true,
        'description_page' => true,
        'title' => true,
        'description' => true
    ];
}
