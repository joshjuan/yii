<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="container clearfix main_section" style="padding-top: 35px">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">
            <div class="row">
                <div class="col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">LIST OF ROLES ASSIGNED</h4>
                        </div>
                        <p style="padding-top: 20px;padding-left: 10px">
                            <?php //echo Html::a('Add Assignment', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div class="panel-body">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'summary'=>'',
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'item_name',
                                    'user_id',
                                   // 'created_at',

                                    ['class' => 'yii\grid\ActionColumn',
                                    'header' => 'Actions',
                                    ],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>

                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>

            </div>
        </div>
    </div>
</section>