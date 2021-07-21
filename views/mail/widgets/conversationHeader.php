<?php
    use humhub\libs\Html;
    use humhub\modules\mail\widgets\ConversationSettingsMenu;
    use humhub\modules\mail\widgets\ParticipantUserList;
    use humhub\modules\user\widgets\Image;
    use humhub\widgets\ModalButton;
    use humhub\modules\mail\helpers\Url;

    /* @var $message \humhub\modules\mail\models\Message */

    // Max items (including show more button) to display, should be > 2
    $maxUserImageEntries = 3;

    $users = $message->users;
    $userCount = count($users);

    // We only display the show more button if we have more than one overlapping user
    $maxUserImages = ($userCount === $maxUserImageEntries) ? $maxUserImageEntries : $maxUserImageEntries - 1;

    $userList = '';
?>

<div class="conversation-head-avatar">
    <?php if (!empty($users)) : ?>
        <?php foreach ($users as $index => $user) : ?>
            <?php if ($index < $maxUserImages) : ?>
                <?= Image::widget(['user' => $user, 'width' => '48', 'showTooltip' => true, 'link' => true, 'linkOptions' => ['class' => '']]) ?>
            <?php else: ?>
                <?php $userList .= Html::encode($user->getDisplayName()) ?>
                <?php $userList .= ($index < $userCount - 1) ? '<br>' : '' ?>
            <?php endif ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="conversation-head-info">
    <?= Yii::t('MailModule.base', '{name}', ['name' => $link]) ?>
    <?= ParticipantUserList::widget(['message' => $message, 'options' => ['class' => '']]) ?>
</div>

<div class="conversation-head-dropdown">
    <?php if (!empty($users)) : ?>
        <?php if ($userCount > $maxUserImageEntries) : ?>
            <?= ModalButton::defaultType('+' . (count($message->users) - $maxUserImages))
                ->load(Url::toConversationUserList($message))
                ->cssClass('conversation-head-button')
                ->tooltip($userList)
                ->cssClass('hidden-xs')
                ->options(['data-html' => 'true', 'data-placement' => 'bottom'])
                ->sm()->loader(false) ?>
        <?php endif; ?>

        <?= ConversationSettingsMenu::widget(['message' => $message]) ?>
    <?php endif; ?>
</div>
