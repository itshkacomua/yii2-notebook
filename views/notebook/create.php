<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model itshkacomua\notebook\models\Notebook */

$this->title = Yii::t('app', 'Create Notebook');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notebooks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notebook-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
