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

    <div class="row">

    <?= $form->field($model, 'parent_id', ['options' => ['class' => 'col-xs-6']])->dropDownList(\itshkacomua\notebook\models\Notebook::getParentList()) ?>

    <?= $form->field($model, 'calendar_time', ['options' => ['class' => 'col-xs-6']])->widget(DateTimePicker::className(),[
        'name' => 'calendar_time',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'value' => '23.02.1982 10:01',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy hh:ii'
        ]
    ]) ?>

    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
