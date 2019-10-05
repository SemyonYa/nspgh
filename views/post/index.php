<?php $this->title = 'Блог | ' . $this->title ?>

<h2 class="nsp-blog">Блог</h2>
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 nsp-bloger">
    <div class="nsp-post-description">
        Давайте знакомиться!
    </div>
    <div class="nsp-bloger-img">
        <img src="/web/images/bloger_opt.jpg" alt="NSP" />
    </div>
    <div class="nsp-bloger-text">
        <p>Я являюсь сертифицированным нутрициологом, специалистом по правильному питанию, специалистом по Биорезонансному тестированию и оздоровлению организма, руководителем проекта-Школа правильного питания.</p>
        <p>Свою профессиональную деятельность всегда представляла связанную с медициной.</p>
        <p>Первым учебным учреждением стало медицинское училище, которое я успешно закончила в 1986 году с красным дипломом и поступила в этом же году в Курский медицинский институт.</p>
        <p>Недобрав полбала, приняла предложение попробовать себя в фармации. Ни разу не пожалев об этом. Прошла карьерную лестницу Фармации от простого провизора до ведущего специалиста Департамента Здравоохранения Нижнего Новгорода.</p>
        <p>Почему снова столкнулась с медициной расскажу на своем примере.</p>
        <p>Но давайте задумаемся вначале моего повествования о применении фразы - “Здравствуйте”. Несомненно, она автоматически всегда на устах при приветствии.</p>
        <p>А вторая такая же часто используемая фраза - “Будь здоров”! Мы всегда говорим пожелания здравия в праздники и дни рождения, либо просто когда чихнули…</p>
        <p>И, наверное, от такого частого и автоматического употребления редко делаем это осмысленно.</p>
        <p>Конечно, здоровье нужно каждому, без него все остальное теряет значение. Но согласитесь, далеко не всегда мы прикладываем достаточно усилий для этого, хотя знаем о том, что доминирующая роль в сохранении нашего здоровья лежит за пределами медицинских учреждений и находится в наших руках.</p>
    </div>
</div>
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 nsp-posts">
    <div class="nsp-posts-filter">
        <h4 class="nsp-posts-filter-name">Фильтры</h4>
        <?php foreach ($categories as $category): ?>
            <?= yii\helpers\Html::checkbox('cat-' . $category->id, TRUE, ['label' => $category->name, 'class' => 'nsp-posts-categories', 'onclick' => 'FilterPosts()']) ?> <br />
        <?php endforeach; ?>
    </div>
    <div class="nsp-posts-list">
        <?php foreach ($posts as $post): ?>
            <div class="col-xs-12 nsp-posts-item" data-cat="cat-<?= $post->category_id ?>">
                <?php if ($post->img_id > 0): ?>
                    <img src="<?= \Yii::$app->imagemanager->getImagePath($post->img_id) ?>" />
                    <div class="nsp-posts-item-text">
                        <h3><?= $post->title ?></h3>
                        <?= $post->description ?> <br />
                        <a href="/post/view?id=<?= $post->id ?>">Подробнее...</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    function FilterPosts() {
        $('.nsp-posts-categories').each(function () {
            if (!$(this).prop('checked')) {
                Disabling($(this).attr('name'));
            } else {
                Enabling($(this).attr('name'));
            }
        });
    }
    function Disabling(cat) {
        $('.nsp-posts-item').each(function () {
            if ($(this).data('cat') === cat) {
                $(this).addClass('post-disabled');
            }
        });
    }
    function Enabling(cat) {
        $('.nsp-posts-item').each(function () {
            if ($(this).data('cat') === cat) {
                $(this).removeClass('post-disabled');
            }
        });
    }
//    var categories = $('.nsp-posts-categories');
//    var posts = $('.nsp-posts-item');
//    categories.each(function () {
//        $(this).change(function () {
//            categories.each(function () {
//                var catName = $(this).attr('name');
//                alert(catName);
//                if (!$(this).prop('checked')) {
//                    $('div[data-cat="' + catName +'"]').each()
////                    posts.each(function () {
//////                        alert('123');
////                        if ($(this).attr('data-cat') = catName) {
////                            $(this).addClass('post-disabled');
////                        } else {
////                            $(this).removeClass('post-disabled');
////                        }
////                    });
//                }
//            });
////             alert($(this).attr('name'));
//        });
//    });

</script>