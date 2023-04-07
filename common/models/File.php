<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Базовые операции с загружаемыми файлами
 */
class File extends Model
{
        
    const FRONTEND_PATH = '../../frontend/web/';
    
    const FRONTEND_ALIAS =  '@frontend/web';

    /**
     * Возвращает полный путь к загруженному файлу или null если файл отсутствует
     *
     * @return string|null
     */
    public static function getPath(string $path, string $file)
    {
        return (isset($file)) ? File::FRONTEND_PATH . $path . $file : null;
    }

    public static function getPathAlias(string $path, string $file)
    {
        return (isset($file)) ? File::FRONTEND_ALIAS . $path . $file : null;
    }

    /**
     * Возвращает относительный путь к файлу изображения
     *
     * @return string
     */
    public static function getUrl(string $path, string $file)
    {
        return "/" . $path . $file;
    }

    /**
     * Проверяет наличие загруженного файла
     *
     * @return bool
     */
    public static function isFile($attribute)
    {
        return isset($attribute) && !empty($attribute) ? true : false;
    }

    /**
     * Удаляет файл из файловой системы
     *
     * @param string $file абсолютный или относительный путь к файлу в файловой системе
     * @return void
     */
    public static function removeSingleFileIfExist(string $file)
    {
        file_exists($file) ? unlink($file) : false;
    }

    /**
     * Генерирует путь к загружаемому файлу относительно каталога @frontend
     *
     * @param UploadedFile $file загружаемый файл
     * @param string $path путь для сохранения
     * @return string относительный путь к загружаемому файлу в директории @frontend
     */
    public static function setPath(UploadedFile $file, string $path): string
    {
        $img = uniqid() . '.' . $file->extension;
        $filePath = self::FRONTEND_PATH . $path . $img;
        return $filePath;
    }

    public static function getWatermark()
    {
        return static::FRONTEND_ALIAS . "/images/watermark.png";
    }
}