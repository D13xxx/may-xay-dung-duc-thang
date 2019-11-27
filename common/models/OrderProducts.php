<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_products".
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 * @property int $cell_phone
 * @property string $email
 * @property string $descripsion
 * @property double $created_at
 * * @property double $user_update
 *  @property double $total
 * * @property double $type_payment
 * * * @property double $status
 * 
 */

 class OrderProducts extends \yii\db\ActiveRecord
{
    const TT_DATHANG                = 0;
    const TT_DAGIAOHANG             = 1;
    const TT_HUY                    = 2;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::TT_DATHANG => Yii::t('backend', 'ĐẶt HÀNG'),
            self::TT_DAGIAOHANG => Yii::t('backend', 'ĐÃ GIAO HÀNG'),
            self::TT_HUY => Yii::t('backend', 'ĐÃ BỊ HỦY'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::TT_DATHANG => 'label label-default',
            self::TT_HUY => 'label label-primary',
            self::TT_DAGIAOHANG => 'label label-success',
        ];
    }

    const T_TIENMAT                = 1;
    const T_CHUYENKHOAN             = 0;

    /**
     * @return array trang thai list
     */


    public static function T_ARRAY()
    {
        return [
            self::T_TIENMAT => Yii::t('backend', 'Thanh toán tiền mặt'),
            self::T_CHUYENKHOAN => Yii::t('backend', 'Chuyển khoản(Nộp tiền) qua tài khoản ngân hàng'),
        ];
    }
    public static function T_COLOR_ARRAY()
    {
        return [
            self::T_TIENMAT => 'label label-default',
            self::T_CHUYENKHOAN => 'label label-success',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'address', 'cell_phone','type_payment'], 'required'],
            [['cell_phone','created_at','type_payment','status','user_update'], 'integer'],
            [['total'], 'safe'],
            [['full_name', 'address', 'email', 'descripsion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Họ và tên',
            'address' => 'Địa chỉ',
            'cell_phone' => 'Số điện thoại',
            'email' => 'Email',
            'descripsion' => 'Mô tả ',
            'created_at' => 'Ngày đặt hàng',
            'total' => 'Tổng hóa đơn',
            'type_payment'=>'Phương thức thanh toán',
            'status'=>'Trang thái',
            'user_update'=>'Người cập xác thực'
        ];
    }
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_update']);
    }
}
