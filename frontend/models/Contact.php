<?php

namespace frontend\models;

use backend\models\Contact as backendContact;
use Yii;
use yii\behaviors\TimestampBehavior;

class Contact extends backendContact
{   
    public $agreement;

    public function behaviors()
    {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => null,
                'value' => function () {
                    return date('U');
                },
            ],
        ];
    } 

    // public function rules()
    // {
    //     return [
    //         [['phone', 'name'], 'required'],
    //         [['name', 'comment'], 'safe'],
    //     ];
    // }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Client Name'),
            'phone' => Yii::t('app', 'Client Phone'),
            'comment' => Yii::t('app', 'Client Comment'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->sendCallbackTelegram();
    }

    protected function setMessageBodyText(): string
    {
        $msg = 'Сообщение формы обратной связи'. PHP_EOL;
        $msg .= "Имя: " . $this->name . PHP_EOL;
        $msg .= "Тел.: " . $this->phone . PHP_EOL;
        $msg .= "Комментарий: " . $this->comment . PHP_EOL;
        return $msg;
    }

    protected function sendCallbackTelegram()
    {
        $chat_id = Yii::$app->configManager->getItemValue('reportTelegramChatID');
        if (isset($chat_id) && !empty($chat_id)) {

            Yii::$app->telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $this->setMessageBodyText(),
            ]);
        } else {
            return Yii::t('app', "Telegram Chat ID is not set");
        }
        return true;
    }

}