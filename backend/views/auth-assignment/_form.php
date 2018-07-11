<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="container clearfix main_section" >
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">ROLE ASSIGNMENT</h4>
                        </div>
                        <div class="panel-body">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <?php // $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
                                                <?= $form->field($model, 'item_name')->dropDownList(\backend\models\AuthItem::getAll(),['prompt'=>'-- Select Role Name --']) ?>
                                            </div>
                                        </div></div>
                                    <div class="row"> <div class="col-sm-12">
                                            <div class="form-group">
                                                <?php //$form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
                                                <?= $form->field($model, 'user_id')->dropDownList(\backend\models\User::getAll(),['prompt'=>'-- Select User Name --']) ?>
                                            </div>
                                        </div></div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <?php //$form->field($model, 'created_at')->textInput() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

                                    <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-warning']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
