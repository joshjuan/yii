<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Items';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="container clearfix main_section" style="padding-top: 25px">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">USERS ROLES LIST</h4>
                        </div>
                        <p style="padding-top: 20px;padding-left: 10px">
                            <?php echo Html::a('Add role', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div class="panel-body">

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'summary'=>'',
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'name',
                                    //'type',
                                    'description:ntext',
                                   // 'rule_name',
                                   // 'data',
                                   // 'created_at',
                                  //  'updated_at',

                                    ['class' => 'yii\grid\ActionColumn',
                                    'header'=>'actions',
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

