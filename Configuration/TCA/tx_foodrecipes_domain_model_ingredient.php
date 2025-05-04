<?php
defined('TYPO3') or die();

return call_user_func(function () {
    $tx_foodrecipes_domain_model_ingredient = new \Slavlee\FoodRecipes\Bootstrap\TCA\IngredientBootstrap();
    $tx_foodrecipes_domain_model_ingredient->invoke();
    return $tx_foodrecipes_domain_model_ingredient->getTca();
});
