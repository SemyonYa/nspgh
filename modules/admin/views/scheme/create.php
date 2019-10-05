<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */

$this->title = 'Новая схема назначения';
$this->params['breadcrumbs'][] = ['label' => 'Схемы назначений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', compact('model', 'sc_model')) ?>

</div>
