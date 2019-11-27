<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_order".
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_product_id
 * @property int $amount
 * * @property int $price_pro
 * * @property int $don_gia
 */
class DetailOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'order_product_id','amount','price_pro','don_gia'], 'required'],
            [['product_id', 'order_product_id','amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Sản phẩm ',
            'order_product_id' => 'Đơn hàng',
            'amount' => 'Số lượng',
            'price_pro'=>'Tổng tiền sản phẩm',
            'don_gia'=>'Giá chi tiết 1 sản phẩm'
        ];
    }
    public function getProducts(){
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
    public function getOrderProducts(){
        return $this->hasOne(OrderProducts::className(), ['id' => 'order_product_id']);
    }
}
