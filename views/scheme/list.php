<div class="col-xs-12 nsp-scheme-list">
    <h1><a href="/scheme"><b>Схемы назначений:</b></a> <?=$scheme_category->name ?></h1>
    <ul>
        <?php foreach ($schemes as $s): ?>
        <li><a href="/scheme/view?id=<?= $s->id ?>"><div><?= $s->name ?></div></a></li>
        <?php endforeach; ?>
    </ul>
</div>