<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\posts\models\NewsGroups */

$this->title = 'Create News Groups';
$this->params['breadcrumbs'][] = ['label' => 'News Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
