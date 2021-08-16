<?php
    /* @var $this \yii\web\View */
    /* @var $content string */
    use yii\helpers\Url;
    use yii\helpers\Html;
    \humhub\assets\AppAsset::register($this);

    use humhub\modules\user\widgets\Image;

    $userModel = Yii::$app->user->identity;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= strip_tags($this->pageTitle); ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>

        <div class="sidebar-button">
            <div class="toggle">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M1 4.5C1 1.87479 1.02811 1 4.5 1C7.97189 1 8 1.87479 8 4.5C8 7.12521 8.01107 8 4.5 8C0.988927 8 1 7.12521 1 4.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.5C12 1.87479 12.0281 1 15.5 1C18.9719 1 19 1.87479 19 4.5C19 7.12521 19.0111 8 15.5 8C11.9889 8 12 7.12521 12 4.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M1 15.5C1 12.8748 1.02811 12 4.5 12C7.97189 12 8 12.8748 8 15.5C8 18.1252 8.01107 19 4.5 19C0.988927 19 1 18.1252 1 15.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12 15.5C12 12.8748 12.0281 12 15.5 12C18.9719 12 19 12.8748 19 15.5C19 18.1252 19.0111 19 15.5 19C11.9889 19 12 18.1252 12 15.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </div>
        </div>

        <!-- Sidebar Start -->
        <aside class="sidebar">
            <div class="content">
                <div class="toggle">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M8.59094 7.00049L13.0441 2.54736C13.2554 2.33639 13.3743 2.0501 13.3745 1.75148C13.3748 1.45286 13.2564 1.16636 13.0455 0.955018C12.8345 0.743674 12.5482 0.624793 12.2496 0.62453C11.951 0.624266 11.6645 0.74264 11.4531 0.953612L7 5.40674L2.54687 0.953612C2.33553 0.742267 2.04888 0.623535 1.75 0.623535C1.45111 0.623535 1.16447 0.742267 0.953123 0.953612C0.741779 1.16496 0.623047 1.4516 0.623047 1.75049C0.623047 2.04937 0.741779 2.33602 0.953123 2.54736L5.40625 7.00049L0.953123 11.4536C0.741779 11.665 0.623047 11.9516 0.623047 12.2505C0.623047 12.5494 0.741779 12.836 0.953123 13.0474C1.16447 13.2587 1.45111 13.3774 1.75 13.3774C2.04888 13.3774 2.33553 13.2587 2.54687 13.0474L7 8.59424L11.4531 13.0474C11.6645 13.2587 11.9511 13.3774 12.25 13.3774C12.5489 13.3774 12.8355 13.2587 13.0469 13.0474C13.2582 12.836 13.3769 12.5494 13.3769 12.2505C13.3769 11.9516 13.2582 11.665 13.0469 11.4536L8.59094 7.00049Z"/></svg>
                    </div>
                </div>
                <nav class="menu">
                    <ul>
                        <li class="item">
                            <a href="<?= Url::to(['/dashboard/dashboard']); ?>">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="11.96" cy="11.96" r="11.21" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="17.175" cy="2.175" r="1.175" stroke="#B4B4B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="name">
                                    <?= Yii::t('custom', 'Новости'); ?>
                                </div>
                            </a>
                        </li>
                        <?= \humhub\widgets\NotificationArea::widget(); ?>
                        <li class="item">
                            <a href="<?= Url::to(['/directory/directory/members']); ?>">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.59151 13.207C11.2805 13.207 14.4335 13.766 14.4335 15.999C14.4335 18.232 11.3015 18.807 7.59151 18.807C3.90151 18.807 0.749512 18.253 0.749512 16.019C0.749512 13.785 3.88051 13.207 7.59151 13.207Z" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.59157 10.02C5.16957 10.02 3.20557 8.057 3.20557 5.635C3.20557 3.213 5.16957 1.25 7.59157 1.25C10.0126 1.25 11.9766 3.213 11.9766 5.635C11.9856 8.048 10.0356 10.011 7.62257 10.02H7.59157Z" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.4832 8.88177C16.0842 8.65677 17.3172 7.28277 17.3202 5.61977C17.3202 3.98077 16.1252 2.62077 14.5582 2.36377" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.5955 12.7324C18.1465 12.9634 19.2295 13.5074 19.2295 14.6274C19.2295 15.3984 18.7195 15.8984 17.8955 16.2114" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="name">
                                    <?= Yii::t('custom', 'Участники'); ?>
                                </div>
                            </a>
                        </li>
                        <li class="item" id="space-menu">
                            <a href="<?= Url::to(['/directory/directory/spaces']); ?>">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none"><path d="M16.8877 7.89673C18.2827 7.70073 19.3567 6.50473 19.3597 5.05573C19.3597 3.62773 18.3187 2.44373 16.9537 2.21973" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.7285 11.2505C20.0795 11.4525 21.0225 11.9255 21.0225 12.9005C21.0225 13.5715 20.5785 14.0075 19.8605 14.2815" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.8867 11.6641C7.67273 11.6641 4.92773 12.1511 4.92773 14.0961C4.92773 16.0401 7.65573 16.5411 10.8867 16.5411C14.1007 16.5411 16.8447 16.0591 16.8447 14.1131C16.8447 12.1671 14.1177 11.6641 10.8867 11.6641Z" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.8869 8.888C12.9959 8.888 14.7059 7.179 14.7059 5.069C14.7059 2.96 12.9959 1.25 10.8869 1.25C8.7779 1.25 7.0679 2.96 7.0679 5.069C7.0599 7.171 8.7569 8.881 10.8589 8.888H10.8869Z" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.88484 7.89673C3.48884 7.70073 2.41584 6.50473 2.41284 5.05573C2.41284 3.62773 3.45384 2.44373 4.81884 2.21973" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.044 11.2505C1.693 11.4525 0.75 11.9255 0.75 12.9005C0.75 13.5715 1.194 14.0075 1.912 14.2815" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="name">
                                    <?= Yii::t('custom', 'Группы'); ?>
                                </div>   
                            </a>
                        </li>
                        <li class="item">
                            <a href="<?= Url::to(['/search/search']); ?>">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"><circle cx="6.84442" cy="6.84442" r="5.99237" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.0122 11.3232L13.3616 13.6665" stroke="#B4B4B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="name">
                                    <?= Yii::t('custom', 'Поиск'); ?>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="user">
                    <?php if (Yii::$app->user->isGuest): ?>
                    <?php else: ?>
                        <div class="avatar user-toggle">
                            <?= Image::widget([
                                'user' => $userModel,
                                'link'  => false,
                                'width' => 60
                            ])?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="user-menu">
                <?= \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
            </div>
            <div class="overlay toggle"></div>
        </aside>       
        <!-- Sidebar End -->

        <!-- Content Start -->
        <?= $content; ?>
        <!-- Content End -->

        <?php $this->endBody(); ?>

        <!-- JS Mods Start -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="<?= $this->theme->getBaseUrl(); ?>/js/CtrlEnterMod.js"></script>
        <script src="<?= $this->theme->getBaseUrl(); ?>/js/template.js"></script>
        <!-- JS Mods End -->

    </body>
</html>
<?php $this->endPage() ?>
