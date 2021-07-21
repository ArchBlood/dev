<?php

use yii\helpers\Url;
use humhub\libs\Html;

?>

<div class="dropdown search-menu" style="width: 100%; height: 100%; margin: auto;">
    <?= Html::beginForm(Url::to(['//search/search/index']), 'GET'); ?>
    <div class="form-group form-group-search">
        <?= Html::textInput('SearchForm[keyword]', '', ['placeholder' => Yii::t('base', 'Search'), 'title' => Yii::t('SearchModule.views_search_index', 'Search for user, spaces and content'), 'class' => 'form-control form-search', 'id' => 'search-input-field']); ?>
        <?= Html::submitButton(Yii::t('custom', '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 26 25" fill="none"> <path d="M11.2205 0C5.39751 0 0.660156 4.73736 0.660156 10.5604C0.660156 16.3834 5.39751 21.1207 11.2205 21.1207C17.0435 21.1207 21.7809 16.3834 21.7809 10.5604C21.7809 4.73736 17.0435 0 11.2205 0ZM11.2205 19.2734C6.41602 19.2734 2.50747 15.3649 2.50747 10.5604C2.50747 5.75586 6.41602 1.84732 11.2205 1.84732C16.0247 1.84732 19.9336 5.75586 19.9336 10.5604C19.9336 15.3649 16.025 19.2734 11.2205 19.2734Z" fill="white"></path> <path d="M25.3901 23.4234L18.6782 16.7115C18.3174 16.3507 17.733 16.3507 17.3722 16.7115C17.0114 17.0721 17.0114 17.6571 17.3722 18.0176L24.0841 24.7294C24.2645 24.9098 24.5006 25 24.7371 25C24.9736 25 25.2097 24.9098 25.3901 24.7294C25.7509 24.3689 25.7509 23.7839 25.3901 23.4234Z" fill="white"></path> </svg>'), ['class' => 'btn btn-default btn-sm form-button-search']); ?>
    </div>
    <?= Html::endForm(); ?>
</div>

<script <?= Html::nonce() ?>>
    /**
     * Open search menu
     */
    $('#search-menu-nav').click(function () {

        // use setIntervall to setting the focus
        var searchFocus = setInterval(setFocus, 10);

        function setFocus() {

            // set focus
            $('#search-menu-search').focus();
            // stop interval
            clearInterval(searchFocus);
        }

    })
</script>
