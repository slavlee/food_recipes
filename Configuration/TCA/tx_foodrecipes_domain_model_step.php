<?php
defined('TYPO3') or die();

return call_user_func(function () {
    $tx_foodrecipes_domain_model_step = new \Slavlee\FoodRecipes\Bootstrap\TCA\StepBootstrap();
    $tx_foodrecipes_domain_model_step->invoke();
    return $tx_foodrecipes_domain_model_step->getTca();
});
