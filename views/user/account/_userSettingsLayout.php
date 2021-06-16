<?php
humhub\modules\user\widgets\AccountMenu::markAsActive(['/user/account/edit-settings']);
?>

<div class="panel-heading">
    <?= Yii::t('UserModule.account', '<strong>User</strong> settings'); ?> <?php echo \humhub\widgets\DataSaved::widget(); ?>
</div>

<div class="panel-body">
    <?= $content; ?>
</div>





