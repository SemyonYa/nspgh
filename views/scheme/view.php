<?php
$this->title = $model->name;
?>
<div class="col-xs-12 nsp-scheme-view">
    <a href="/scheme"><b>..НАЗАД</b></a>
    <h1><?= $this->title ?></h1>
    <?= $model->description ?>
    <h3>Продукты схемы назначений:</h3>
    <p>
        <?php foreach ($model->products as $p): ?>
        <span> / <a href="/product/view?id=<?=$p->id?>"><?=$p->name?></a> / </span>
        <?php endforeach; ?>
    </p>
</div>