<?php

use humhub\libs\Html;
use yii\helpers\Url;

?>
<div class="panel panel-default panel-tour" id="getting-started-panel">
    <?php
    // Temporary workaround till panel widget rewrite in 0.10 verion
    $removeOptionHtml = "<li>" . \humhub\widgets\ModalConfirm::widget([
                'uniqueID' => 'hide-panel-button',
                'title' => Yii::t('TourModule.base', '<strong>Remove</strong> tour panel'),
                'message' => Yii::t('TourModule.base', 'This action will remove the tour panel from your dashboard. You can reactivate it at<br>Account settings <i class="fa fa-caret-right"></i> Settings.'),
                'buttonTrue' => Yii::t('TourModule.base', 'Ok'),
                'buttonFalse' => Yii::t('TourModule.base', 'Cancel'),
                'linkContent' => '<i class="fa fa-eye-slash"></i> ' . Yii::t('TourModule.base', ' Remove panel'),
                'linkHref' => Url::to(["/tour/tour/hide-panel", "ajax" => 1]),
                'confirmJS' => '$(".panel-tour").slideToggle("slow")'
                    ], true) . "</li>";
    ?>

    <!-- Display panel menu widget -->
    <?php echo \humhub\widgets\PanelMenu::widget(['id' => 'getting-started-panel', 'extraMenus' => $removeOptionHtml]); ?>

    <div class="panel-heading">
        <?php echo Yii::t('TourModule.base', '<strong>Getting</strong> Started'); ?>
    </div>
    <div class="panel-body">
        <p>
            <?php echo Yii::t('TourModule.base', 'Get to know your way around the site\'s most important features with the following guides:'); ?>
        </p>

        <ul class="tour-list">
            <li id="interface_entry" class="<?php if ($interface == 1) : ?>completed<?php endif; ?>">
                <a href="<?php echo Url::to(['/dashboard/dashboard', 'tour' => true]); ?>" data-pjax-prevent>
                    <div class="item"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none"><path d="M22.8476 1.81934L23.7067 0.964844H22.495H2.50498H1.29334L2.15236 1.81933L10.5914 10.2139C10.5915 10.214 10.5916 10.2141 10.5918 10.2143C11.1017 10.7239 11.7804 11.0052 12.5 11.0052C13.2193 11.0052 13.8981 10.7242 14.4068 10.2156C14.407 10.2155 14.4071 10.2154 14.4073 10.2152L22.8476 1.81934ZM0.964844 15.0827V16.2844L1.81727 15.4374L8.14725 9.14765L8.504 8.79316L8.14744 8.43848L1.81746 2.14185L0.964844 1.29373V2.49634V15.0827ZM2.15348 15.7586L1.29334 16.6133H2.50591H22.4941H23.7067L22.8465 15.7586L16.519 9.47135L16.1664 9.12097L15.814 9.47154L14.7355 10.5443L14.7346 10.5453C14.1381 11.1417 13.3457 11.4701 12.5 11.4701C11.6544 11.4701 10.862 11.1418 10.2641 10.5439L10.2631 10.543L9.18602 9.47154L8.83359 9.12097L8.48098 9.47135L2.15348 15.7586ZM23.1827 15.4374L24.0352 16.2844V15.0827V2.49634V1.29373L23.1825 2.14185L16.8526 8.43848L16.496 8.79316L16.8528 9.14765L23.1827 15.4374ZM2.19727 0.5H22.8027C23.7427 0.5 24.5 1.26584 24.5 2.19727V15.3809C24.5 16.3217 23.7327 17.0781 22.8027 17.0781H2.19727C1.26539 17.0781 0.5 16.3186 0.5 15.3809V2.19727C0.5 1.26459 1.2603 0.5 2.19727 0.5Z" fill="#045269" stroke="#045269"/></svg></div> <?= Yii::t('TourModule.base', '<strong>Guide:</strong> Overview'); ?></div>
                </a>
            </li>
            <li class="<?php if ($profile == 1) : ?>completed<?php endif; ?>">
                <a href="<?php echo Yii::$app->user->getIdentity()->createUrl('//user/profile/home', ['tour' => 'true']); ?>" data-pjax-prevent>
                    <div class="item"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="29" viewBox="0 0 27 29" fill="none"><path d="M23.1594 28.2727H9.52304C7.95713 28.2727 6.68213 26.9988 6.68213 25.4318V8.38632C6.68213 6.81928 7.95713 5.54541 9.52304 5.54541H23.1594C24.7253 5.54541 26.0003 6.81928 26.0003 8.38632V25.4318C26.0003 26.9988 24.7253 28.2727 23.1594 28.2727ZM9.52304 6.68177C8.58327 6.68177 7.81849 7.44655 7.81849 8.38632V25.4318C7.81849 26.3716 8.58327 27.1363 9.52304 27.1363H23.1594C24.0992 27.1363 24.864 26.3716 24.864 25.4318V8.38632C24.864 7.44655 24.0992 6.68177 23.1594 6.68177H9.52304Z" fill="#045269" stroke="#045269" stroke-width="0.5"/><path d="M4.97728 24.8637H3.84091C2.275 24.8637 1 23.5898 1 22.0227V3.84091C1 2.27386 2.275 1 3.84091 1H17.4773C19.0432 1 20.3182 2.27386 20.3182 3.84091C20.3182 4.15455 20.0637 4.40909 19.75 4.40909C19.4364 4.40909 19.1818 4.15455 19.1818 3.84091C19.1818 2.90114 18.4171 2.13636 17.4773 2.13636H3.84091C2.90114 2.13636 2.13636 2.90114 2.13636 3.84091V22.0227C2.13636 22.9625 2.90114 23.7273 3.84091 23.7273H4.97728C5.29091 23.7273 5.54546 23.9818 5.54546 24.2955C5.54546 24.6091 5.29091 24.8637 4.97728 24.8637Z" fill="#045269" stroke="#045269" stroke-width="0.5"/><path d="M20.8871 20.3185H11.7962C11.4826 20.3185 11.228 20.0639 11.228 19.7503C11.228 19.4367 11.4826 19.1821 11.7962 19.1821H20.8871C21.2008 19.1821 21.4553 19.4367 21.4553 19.7503C21.4553 20.0639 21.2008 20.3185 20.8871 20.3185Z" fill="#045269" stroke="#045269" stroke-width="0.5"/><path d="M20.8871 24.8634H11.7962C11.4826 24.8634 11.228 24.6089 11.228 24.2952C11.228 23.9816 11.4826 23.7271 11.7962 23.7271H20.8871C21.2008 23.7271 21.4553 23.9816 21.4553 24.2952C21.4553 24.6089 21.2008 24.8634 20.8871 24.8634Z" fill="#045269" stroke="#045269" stroke-width="0.5"/><path d="M20.8871 15.7726H11.7962C11.4826 15.7726 11.228 15.518 11.228 15.2044C11.228 14.8908 11.4826 14.6362 11.7962 14.6362H20.8871C21.2008 14.6362 21.4553 14.8908 21.4553 15.2044C21.4553 15.518 21.2008 15.7726 20.8871 15.7726Z" fill="#045269" stroke="#045269" stroke-width="0.5"/><path d="M20.8871 11.2277H11.7962C11.4826 11.2277 11.228 10.9731 11.228 10.6595C11.228 10.3459 11.4826 10.0913 11.7962 10.0913H20.8871C21.2008 10.0913 21.4553 10.3459 21.4553 10.6595C21.4553 10.9731 21.2008 11.2277 20.8871 11.2277Z" fill="#045269" stroke="#045269" stroke-width="0.5"/></svg></div> <?php echo Yii::t('TourModule.base', '<strong>Guide:</strong> User profile'); ?></div>
                </a>
            </li>
        </ul>
    </div>
</div>

<?php if ($showWelcome) : ?>
    <script <?= Html::nonce() ?>>

        $(document).on('humhub:ready', function () {
            humhub.modules.ui.modal.global.load( "<?= Url::to(['/tour/tour/welcome']) ?>");
        });

    </script>
<?php endif; ?>
