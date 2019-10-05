<?php

use yii\helpers\Html;

//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FltrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фильтры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fltr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-fltrs">
        <?php foreach ($filters as $filter): ?>
            <tr>
                <td colspan="2"><b><?= $filter->name ?>:</b></td>
                <td>
                    <a href="/admin/fltr/update?id=<?= $filter->id ?>" title="Редактировать" aria-label="Редактировать" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> 
                    <a href="/admin/fltr/delete?id=<?= $filter->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a></td>
                </td>
            </tr>
            <?php if ($filter->children != null) : ?>
                <?php
                $i = 0;
                foreach ($filter->children as $child):
                    $i++;
                    ?>    
                    <tr>
                        <td><?= $i; ?>.</td>
                        <td><?= $child->name ?></td>
                        <td>
                            <a href="/admin/fltr/view?id=<?= $child->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> 
                            <a href="/admin/fltr/update?id=<?= $child->id ?>" title="Редактировать" aria-label="Редактировать" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="/admin/fltr/delete?id=<?= $child->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>
    </table>
</div>
