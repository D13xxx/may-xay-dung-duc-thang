<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $status
 * @property int $avatar
 */
class Brand extends \yii\db\ActiveRecord
{
    const TT_MOI                = 0;
    const TT_HOATDONG           = 1;
    /**
     * {@inheritdoc}
     */
    public static function TT_ARRAY()
    {
        return [
            self::TT_MOI => Yii::t('backend', 'Khởi tạo'),
            self::TT_HOATDONG => Yii::t('backend', 'Đang hoạt động'),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'status'], 'required'],
            [['status'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'code' => Yii::t('common', 'Mã'),
            'name' => Yii::t('common', 'Tên đầy đủ'),
            'status' => Yii::t('common', 'Trạng thái'),
        ];
    }
}
