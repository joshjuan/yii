<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AppLogs */

$this->title = 'Create App Logs';
$this->params['breadcrumbs'][] = ['label' => 'App Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
