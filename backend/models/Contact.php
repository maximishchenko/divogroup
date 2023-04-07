<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $comment
 * @property int|null $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['created_at'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Client Name'),
            'phone' => Yii::t('app', 'Phone'),
            'comment' => Yii::t('app', 'Comment'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ContactQuery(get_called_class());
    }
}
