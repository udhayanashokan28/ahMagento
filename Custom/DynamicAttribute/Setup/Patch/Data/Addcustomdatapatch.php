<?php
namespace Custom\DynamicAttribute\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class Addcustomdatapatch implements DataPatchInterface
{
   private $_moduleDataSetup;

   private $_eavSetupFactory;

   public function __construct(
       ModuleDataSetupInterface $moduleDataSetup,
       EavSetupFactory $eavSetupFactory
   ) {
       $this->_moduleDataSetup = $moduleDataSetup;
       $this->_eavSetupFactory = $eavSetupFactory;
   }

   public function apply()
   {
       /** @var EavSetup $eavSetup */
       $eavSetup = $this->_eavSetupFactory->create(['setup' => $this->_moduleDataSetup]);

       $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'shipping', [
           'type' => 'text',
           'backend' => '',
           'frontend' => '',
           'label' => 'Shipping',
           'input' => 'text',
           'class' => 'custom_shipping_class',
           'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
           'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
           'visible' => true,
           'required' => true,
           'user_defined' => false,
           'default' => '',
           'searchable' => false,
           'filterable' => false,
           'comparable' => false,
           'visible_on_front' => false,
           'used_in_product_listing' => true,
           'unique' => false,
           'is_configurable' => 1,
		   'apply_to' => \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE
        ]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'delivery_date', [
            'type' => 'date',
            'backend' => '',
            'frontend' => '',
            'label' => 'Delivery Date',
            'input' => 'date',
            'class' => 'custom_date_class',
            'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => true,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'is_configurable' => 1,
            'apply_to' => \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE
        ]);
	   $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'product_data', [
           'type' => 'text',
           'backend' => '',
           'frontend' => '',
           'label' => 'Product Data',
           'input' => 'textarea',
           'class' => 'custom_product_data_class',
           'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
           'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
           'visible' => true,
           'required' => true,
           'user_defined' => false,
           'default' => '',
           'searchable' => false,
           'filterable' => false,
           'comparable' => false,
           'visible_on_front' => false,
           'used_in_product_listing' => true,
           'unique' => false,
		   'is_configurable' => 1,
		   'apply_to' => \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE
       ]);
   }

   public static function getDependencies()
   {
       return [];
   }

   public function getAliases()
   {
       return [];
   }

   public static function getVersion()
   {
      return '1.0.0';
   }
}