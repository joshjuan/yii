<?php

use kartik\growl\Growl;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
    <div class="col-lg-8 col-sm-8 col-xs-12 no-padding">
        <h3 class="box-title">
            <i class="fa fa-users"></i> <?php echo $this->title ?>
        </h3>
    </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
    <div class="box">
        <div class="box-header">
            <!--- add user  add here button here -->
            <?= Html::Button('Add User', ['value'=>Url::to(['user/create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>

        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="user-index">

                <?php
                Modal::begin([
                    'header'=>'<h5 class="page-header">
                                   <i class="fa fa-user"></i> User Details 
                                </h5>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
                   ?>

                <?php

                echo Growl::widget([
                'type' => Growl::TYPE_GROWL,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'title' => 'Message',
                'showSeparator' => true,
                'body' => 'List of Registered user.'
                ]); ?>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'layout' => "{summary}\n{items}\n{pager}",
                    'summary' => '',
                    'tableOptions' => [
                        'class' => 'table table-striped table-bordered',
                    ],
                    'summary'=>'',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'username',
                        // 'auth_key',
                        // 'password_hash',
                        // 'password_reset_token',
                        //'email:email',
                        //'created_at',
                        'role',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {

                                if ($model->status == User::STATUS_ACTIVE) {
                                    return 'Active';
                                } elseif ($model->status == User::STATUS_DELETED) {
                                    return 'Disabled';
                                }
                            }

                        ],
                        [
                            'attribute' => 'created_at',
                            'format' => ['date', 'Y-M-d H:i:s'],
                        ],

                        ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>


