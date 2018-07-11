<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone_id')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="col-xs-12 col-lg-12" style="padding-top: 20px">
    <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
        <div class="user-form">

            <?php $form = ActiveForm::begin([
                'id' => 'user-form',
                'options' => ['enctype' => 'multipart/form-data'],
                // 'enableAjaxValidation' => true,

            ]); ?>
            <h5 class="page-header">
                <i class="fa fa-info"></i> <?php echo Yii::t('app', 'User Details'); ?>
            </h5>
            <div class="col-sm-12 no-padding">
                <div class="col-sm-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>
                </div>
            </div>

            <div class="col-sm-12 no-padding">
                <div class="col-sm-6">
                    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength'=>100]) ?>
                </div>
            </div>

            <div class="col-sm-12 no-padding">
                <div class="col-sm-6">
                    <?= $form->field($model, 'role')->dropDownList(User::getRules(),['prompt'=>'-- select Role name --']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'status')->dropDownList(User::getArrayStatus()) ?>
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss">
                <div class="col-xs-6">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-success']) ?>
                </div>
                <div class="col-xs-6">
                    <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
