<?php

namespace common\models;


use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property string $table
 * @property int $post_id
 * @property string $client_ip
 * @property int $star
 * @property string $created_at
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['table', 'post_id', 'client_ip', 'star', 'created_at'], 'required'],
            [['post_id', 'star'], 'integer'],
            [['created_at'], 'safe'],
            [['table'], 'string', 'max' => 32],
            [['client_ip'], 'string', 'max' => 125],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'post_id' => 'Post ID',
            'client_ip' => 'Client Ip',
            'star' => 'Star',
            'created_at' => 'Created At',
        ];
    }
}
