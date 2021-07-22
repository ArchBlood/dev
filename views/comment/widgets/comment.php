<?php

use humhub\libs\Html;
use humhub\modules\content\widgets\UpdatedIcon;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\comment\widgets\CommentEntryLinks;
use humhub\widgets\TimeAgo;
use humhub\modules\content\widgets\richtext\RichText;
use humhub\modules\user\widgets\Image as UserImage;
use humhub\modules\file\widgets\ShowFiles;
use humhub\modules\comment\widgets\Comments;
use humhub\modules\comment\models\Comment;
use humhub\modules\rocketcore\widgets\UserOccupation;

/* @var $this \humhub\modules\ui\view\components\View */
/* @var $comment \humhub\modules\comment\models\Comment */
/* @var $deleteUrl string */
/* @var $editUrl string */
/* @var $loadUrl string */
/* @var $user \humhub\modules\user\models\User */
/* @var $canEdit bool */
/* @var $canDelete bool */
/* @var $createdAt string */
/* @var $updatedAt string */

/** @var \humhub\modules\comment\Module $module */
$module = Yii::$app->getModule('comment');
$occupation = class_exists('\\humhub\\modules\\rocketcore\\widgets\\UserOccupation')
    ? \humhub\modules\rocketcore\widgets\UserOccupation::widget(['model' => $user])
    : '';
?>

<div class="media" id="comment_<?= $comment->id; ?>" data-action-component="comment.Comment" data-content-delete-url="<?= $deleteUrl ?>">

    <?php if ($canEdit || $canDelete) : ?>
        <div class="comment-entry-loader pull-right"></div>
        <ul class="nav nav-pills preferences">
            <li class="dropdown ">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-label="<?= Yii::t('base', 'Toggle comment menu'); ?>" aria-haspopup="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="9" viewBox="0 0 15 9" fill="none"> <path d="M1 1L7.5 8L14 1" stroke="#045269" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                </a>

                <ul class="dropdown-menu pull-right">
                    <?php if ($canEdit): ?>
                        <li>
                            <a href="#" class="comment-edit-link" data-action-click="edit" data-action-url="<?= $editUrl ?>">
                                <div class="item"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M24.2218 3.00586L21.9564 0.767106C20.9213 -0.255726 19.2372 -0.255678 18.2021 0.767106C17.2275 1.73021 2.34199 16.4403 1.34721 17.4234C1.24126 17.5281 1.17026 17.6672 1.14497 17.8033L0.0122517 23.848C-0.0316448 24.0823 0.0439411 24.323 0.214498 24.4916C0.38525 24.6603 0.628902 24.7348 0.865767 24.6915L6.98242 23.572C7.12378 23.546 7.26274 23.4752 7.36694 23.3721L24.2218 6.71588C25.2593 5.69069 25.2595 4.03121 24.2218 3.00586ZM1.64653 23.0764L2.33173 19.4199L5.34668 22.3993L1.64653 23.0764ZM6.84907 21.8368L2.90087 17.9352L17.3154 3.69047L21.2636 7.59213L6.84907 21.8368ZM23.186 5.69237L22.2994 6.56863L18.3512 2.66696L19.2378 1.79071C19.7018 1.33225 20.4566 1.3322 20.9206 1.79071L23.186 4.02947C23.6511 4.48904 23.6511 5.23275 23.186 5.69237Z" fill="#045269"></path></svg></div> <?= Yii::t('CommentModule.base', 'Edit') ?></div>
                            </a>
                            <a href="#" class="comment-cancel-edit-link" data-action-click="cancelEdit" data-action-url="<?= $loadUrl ?>" style="display:none;">
                                <div class="item"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M24.2218 3.00586L21.9564 0.767106C20.9213 -0.255726 19.2372 -0.255678 18.2021 0.767106C17.2275 1.73021 2.34199 16.4403 1.34721 17.4234C1.24126 17.5281 1.17026 17.6672 1.14497 17.8033L0.0122517 23.848C-0.0316448 24.0823 0.0439411 24.323 0.214498 24.4916C0.38525 24.6603 0.628902 24.7348 0.865767 24.6915L6.98242 23.572C7.12378 23.546 7.26274 23.4752 7.36694 23.3721L24.2218 6.71588C25.2593 5.69069 25.2595 4.03121 24.2218 3.00586ZM1.64653 23.0764L2.33173 19.4199L5.34668 22.3993L1.64653 23.0764ZM6.84907 21.8368L2.90087 17.9352L17.3154 3.69047L21.2636 7.59213L6.84907 21.8368ZM23.186 5.69237L22.2994 6.56863L18.3512 2.66696L19.2378 1.79071C19.7018 1.33225 20.4566 1.3322 20.9206 1.79071L23.186 4.02947C23.6511 4.48904 23.6511 5.23275 23.186 5.69237Z" fill="#045269"></path></svg></div> <?= Yii::t('CommentModule.base', 'Cancel Edit') ?></div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($canDelete): ?>
                        <li>
                            <a href="#" data-action-click="delete">
                                <div class="item"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 25 30" fill="none"> <path d="M16.4479 10.4016C16.0845 10.4016 15.79 10.7357 15.79 11.1481V25.2573C15.79 25.6693 16.0845 26.0038 16.4479 26.0038C16.8113 26.0038 17.1058 25.6693 17.1058 25.2573V11.1481C17.1058 10.7357 16.8113 10.4016 16.4479 10.4016Z" fill="#045269"></path> <path d="M8.5534 10.4016C8.19002 10.4016 7.89551 10.7357 7.89551 11.1481V25.2573C7.89551 25.6693 8.19002 26.0038 8.5534 26.0038C8.91679 26.0038 9.2113 25.6693 9.2113 25.2573V11.1481C9.2113 10.7357 8.91679 10.4016 8.5534 10.4016Z" fill="#045269"></path> <path d="M2.04739 8.90279V26.1575C2.04739 27.1774 2.43232 28.1351 3.10476 28.8223C3.7741 29.5114 4.7056 29.9026 5.68046 29.9043H19.3195C20.2947 29.9026 21.2262 29.5114 21.8952 28.8223C22.5677 28.1351 22.9526 27.1774 22.9526 26.1575V8.90279C24.2893 8.5581 25.1555 7.30352 24.9767 5.97097C24.7976 4.6387 23.6293 3.64209 22.2461 3.64182H18.5553V2.7664C18.5595 2.03024 18.2599 1.32334 17.7235 0.803286C17.1871 0.283508 16.4583 -0.00592646 15.7005 9.20179e-05H9.29945C8.54169 -0.00592646 7.81294 0.283508 7.27651 0.803286C6.74008 1.32334 6.44047 2.03024 6.44469 2.7664V3.64182H2.7539C1.37073 3.64209 0.202412 4.6387 0.0233205 5.97097C-0.155489 7.30352 0.710681 8.5581 2.04739 8.90279ZM19.3195 28.5036H5.68046C4.44794 28.5036 3.48913 27.475 3.48913 26.1575V8.96435H21.5109V26.1575C21.5109 27.475 20.5521 28.5036 19.3195 28.5036ZM7.88643 2.7664C7.88165 2.40174 8.0292 2.05075 8.29558 1.79333C8.56169 1.5359 8.92381 1.39446 9.29945 1.40076H15.7005C16.0762 1.39446 16.4383 1.5359 16.7044 1.79333C16.9708 2.05048 17.1184 2.40174 17.1136 2.7664V3.64182H7.88643V2.7664ZM2.7539 5.04248H22.2461C22.9628 5.04248 23.5437 5.60685 23.5437 6.30308C23.5437 6.99931 22.9628 7.56368 22.2461 7.56368H2.7539C2.03725 7.56368 1.45633 6.99931 1.45633 6.30308C1.45633 5.60685 2.03725 5.04248 2.7539 5.04248Z" fill="#045269"></path> <path d="M12.5007 10.4016C12.1373 10.4016 11.8428 10.7357 11.8428 11.1481V25.2573C11.8428 25.6693 12.1373 26.0038 12.5007 26.0038C12.8641 26.0038 13.1586 25.6693 13.1586 25.2573V11.1481C13.1586 10.7357 12.8641 10.4016 12.5007 10.4016Z" fill="#045269"></path> </svg></div> <?= Yii::t('CommentModule.base', 'Delete') ?></div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    <?php endif; ?>

    <div class="comment-frame">
        <div class="comment-frame-image">
            <?= UserImage::widget(['user' => $user, 'width' => 40, 'htmlOptions' => ['class' => '', 'data-contentcontainer-id' => $user->contentcontainer_id]]); ?>
        </div>
        <div class="comment-frame-body">
            <div class="media-body">
                <h4 class="media-heading">
                    <?= Html::containerLink($user) ?>
                    <small>&middot <?= TimeAgo::widget(['timestamp' => $createdAt]) ?>
                        <?php if ($comment->isUpdated()): ?>
                            &middot <?= UpdatedIcon::getByDated($comment->updated_at) ?>
                        <?php endif; ?>
                    </small>
                    <br />
                    <?= $occupation ?>
                </h4>
            </div>
            <!-- class comment_edit_content required since v1.2 -->
            <div class="content comment_edit_content" id="comment_editarea_<?= $comment->id; ?>">
                <div id="comment-message-<?= $comment->id; ?>" class="comment-message" data-ui-markdown data-ui-show-more
                    data-read-more-text="<?= Yii::t('CommentModule.base', 'Read full comment...') ?>">
                    <?= RichText::output($comment->message, ['record' => $comment]); ?>
                </div>
                <?= ShowFiles::widget(['object' => $comment]); ?>
            </div>
            <div class="wall-entry-controls">
                <?= CommentEntryLinks::widget(['object' => $comment]); ?>
            </div>
        </div>
    </div>
    <div class="nested-comments-root">
        <?= Comments::widget(['object' => $comment]); ?>
    </div>
</div>
