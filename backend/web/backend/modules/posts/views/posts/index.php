<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\posts\models\NewsGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Groups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'activity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>