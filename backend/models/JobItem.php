<?php

namespace backend\models;

use common\models\Sort;
use common\models\Status;
use Yii;

/**
 * This is the model class for table "{{%job_item}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class JobItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%job_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['name', 'description'], 'required'],
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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
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
     * @return \backend\models\query\JobItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\JobItemQuery(get_called_class());
    }
}
