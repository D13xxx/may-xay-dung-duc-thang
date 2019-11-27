<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_employ".
 *
 * @property string $huong_dan_thanh_toan
 * @property string $chinh_sach_giao_hang
 * @property string $chinh_sach_hoi_tra
 * @property string $chinh_sach_bao_mat_thong_tin
 * @property int $id
 * @property string $chinh_sach_bao_hanh
 */
class SpEmploy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_employ';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['huong_dan_thanh_toan', 'chinh_sach_giao_hang', 'chinh_sach_hoi_tra', 'chinh_sach_bao_mat_thong_tin', 'chinh_sach_bao_hanh'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'huong_dan_thanh_toan' => Yii::t('common', 'Hướng dẫn thanh toán'),
            'chinh_sach_giao_hang' => Yii::t('common', 'Chính sách giao hàng'),
            'chinh_sach_hoi_tra' => Yii::t('common', 'Chính sách đổi trả'),
            'chinh_sach_bao_mat_thong_tin' => Yii::t('common', 'Chính sách bảo mật thông tin'),
            'id' => Yii::t('common', 'ID'),
            'chinh_sach_bao_hanh' => Yii::t('common', 'Chính sách bảo hành'),
        ];
    }
}
