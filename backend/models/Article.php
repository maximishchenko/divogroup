<?php

namespace backend\models;

use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $fill_color
 * @property string|null $subtitle
 * @property string|null $description
 * @property string|null $image
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Article extends \yii\db\ActiveRecord
{
    use fileTrait;

    const UPLOAD_PATH = 'uploads/article/';

    public $imageFile;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subtitle', 'description'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['title', 'subtitle'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'imageFile' => Yii::t('app', 'Image'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ArticleQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (Yii::$app->request->isPost) {
                
                if ($this->validate()) {
                    
                    /**
                     * Загрузка паспортного изображения
                     */
                    $this->uploadFile('imageFile', 'image', self::UPLOAD_PATH);
                } else {
                    foreach ($this->getErrors() as $key => $value) {
                        Yii::debug($key.': '.$value[0]);
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function beforeDelete()
    {

        if (parent::beforeDelete()) {
            /**
             * Удаление файла изображения
             */
            $this->deleteSingleFile('image', self::UPLOAD_PATH);

            return true;
        } else {
            return false;
        }
    }
}
