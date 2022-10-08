<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\widgets\DetailView;
use frontend\models\Contact;

/** @var yii\web\View $this */
/** @var frontend\models\People $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="people-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    <div class="d-flex justify-content-between">
        <div class="fir">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <?= Html::a('Add contact', ['/contact/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'email:email',
            // 'status',
        ],
    ]) ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'countrycodes',
            'number',
            // 'people_id',
            //'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {made}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a("Update", Url::base() . "/contact/update?id=" . $model->id, [
                            'title' => "Update",
                            'class' => 'btn btn-sm btn-info',
                            'data' => [
                                'method' => 'post',
                                // 'confirm' => 'Are you sure? This will Suspend this.',
                            ],
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        //if ($model->status === $model::STATUS_SUSPENDED) {
                        //    return Html::a("Activate", $url, [
                        //        'title' => "Activate",
                        //        'class' => 'btn btn-xs btn-success',
                        //        'data' => [
                        //            'method' => 'post',
                        //            'confirm' => 'Are you sure? This will Activate this.',
                        //        ],
                        //    ]);
                        //}
                        return Html::a("Delete", Url::base() . "/contact/delete?id=" . $model->id, [
                            'title' => "Delete",
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Are you sure? This will Suspend this.',
                            ],
                        ]);
                    }
                ],
            ]
        ],
    ]); ?>

</div>