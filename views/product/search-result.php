<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h2>Результат поиска</h2>
    <?php if ($message != ''): ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4><?= $message ?></h4>
            <!--<p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>-->
        </div>
        <!--<div class="alert-danger"></div>-->
    <?php else: ?>
        <?php foreach ($categories as $c): ?>
            <h3><?= $c->name ?></h3>
            <ul>
                <?php foreach ($products as $p): ?>
                    <?php if ($p->category_id == $c->id): ?>
                        <li><?= $p->name ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</div>