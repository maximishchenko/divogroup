<?php

namespace backend\models;

use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use Yii;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $review
 * @property string|null $image
 * @property int|null $review_date
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Review extends \yii\db\ActiveRecord
{
    use fileTrait;

    const UPLOAD_PATH = 'uploads/reviews/';

    public $imageFile;

    public $review_date_item;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['name', 'review'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['review_date_item', 'review_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'review' => Yii::t('app', 'Review'),
            'image' => Yii::t('app', 'Image'),            
            'imageFile' => Yii::t('app', 'Image'),
            'review_date' => Yii::t('app', 'Review Date'),
            'review_date_item' => Yii::t('app', 'Review Date'),
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
     * @return \backend\models\query\ReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ReviewQuery(get_called_class());
    }

    public function afterFind() {
        $this->review_date_item = date('d.m.Y', $this->review_date);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (Yii::$app->request->isPost) {
                
                if ($this->validate()) {
                    
                    /**
                     * Загрузка паспортного изображения
                     */
                    $this->review_date = strtotime($this->review_date_item);
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
