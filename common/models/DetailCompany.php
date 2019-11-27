<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_company".
 *
 * @property string $gioi_thieu_cong_ty
 * @property string $tuyen_dung
 * @property int $id
 * @property string $iframe
 * @property string $showroom
 */
class DetailCompany extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gioi_thieu_cong_ty', 'tuyen_dung', 'iframe', 'showroom'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gioi_thieu_cong_ty' => Yii::t('common', 'Giới thiệu công ty'),
            'tuyen_dung' => Yii::t('common', 'Tuyển dụng'),
            'id' => Yii::t('common', 'ID'),
            'iframe' => Yii::t('common', 'Google map'),
            'showroom' => Yii::t('common', 'Hệ thống Showroom'),
        ];
    }
}
