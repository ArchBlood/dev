<?php
use humhub\libs\Html;
use humhub\modules\content\components\ContentActiveRecord;
use humhub\modules\content\widgets\ArchivedIcon;
use humhub\modules\content\widgets\stream\WallStreamEntryOptions;
use humhub\modules\content\widgets\VisibilityIcon;
use humhub\modules\content\widgets\WallEntryControls;
use humhub\modules\space\models\Space;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\ui\view\components\View;
use humhub\widgets\TimeAgo;

/* @var $this View */
/* @var $model ContentActiveRecord */
/* @var $headImage string */
/* @var $permaLink string */
/* @var $title string */
/* @var $renderOptions WallStreamEntryOptions */

$container = $model->content->container;
$occupation = class_exists('\\humhub\\modules\\rocketcore\\widgets\\UserOccupation')
    ? \humhub\modules\rocketcore\widgets\UserOccupation::widget(['model' => $model->content->createdBy])
    : '';
$userDisabled = class_exists('\\humhub\\modules\\musztabel\\widgets\\PattyStatus')
    ? \humhub\modules\musztabel\widgets\PattyStatus::widget(['model' => $model->content->createdBy])
    : ''; //Helps to check if user is disabled. Returns 'Deactivated' if user's status is not equal to ENABLED. Can be customized in /views/musztabel/widgets/pattyStatus.php
?>

<div class="stream-entry-icon-list">
    <?php if ($model->content->isArchived()) : ?>
        <?= ArchivedIcon::getByModel($model) ?>
    <?php elseif ($renderOptions->isPinned($model)) : ?>
        <?= Icon::get('map-pin', ['htmlOptions' => ['class' => 'icon-pin tt', 'title' => Yii::t('ContentModule.base', 'Pinned')]]) ?>
    <?php endif; ?>
</div>

<!-- since v1.2 -->
<div class="stream-entry-loader"></div>

<!-- start: show wall entry options -->
<?php if (!$renderOptions->isControlsMenuDisabled()) : ?>
    <?= WallEntryControls::widget(['renderOptions' => $renderOptions, 'object' => $model, 'wallEntryWidget' => $this->context]) ?>
<?php endif; ?>
<!-- end: show wall entry options -->


<div class="wall-entry-header-image">
    <?= $headImage ?>
</div>

<div class="wall-entry-header-info media-body">

    <div class="media-heading">

        <?php if ($userDisabled):?>
            <span class="text-danger" style="text-decoration: line-through;"><?= $title;?></span> &middot <span class="badge" style="background-color: #ff2424;"><?=$userDisabled;?></span>
        <?php else:?>
            <?= $title;?>
        <?php endif;?>

        <div class="wall-entry-icons">
            <?= VisibilityIcon::getByModel($model) ?>
        </div>

        <?php if ($renderOptions->isShowAuthorInformationInSubHeadLine($model)) : ?>
            <?= Html::containerLink($model->content->createdBy, ['class' => 'wall-entry-container-link']) ?>
        <?php endif ?>

        <?php if ($renderOptions->isShowContainerInformationInSubTitle($model)) : ?>
            <?php if ($renderOptions->isShowAuthorInformationInSubHeadLine($model)) : ?>
                <?= Icon::get('caret-right') ?>
                <?= Html::containerLink($model->content->container, ['class' => 'wall-entry-container-link']) ?>
            <?php elseif($model->content->container instanceof Space) : ?>
                <?= Html::containerLink($model->content->container, ['class' => 'wall-entry-container-link']) ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($renderOptions->isShowContainerInformationInTitle($model)) : ?>
            <span class="viaLink">
                <?= Icon::get('caret-right') ?>
                <?= Html::containerLink($model->content->container) ?>
            </span>
        <?php endif; ?>
        <?= $occupation ?>
    </div>

    <div class="media-subheading">
        <a href="<?= $permaLink ?>">
            <?= TimeAgo::widget(['timestamp' => $model->content->created_at]) ?>
        </a>
    </div>
</div>

