<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа №<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            //'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>',
                'format' => 'html',
            ],
            'first_name',
            'last_name',
            'email:email',
            'phone',
            'address',
            'city',
            'country',
            'post_index',
        ],
    ]) ?>

        <?php $items = $model->orderItems;?>
        <h3>Товары</h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Шрифт</th>
                <th>Надпись</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['font']?></td>
                    <td><?= $item['text']?></td>
                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>

</div>
