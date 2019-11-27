<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $full_name
 * @property double $price
 * @property string $description
 * @property string $slug
 * @property string $content
 * @property string $avatar
 * @property string $img_share
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $code
 * @property int $guarantce
 * @property double $exp_price
 * @property int $sale_number
 * @property int $is_new
 * @property int $is_hot_new
 * @property int $cat_id
 * @property int $type
 * @property int $brand
 * @property int $is_empty
 * @property int $views
 * @property int $title_seo
 * @property int $description_seo
 * @property int $keyword_seo
 * * @property int $thong_so_ky_thuat
 * @property int $tags
 */
class Products extends \yii\db\ActiveRecord
{
    const T_SANPHAMKHUYENMAI            = 0;
    const T_SANPHAMBANCHAY              = 1;
    const T_SANPHAMMOI                  = 2;

    const IS_ACTIVE         = 1;
    const IS_DISABLE           = 0;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::IS_ACTIVE => Yii::t('backend', 'Đang Bán'),
            self::IS_DISABLE => Yii::t('backend', 'Tạm ẩn'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::IS_DISABLE => 'label label-default',
            self::IS_ACTIVE => 'label label-success',
        ];
    }

    /**
     * @return array trang thai list
     */


    public static function T_ARRAY()
    {
        return [
            self::T_SANPHAMKHUYENMAI => Yii::t('backend', 'SẢN PHẨM KHUYẾN MẠI'),
            self::T_SANPHAMBANCHAY => Yii::t('backend', 'SẢN PHẨM BÁN CHẠY'),
            self::T_SANPHAMMOI => Yii::t('backend', 'SẢN PHẨM MỚI'),
        ];
    }
    public static function T_COLOR_ARRAY()
    {
        return [
            self::T_SANPHAMKHUYENMAI => 'label label-default',
            self::T_SANPHAMBANCHAY => 'label label-success',
            self::T_SANPHAMMOI => 'label label-primary',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'price', 'description', 'slug', 'content', 'created_at', 'status', 'code', 'guarantce', 'exp_price', 'sale_number', 'is_new', 'is_hot_new', 'cat_id', 'type','brand'], 'required'],
            [['price', 'exp_price'], 'number'],
            [['content', 'code','tags','thong_so_ky_thuat'], 'string'],
            [['created_at', 'updated_at', 'status', 'guarantce', 'sale_number', 'is_new', 'is_hot_new', 'cat_id', 'type', 'brand','views','is_empty'], 'integer'],
            [['full_name', 'description', 'slug','title_seo','description_seo','keyword_seo'], 'string', 'max' => 255],
            [['avatar','img_share'], 'safe'],
            [['code', 'full_name'], 'unique', 'targetAttribute' => ['code', 'full_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'full_name' => Yii::t('common', 'Tên sản phẩm'),
            'price' => Yii::t('common', 'Giá bán / VND'),
            'description' => Yii::t('common', 'Mô tả'),
            'slug' => Yii::t('common', 'link'),
            'content' => Yii::t('common', 'Nội dung'),
            'avatar' => Yii::t('common', 'Ảnh đại diện sp'),
            'created_at' => Yii::t('common', 'Thời gian tạo'),
            'updated_at' => Yii::t('common', 'Thời gian cập nhật'),
            'status' => Yii::t('common', 'Trạng thái'),
            'code' => Yii::t('common', 'Mã sản phẩm'),
            'guarantce' => Yii::t('common', 'Thời gian bảo hành / Tháng'),
            'exp_price' => Yii::t('common', 'Giá dự kiến / VND'),
            'sale_number' => Yii::t('common', 'Tỷ lệ sale / %'),
            'is_new' => Yii::t('common', 'Icon sản phẩm mới'),
            'is_hot_new' => Yii::t('common', 'Sản phẩm tiêu biểu'),
            'cat_id' => Yii::t('common', 'Nhóm sản phẩm'),
            'type' => Yii::t('common', 'Kiểu sản phẩm'),
            'brand' => Yii::t('common', 'Thương hiệu'),
            'views' => Yii::t('common', 'Lượt xem'),
            'is_empty' => Yii::t('common', 'Còn hàng'),
            'title_seo' => Yii::t('common', 'Title_seo'),
            'description_seo' => Yii::t('common', 'Description_seo'),
            'keyword_seo' => Yii::t('common', 'Keyword_seo'),
            'tags' => Yii::t('common', 'Tag name'),
            'img_share' => Yii::t('common', 'Ảnh chia sẻ facebook'),
            'thong_so_ky_thuat'=>Yii::t('common', 'Thông số kỹ thuật'),
        ];
    }
    public function getCat(){
        return $this->hasOne(CatProducts::className(), ['id' => 'cat_id']);
    }

    public function getBrandName(){
        return $this->hasOne(Brand::className(), ['id' => 'brand']);
    }

    public $data;
    public function getCatProducts($parentId = null,$level="")
    {
        $result = CatProducts::find()->asArray()->where(['parent_id'=>$parentId])->all();

        $level .= " |-- ";
        foreach ($result as $key => $value){
            if($parentId == null){
                $level = '';
            }
            $this->data[$value["id"]]  = $level.$value["name"];
            self::getCatProducts($parentId = $value["id"],$level);
        }
        return $this->data;
    }
}
