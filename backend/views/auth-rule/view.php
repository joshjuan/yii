<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Rules', 'url' => ['index']];
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
                                    'name',
                                    'data',
                                    'created_at',
                                    'updated_at',
                                ],
                            ]) ?>
                        </div>
                        <p style="padding-left: 80%">
                            <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->name], [
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


