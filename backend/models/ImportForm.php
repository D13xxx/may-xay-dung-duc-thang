<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\ForbiddenHttpException;

/**
 * Import form
 */
class ImportForm extends Model
{
    public $fileExcel;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['fileExcel'], 'required'],           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fileExcel' => Yii::t('backend', 'File Import Excel'),           
        ];
    }
}