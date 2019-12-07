<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model itshkacomua\notebook\models\Notebook */

$this->title = Yii::t('app', 'Update Notebook: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notebooks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="notebook-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
