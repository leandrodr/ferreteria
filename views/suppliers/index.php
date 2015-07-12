<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuppliersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proveedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suppliers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_name',
            'account_number',
            [
                'attribute' => 'nombres',
                'value' => 'person.first_name'
            ],
            [
                'attribute' => 'apellidos',
                'value' => 'person.last_name'
            ],
            [
                'attribute' => 'celular',
                'value' => 'person.phone_number'
            ],
            [
                'attribute' => 'email',
                'value' => 'person.email'
            ],
            [
                'attribute' => 'direccion',
                'value' => 'person.address_1'
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
