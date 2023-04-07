<?php

namespace backend\models;

use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use Yii;

/**
 * This is the model class for table "{{%apartments}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property float|null $price
 * @property int|null $rooms_amount
 * @property int|null $square
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Apartments extends \yii\db\ActiveRecord
{
    use fileTrait;

    const UPLOAD_PATH = 'uploads/apartment/';

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['rooms_amount', 'square', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['address', 'image'], 'string', 'max' => 255],
            [['address', 'price', 'rooms_amount', 'square'], 'required'],
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
            // 'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'price' => Yii::t('app', 'Price'),
            'rooms_amount' => Yii::t('app', 'Rooms Amount'),
            'square' => Yii::t('app', 'Square'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),   
            'image' => Yii::t('app', 'Image'),
            'imageFile' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ApartmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ApartmentsQuery(get_called_class());
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
