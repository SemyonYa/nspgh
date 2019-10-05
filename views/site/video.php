<?php $this->title = 'Видео о продукции NSP' ?>
<div class="col-xs-12 nsp-videos">
    <h1>Видео о продукции NSP</h1>
    <?php foreach ($vs as $v): ?>
        <?php if (!$v->is_disabled): ?>
        <div class="nsp-video">
            <h3><?= $v->name?> </h3>
            <div><?= $v->path ?></div>
        </div>         
        <?php endif; ?>
    <?php endforeach; ?>
</div>