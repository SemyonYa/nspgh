<?php 
    $this->title = 'Продукция NSP Nature Sunshine, БАДы NSP, NSP каталог, Официальный сайт NSP дистрибьютора, NSP WELLNESS';
?>

<div class="col-xs-12 nsp-design">
    <div class="nsp-design-canvas">
        <div class="col-xs-12 nsp-design-canvas-border">
            <div class="col-xs-12">
                <div class="col-xs-10 col-md-7">
                    <div class="col-xs-12 nsp-design-canvas-logo">
                        <img src="/web/images/logo-full-600.png" />
                    </div>
                    <div class="col-xs-12 col-md-9 col-md-offset-2 nsp-design-canvas-text">
                        <!--                        Натуральная продукция NSP <br />
                                                БАД и косметика премиум-класса по ценам партнеров-->
                        Наша продукция премиального качества дает больше, чем улучшение здоровья людей - она преображает их жизни. 
                        Отобранная, изготовленная и испытанная по самым строгим стандартам качества, 
                        наша уникальная продуктовая линейка обеспечивает более чем 200 персональных решений для улучшения вашего здоровья.
                    </div>
                </div>
                <div class="col-xs-2 col-xs-offset-0 col-md-1 col-md-offset-4 nsp-design-canvas-icons">
                    <a href="#" title="МЕНЮ" onclick="GetMenu()"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                    <a href="tel:88005116998" title="8-800-511-69-98"><span class="glyphicon glyphicon-earphone"></span></a>
                    <a href="mailto:info@nsp-wellness.ru" title="info@nsp-wellness.ru"><span class="glyphicon glyphicon-envelope"></span></a>
                    <a href="#" title="Написать специалисту..."><span class="glyphicon glyphicon-comment"></span></a>
                </div>
            </div>
            <div class="col-xs-12 nsp-design-canvas-second">
                <div class="col-xs-12 col-md-5 nsp-design-canvas-buttons" >
                    <a href="/product/category-products?id=1" title="Перейти в каталог продукции" class="nsp-design-canvas-btn">Каталог</a>
                    <a href="/about" title="Посмотреть информацию о компании" class="nsp-design-canvas-btn">О компании</a> 
                    <a href="/contact" title="Как с нами связаться" class="nsp-design-canvas-btn">Контакты</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nsp-menu-design" id="MenuDesign">
    <?php $main_menu = app\models\Menu::find()->where(['parent_id' => app\models\Menu::findOne(['uniqcode' => 'main'])->id])->orderBy('ordering')->all(); ?>
    <?php foreach ($main_menu as $m): ?>
        <?php if (app\models\Menu::find()->where(['parent_id' => $m->id])->all() != NULL): ?>
            <div class="nsp-menu-design-item"><a href="<?= $m->url ?>"><?= $m->name ?></a></div>
        <?php else : ?>
            <div class="nsp-menu-design-item"><a href="<?= $m->url ?>"><?= $m->name ?></a></div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="nsp-menu-design-item"><a href="/video">Видео</a></div>    
</div>