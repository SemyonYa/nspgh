
<?php $this->title = $category->name ?>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 nsp-products">
    <div class="col-sm-3 nsp-products-filters">
        <h5>Фильтры</h5>
        <!--ACCORDEON START-->
        <button class="btn btn-primary nsp-filter-btn" onclick="FilteringProductList(<?=$category->id ?>)">Применить фильтры</button>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($filters as $f): ?>
                <div class="panel panel-default">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $f->id ?>" aria-expanded="true" aria-controls="collapse<?= $f->id ?>">
                        <div class="panel-heading" role="tab" id="heading<?= $f->id ?>">
                            <h4 class="panel-title">

                                <?= $f->name ?>

                            </h4>
                        </div>
                    </a>
                    <div id="collapse<?= $f->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $f->id ?>">
                        <div class="panel-body">
                            <?php if ($f->children): ?>
                                <?php foreach ($f->children as $f_ch): ?>
                                    <div class="nsp-filter-item">
                                        <input type="checkbox" id="check<?= $f_ch->id ?>" value="<?= $f_ch->id ?>" data-filter="plus" /><label for="check<?= $f_ch->id ?>"><?= $f_ch->name ?></label><br />
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--ACCORDEON END-->
    </div>
    <div class="col-xs-12 col-sm-9" id="NspProductList">
<!--        <div class="col-xs-12"></div>-->
    </div>
</div>
<script>
    $(document).ready(function () {
        LoadProductList(<?= $category->id ?>);
        // var exist = $('#NspSetList');
        // if (exist.text() !== '') {
        //     LoadSetList();
        // }
    });
</script>