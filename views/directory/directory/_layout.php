<?php

use humhub\modules\directory\widgets\Menu;

\humhub\assets\JqueryKnobAsset::register($this);
?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <?php if (class_exists('\humhub\modules\directory\widgets\MenuUsers')): ?>
                <?=\humhub\modules\directory\widgets\MenuUsers::widget()?>
                <?=\humhub\modules\directory\widgets\MenuSpaces::widget()?>
            <?php else: ?>
                <?=Menu::widget()?>
            <?php endif; ?>
        </div>
        <div class="col-md-10">
            <?=$content;?>
        </div>
    </div>
</div>
