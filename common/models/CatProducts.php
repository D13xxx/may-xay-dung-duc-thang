<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_products".
 *
 * @property int $id
 * @property string $slug
 * @property string $avatar
 * @property string $name
 * @property int $parent_id
 * @property int $title_seo
 * @property int $description_seo
 * @property int $keyword_seo
 * @property int $sort
 */
class CatProducts extends \yii\db\ActiveRecord
{
    const IS_ACTIVE         = 1;
    const IS_NEW           = 0;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::IS_ACTIVE => Yii::t('backend', 'Hoạt động'),
            self::IS_NEW => Yii::t('backend', 'Mới'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::IS_NEW => 'label label-default',
            self::IS_ACTIVE => 'label label-success',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'name','status'], 'required'],
            [['parent_id','level','status','sort'], 'integer'],
            [['slug','name','title_seo','description_seo','keyword_seo'], 'string', 'max' => 255],
            [['avatar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'avatar' => Yii::t('common', 'Ảnh đại diện'),
            'name' => Yii::t('common', 'Tên đầy đủ'),
            'parent_id' => Yii::t('common', 'Nhóm cha'),
            'level' => Yii::t('common', 'Cấp bậc'),
            'status' => Yii::t('common', 'Trạng thái'),
            'title_seo' => Yii::t('common', 'Title_seo'),
            'description_seo' => Yii::t('common', 'Description_seo'),
            'keyword_seo' => Yii::t('common', 'Keyword_seo'),
            'sort' => Yii::t('common', 'Sắp xếp'),
        ];
    }
    public $data;
    public function getCat($parentId = null,$level="")
    {
        $result = CatProducts::find()->asArray()->where(['parent_id'=>$parentId])->all();

        $level .= " |-- ";
        foreach ($result as $key => $value){
            if($parentId == null){
                $level = '';
            }
            $this->data[$value["id"]]  = $level.$value["name"];
            self::getCat($parentId = $value["id"],$level);
        }
        return $this->data;
    }
}
