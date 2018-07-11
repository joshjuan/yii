<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username .' login details';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
    <div class="col-lg-8 col-sm-8 col-xs-12 no-padding">
        <h3 class="box-title"><i class="fa fa-user"></i>
            <?php echo Yii::t('app', 'View User') ?></h3>
    </div>
</div>

<div class="col-xs-12">
    <div class="box box-primary view-item">
        <div class="user-view">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'username',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    //'email:email',
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
