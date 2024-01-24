<?php
namespace Capgemini\Testimonial\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray(): array
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }

    public function getOptionArray(): array
    {
        return [
            0 => __('Inactive'),
            1 => __('Active'),
        ];
    }
}
