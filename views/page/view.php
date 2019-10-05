<?php $this->title = $model->name ?> 
<div class="nsp-page">
    <?php if (!$model->is_club): ?>
        <h1><?= $this->title ?></h1>
    <?php endif; ?>
    <div class="col-xs-12 nsp-page-description">
        <?= $model->description ?>
    </div>
</div>
