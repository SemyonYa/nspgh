<div class="col-xs-12 nsp-scheme">
    <?php
    $this->title = 'Схемы назначения'
    ?>
    <h1><?= $this->title ?></h1>
    <ul>
        <?php foreach ($scheme_categories as $sc): ?>
        <li><a href="/scheme/list?id=<?=$sc->id?>"><div><?=$sc->name?></div></a></li>
        <?php endforeach; ?>
    </ul>

</div>