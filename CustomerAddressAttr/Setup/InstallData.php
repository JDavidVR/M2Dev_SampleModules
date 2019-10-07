<?php

namespace M2Dev\CustomerAddressAttr\Setup;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    protected $eavSetupFactory;
    /**
     * @var \Magento\Eav\Model\Config
     */
    private $config;
    /**
     * @var \Magento\Customer\Setup\CustomerSetupFactory
     */
    private $customerSetupFactory;
    /**
     * @var \Magento\Customer\Model\ResourceModel\Attribute
     */
    private $customerAttributeResource;
    /**
     * @var \Magento\Customer\Model\AttributeFactory
     */
    private $customerAttributeFactory;
    /**
     * @var \Magento\Framework\Event\ManagerInterface
     */
    private $eventManager;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $config,
        \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory,
        \Magento\Customer\Model\ResourceModel\Attribute $customerAttributeResource,
        \Magento\Customer\Model\AttributeFactory $customerAttributeFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager

    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->config = $config;
        $this->customerSetupFactory = $customerSetupFactory;
        $this->customerAttributeResource = $customerAttributeResource;
        $this->customerAttributeFactory = $customerAttributeFactory;
        $this->eventManager = $eventManager;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        // $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        /** @var \Magento\Customer\Setup\CustomerSetup $eavSetup */
        $eavSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $entityAttributeList = [
            'customer_address' => [
                'attrsetup' => [
                    'attr' => [
                        'label' => 'Attr Setup',
                        'required' => '0',
                        'user_defined' => '1',
                        'multiline_count' => '1',
                        'validate_rules' => '[]',
                        'system' => '0',
                    ],
                    'additional' => [
                        'used_in_forms' => [
                            'adminhtml_customer_address', 'customer_address_edit', 'customer_register_address',
                        ],
                    ],
                ],
            ],
        ];

        // Iterate every Entity
        foreach ($entityAttributeList as $entityTypeCode => $attributeList) {

            // Iterate attribute
            foreach ($attributeList as $attributeCode => $attributeConfig) {
                // Create Attribute
                $attr = $attributeConfig['attr'];
                $eavSetup->addAttribute($entityTypeCode, $attributeCode, $attr);

                // If there is additional configuration add it
                if ($attributeConfig['additional']) {
                    $defaultAttributeSetId = $eavSetup->getDefaultAttributeSetId($entityTypeCode);
                    $defaultAttributeGroupId = $eavSetup->getDefaultAttributeGroupId($entityTypeCode);

                    try {
                        $eavSetup->addAttributeToSet(
                            $entityTypeCode,
                            $defaultAttributeSetId,
                            $defaultAttributeGroupId,
                            $attributeCode
                        );

                        /** @var \Magento\Eav\Model\Entity\Attribute\AbstractAttribute $attribute */
                        // $attribute = $this->config->getAttribute($entityTypeCode,$attributeCode);
                        $attribute = $eavSetup->getEavConfig()->getAttribute($entityTypeCode, $attributeCode);
                        $attribute->addData([
                            'used_in_forms' => $attributeConfig['additional']['used_in_forms']
                        ]);
                        $attribute->isObjectNew(true);
                        $attribute->getResource()->save($attribute);
                    } catch (\Exception $exception) {
                        var_dump($exception->getMessage());
                        die;
                    }
                }
            }
        }
    }
}
