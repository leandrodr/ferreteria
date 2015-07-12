<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Suppliers */

$this->title = 'Crear Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suppliers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
    ]) ?>

</div>
