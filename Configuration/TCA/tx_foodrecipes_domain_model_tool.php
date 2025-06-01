<?php
defined('TYPO3') or die();

return call_user_func(function () {
    $tx_foodrecipes_domain_model_tool = new \Slavlee\FoodRecipes\Bootstrap\TCA\ToolBootstrap();
    $tx_foodrecipes_domain_model_tool->invoke();
    return $tx_foodrecipes_domain_model_tool->getTca();
});
