<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributesItem Entity
 *
 * @property int $id
 * @property string $name
 * @property string $parent_id
 *
 * @property \App\Model\Entity\ParentAttributesItem $parent_attributes_item
 * @property \App\Model\Entity\ChildAttributesItem[] $child_attributes_items
 */
class AttributesItem extends Entity
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
        'parent_id' => true,
        'parent_attributes_item' => true,
        'child_attributes_items' => true
    ];
}
