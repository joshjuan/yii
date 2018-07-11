<?php

use backend\models\Agent;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AgentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agents';
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
            <?= Html::Button('Add Agent', ['value'=>Url::to(['agent/create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>

        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="user-index">

                <?php
                Modal::begin([
                    'header'=>'<h5 class="page-header">
                                   <i class="fa fa-user"></i> Agent Details 
                                </h5>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
                ?>

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
                        'name',
                        'email:email',
                        'phone',
                        [
                                'attribute'=>'zone_id',
                                'label'=>'zone name',
                                'value'=>'zone.name',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {

                                if ($model->status == Agent::STATUS_ACTIVE) {
                                    return 'Active';
                                } elseif ($model->status == Agent::STATUS_DELETED) {
                                    return 'Disabled';
                                }
                            }

                        ],
                      //  [
                        //    'attribute' => 'created_at',
                          //  'format' => ['date', 'Y-M-d H:i:s'],
                       // ],

                        ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>


