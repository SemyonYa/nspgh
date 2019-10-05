<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Наборы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить набор', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'art',
            'name',
            'brief_description:ntext',
            // 'full_description:ntext',
            // 'price',
            // 'price_without_discount',
            // 'img_id',
            // 'is_promo',
            // 'galery_1',
            // 'galery_2',
            // 'galery_3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
