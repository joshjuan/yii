<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRule */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="container clearfix main_section" style="padding-top: 25px">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">
            <div class="row">
                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">ROLE ASSIGNMENT</h4>
                        </div>
                        <div class="panel-body">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div></div>
                                    <div class="row"> <div class="col-sm-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'data')->textInput() ?>
                                            </div>
                                        </div></div>
                                </div>
                                <div class="col-sm-6">
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
