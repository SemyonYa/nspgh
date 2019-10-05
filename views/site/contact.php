<?php 
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
?>
<div class="col-xs-12 nsp-contact">
    <div class="col-xs-12 visible-xs nsp-contact-logo">
        <a href="/">
            <img style="opacity: 0" src="/web/images/logo-full-600.png" />
        </a>
    </div>
    <h1>Контакты</h1>
    
    <div class="col-xs-12 nsp-contact-list">
        <div class="nsp-contact-item">
            <h4>Консультация по телефону</h4>
            <a href="tel:88005116998"><span class="glyphicon glyphicon-phone-alt"></span></a>
            <h4>8-800-511-69-98</h4>
        </div>
        <div class="nsp-contact-item">
            <h4>Пишите на почту</h4>
            <a href="mailto:info@nsp-wellness.ru"><span class="glyphicon glyphicon-envelope"></span></a>
            <h4>info@nsp-wellness.ru</h4>
        </div>
        <div class="nsp-contact-item">
            <h4>Форма обратной связи</h4>
            <a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-comment"></span></a>
            <h4>по любым вопросам</h4>
        </div>
    </div>
    <div class="col-xs-12 nsp-contact-social">
        <div class="nsp-contact-social-item"><a href="https://vk.com"><img src="/web/images/vk.png"></a></div>
        <div class="nsp-contact-social-item"><a href="https://fb.com"><img src="/web/images/fb.png"></a></div>
        <div class="nsp-contact-social-item"><a href="https://instagram.com"><img src="/web/images/insta.png"></a></div>
    </div>
    <div class="col-xs-12 nsp-contact-logo">
        <a href="/">
            <img style="opacity: 0" src="/web/images/logo-full-600.png" />
        </a>
    </div>
</div>


<!-- Модаль --> 
<!--        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Launch demo modal
        </button>--> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Обратная связь</h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?=
                $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ])
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить <span class="glyphicon glyphicon-envelope" style="color:#5bb12a"></span>', 
                            ['class' => 'btn btn-default', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            
<!--            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-default">Отправить...</button>
            </div>-->
        </div>
    </div>
</div>