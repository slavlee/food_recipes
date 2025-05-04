<?php
defined('TYPO3') or die();

call_user_func(function () {
    /* NEWS - START */
    $newsBootstrap = new \Slavlee\FoodRecipes\Bootstrap\TCA\NewsBootstrap();
    $newsBootstrap->invoke();
    /* NEWS - END */
});
