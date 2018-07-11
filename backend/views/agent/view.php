<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Agent */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-xs-12">
    <div class="col-lg-8 col-sm-8 col-xs-12 no-padding">
        <h3 class="box-title"><i class="fa fa-user"></i>
            <?php echo Yii::t('app', 'View Agent') ?></h3>
    </div>
</div>

<div class="col-xs-12">
    <div class="box box-primary view-item">
        <div class="user-view">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'name',
                    'email:email',
                    'phone',
                    [
                        'attribute'=>'zone_id',
                        'label'=>'zone name',
                        'value'=>$model->zone->name,
                    ],
                    'username',
                    'username',

                    [
                        'attribute' => 'status',
                        'value' => $model->statusLabel,
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>
        </div>
        <div class="col-xs-12">
            <div class="col-lg-8 col-sm-8 col-xs-12 no-padding ">
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
                <div class="col-xs-4 left-padding">
                    <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-block btn-warning']) ?>
                </div>
                <div class="col-xs-4 left-padding">
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-block btn-info']) ?>
                </div>
                <div class="col-xs-4 left-padding">
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-block btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>
</div>
