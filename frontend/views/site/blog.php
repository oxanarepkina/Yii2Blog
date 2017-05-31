<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Blog';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Blog!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
            $group_list = ArrayHelper::map($groups, 'id','name');
            ?>
            <?= Html::dropDownList('category', null, $group_list) ?>
            <?= Html::dropDownList('year', null, $years) ?>

            <button>Sort</button>

            <?foreach ($posts as $post):?>
                <h1><?=$post->name?></h1>
                <h5><?=$post->date?></h5>
                <p><?=$post->description;?></p>

            <?endforeach;?>


        </div>

    </div>
</div>