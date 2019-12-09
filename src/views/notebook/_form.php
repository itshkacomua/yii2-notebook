<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model itshkacomua\notebook\models\Notebook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notebook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]);?>

    <?= $form->field($model, 'calendar_time')->widget(DateTimePicker::className(),[
        'name' => 'calendar_time',
        /*'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'd-M-Y g:i A',
            'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]*/
/*
            'name' => 'dp_2',*/
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'value' => '23.02.1982 10:01',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy hh:ii'
        ]
    ]) ?>

    <?
    /*echo '<label>Start Date/Time</label>';
    echo DateTimePicker::widget([
        'name' => 'datetime_10',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'd-M-Y g:i A',
            'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]
    ]);*/?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
