<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Tlist;

$dataProvider = new ActiveDataProvider([
    'query' => Tlist::find()
    ->where(['u_id' => Yii::$app->user->identity->id]),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
$this->title = 'To Do Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>To Do List</h2>
    </div>

    <div class="body-content">
    

        <div class="row">
        <p><?= Html::a('Create Task', ['createtask'], ['class' => 'btn btn-success']) ?></p>
          <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'task',
                    [
                        'attribute' => 'done',
                        'format' => 'boolean',
                    ],
                    
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],

                ],
            ]); 
          ?>
        </div>

    </div>
</div>
