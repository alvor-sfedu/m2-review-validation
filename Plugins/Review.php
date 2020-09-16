<?php
namespace Alvor\ReviewValidation\Plugins;
use Alvor\ReviewValidation\Helper\Data;

class Review
{

    private $helper;

    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    public function afterValidate(\Magento\Review\Model\Review $subject, $result)
    {
        $usedForbiddenWords = [];
        foreach ($this->helper->getForbiddenWords() as $word) {
            if (strripos($subject->getDetail(), $word) !== false) {
                $usedForbiddenWords[] = $word;
            }
        }

        if (!empty($usedForbiddenWords)) {
            $error[] = __("Forbidden words in review: %1", implode(',', $usedForbiddenWords));
            $result =  is_array($result) ? array_merge($result, $error) : $error;
        }
        return $result;
    }

}
