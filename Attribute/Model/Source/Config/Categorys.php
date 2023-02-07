<?php
namespace Codilar\Attribute\Model\Source\Config;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Categorys extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Source constructor.
     * @param CollectionFactory $categoryFactory
     */
    public function __construct(
        CollectionFactory $categoryFactory
    )
    {
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * @return array
     */
    public function getAllOptions()
    {
        $collections = $this->categoryFactory->create();
        $collections->addAttributeToSelect('*');
        $result = [];
        $result[] = [
            'label' => '-----Select-----',
            'value' => ''
        ];
        foreach ($collections as $collection) {

                $result[] = [
                    'label' => $collection->getName(),
                    'value' => $collection->getId()
                ];
            }

        return $result;
    }
}
