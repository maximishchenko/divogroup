<?php

namespace backend\models;

use common\models\Sort;
use common\models\Status;
use backend\traits\fileTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%uploads}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $file_ext
 * @property string|null $file_size
 * @property string|null $file_name
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Uploads extends \yii\db\ActiveRecord
{
    use fileTrait;

    const UPLOAD_PATH = 'uploads/doc/';

    public $fileItem;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%uploads}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'file_ext', 'file_size', 'file_name'], 'string', 'max' => 255],
            [['name'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
            [['fileItem'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
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
            'file_ext' => Yii::t('app', 'File Ext'),
            'file_size' => Yii::t('app', 'File Size'),
            'file_name' => Yii::t('app', 'File Name'),
            'fileItem' => Yii::t('app', 'File Item Name'),
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
     * @return \backend\models\query\UploadsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\UploadsQuery(get_called_class());
    }
    
    protected function convert_bytes($size)
    {
        $i = 0;
        while (floor($size / 1024) > 0) {
            ++$i;
            $size /= 1024;
        }
    
        $size = str_replace('.', ',', round($size, 1));
        switch ($i) {
            case 0: return $size .= ' байт';
            case 1: return $size .= ' КБ';
            case 2: return $size .= ' МБ';
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (Yii::$app->request->isPost) {
                
                if ($this->validate()) {
                        $this->fileItem = UploadedFile::getInstance($this, 'fileItem');
                        if (isset($this->fileItem) && !empty($this->fileItem)) {
                            $file = self::$frontendPath . self::UPLOAD_PATH . uniqid() . '-' . $this->fileItem->baseName . '.' . $this->fileItem->extension;
                            if(!$this->isNewRecord && $this->file_name) {
                                $filePath = self::$frontendPath . self::UPLOAD_PATH . $this->file_name;
                                if(file_exists($filePath) && is_file($filePath)) {
                                    unlink($filePath);
                                }
                            }
                            $this->fileItem->saveAs($file);
                            $this->file_name = basename($file);
                            $this->file_size = $this->convert_bytes($this->fileItem->size);
                            $this->file_ext = $this->fileItem->extension;
                        }
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
            $this->deleteSingleFile('file_name', self::UPLOAD_PATH);

            return true;
        } else {
            return false;
        }
    }
}
