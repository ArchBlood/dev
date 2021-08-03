<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

use humhub\modules\ui\menu\DropdownDivider;
use humhub\widgets\FooterMenu;
use \yii\helpers\Html;
use \yii\helpers\Url;
use humhub\modules\user\widgets\Image;

/* @var $this \humhub\modules\ui\view\components\View */
/* @var $menu \humhub\modules\ui\menu\widgets\DropdownMenu */
/* @var $entries \humhub\modules\ui\menu\MenuEntry[] */
/* @var $options [] */

/** @var \humhub\modules\user\models\User $userModel */

$userModel = Yii::$app->user->identity;

?>

<?php if (Yii::$app->user->isGuest): ?>
    <?php if(!empty($entries)) :?>
        <?= $entries[0]->render() ?>
    <?php endif; ?>
<?php else: ?>
    <ul>
        <?php foreach ($entries as $entry): ?>
            <?php if(!($entry instanceof DropdownDivider)) : ?><li><?php endif; ?>
                <?= $entry->render() ?>
            <?php if(!($entry instanceof DropdownDivider)) : ?></li><?php endif; ?>
        <?php endforeach; ?>
        <?= FooterMenu::widget(['location' => FooterMenu::LOCATION_ACCOUNT_MENU]); ?>
    </ul>
<?php endif; ?>
