<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="container clearfix main_section" style="padding-top: 25px">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">
            <div class="row">
                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">AUTH ITEMS</h4>
                        </div>
                        <p style="padding-top: 20px;padding-left: 10px">
                            <?php echo Html::a('Create Auth Item', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div class="panel-body">

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'item_name',
                                    'user_id',
                                    'created_at',
                                ],
                            ]) ?>
                        </div>
                        <p style="padding-left: 80%">
                            <?= Html::a('Update', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>