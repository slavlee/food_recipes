<?php
defined('TYPO3') or die();

return call_user_func(function () {
    $tx_foodrecipes_domain_model_affiliate = new \Slavlee\FoodRecipes\Bootstrap\TCA\AffiliateBootstrap();
    $tx_foodrecipes_domain_model_affiliate->invoke();
    return $tx_foodrecipes_domain_model_affiliate->getTca();
});
