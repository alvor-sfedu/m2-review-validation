<?php
namespace Alvor\ReviewValidation\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Data
{

    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getForbiddenWords(): array
    {
        return explode(',', $this->scopeConfig->getValue('review/general/forbidden_words'));
    }

}
