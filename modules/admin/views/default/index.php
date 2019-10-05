<div class="admin-default-index">
    <h1>Панель администрирования</h1>
    <h3>Текущая валюта:</h3>
    <?php $current = app\models\Product::Currency() ?>
    <h5>Последнее обновление: <b><?= $current->date ?></b></h5> 
    <h5>Значение: <b><?= $current->value ?></b></h5>
    <button onclick="CurrencyToday()">Проверить валюту</button>
    
    <button onclick="SendMail()">Send Mail</button>
    <?php 
//    echo strtotime(date('Y-m-d H:i:s'));
    ?>
</div>
