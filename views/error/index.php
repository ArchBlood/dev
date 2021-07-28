<?php

use humhub\widgets\FooterMenu;
use yii\helpers\Html;
use yii\helpers\Url;

$this->pageTitle = Yii::t('base', 'Error');
?>
<div class="container section-error-page">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="error">
                <h2><?= Yii::t('custom', 'По вашему запросу ничего не найдено — попробуйте другие параметры'); ?></h2>
            </div>

            <a href="<?= Url::home() ?>" class="btn btn-primary"><?= Yii::t('base', 'Back to dashboard'); ?></a>
        </div>
    </div>

    <?= FooterMenu::widget(); ?>
</div>
