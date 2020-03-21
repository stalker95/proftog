<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Product Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $title_page
 * @property string $keywords
 * @property string $page_description
 * @property float $price
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property int $status
 * @property string $image
 * @property int $category_id
 *
 * @property \App\Model\Entity\Category $category
 */
class Product extends Entity
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
        '*'  => true,
        'id' => true,
        'title' => true,
        'slug' => true,
        'description' => true,
        'title_page' => true,
        'keywords' => true,
        'page_description' => true,
        'price' => true,
        'amount' => true,
        'created' => true,
        'status' => true,
        'image' => true,
        'category_id' => true,
        'category' => true
    ];

    public function saveOptions($data = null, $id_product)
    {
                 $this->ProductsOptions = TableRegistry::get('products_options');
        $product_options = $this->ProductsOptions
                               ->find()
                               ->where(['product_id' => $id_product])
                               ->toArray();
        foreach ($product_options as $key => $value) {
          $product_option = $this->ProductsOptions->get($value['id']);
          $this->ProductsOptions->delete($product_option);
            
        }                      
      $array_of_values = [];
      foreach ($data as $key => $value) {
                $key_array = $key;
            if (strpos($key_array, 'amount_option') === true OR strpos($key_array, 'amount_option') === 0) {
                foreach ($value as $keys => $item) {
                    array_push($array_of_values, $item);
                }
            }
      }
      
      $array_of_options = []; 
        foreach ($data as $key => $value) {
            
                $key_array = $key;
            if (strpos($key_array, 'options_item') === true OR strpos($key_array, 'options_item') === 0) {
                $option = explode('_', $key_array);
                foreach ($value as $keys => $item) {
                    array_push($array_of_options, $item);
                }
            }
            $key_array = "";
        } 


         foreach ($array_of_values as $key => $value) {
          if (!empty($value)) {
            $product_option = $this->ProductsOptions->newEntity();
            $product_option->product_id = $id_product;
            $product_option->value = $value;
            $product_option->options_items_id = $array_of_options[$key];
            $this->ProductsOptions->save($product_option);
          }
         }
    }

    public function saveAttributes($attributes, $attributes_values, $product_id)
    {
        $this->AttributesProducts = TableRegistry::get('attributes_products');
         if (!empty($attributes)) {
      foreach ($attributes as $key => $value) {
                $attribute_product = $this->AttributesProducts->newEntity();
                $attribute_product->product_id = $product_id;
                $attribute_product->attribute_id = (int)$value;
                $attribute_product->value = (int)$attributes_values[$key];
                if (!empty((int)$attributes_values[$key])) {
                $this->AttributesProducts->save($attribute_product);
              }
      }
      }
    }


    public function getOptionsGroup($id_product)
    {
        $this->ProductsOptions = TableRegistry::get('products_options');
        $this->Options = TableRegistry::get('options');
          $options_products = $this->ProductsOptions
                                 ->find()
                                 ->contain(['OptionsItems','OptionsItems.Options'])
                                 ->where(['product_id' => $id_product])
                                 ->toArray();
        
       // debug($options_products);
        
        $options = $this->Options->find()->contain(['OptionsItems','OptionsItems.ProductsOptions'])->toArray();
        
       // debug($options);
        $group_options = [];
        $current_options = [];
        foreach ($options as $key => $value):
           $current_options[$value['name']] = [];
            foreach ($value['options_items'] as $key => $item) {
             foreach ($item['products_options'] as $key => $product_item) {

               if ($product_item['product_id'] == $id_product) {
                array_push($group_options, $value['name']);
                
                array_push($current_options[$value['name']], $item);
               // $current_options[$value['name']] = $ite
              //   debug($item);
               }
             }
            }
        endforeach;
     // debug($group_options);
     // debug($current_options);
      return $current_options;
    }
}
