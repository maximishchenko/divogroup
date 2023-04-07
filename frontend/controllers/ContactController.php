<?php

namespace frontend\controllers;

use frontend\controllers\BaseController;
use frontend\models\Contact;
use Yii;

class ContactController extends BaseController
{
    public function actionIndex()
    {
        $model = new Contact();

        if (Yii::$app->request->isAjax) {
            if ($model->load($this->request->post()) && $model->save()) {
                return "Мы с вами свяжемся";
            } else {
                return "Что-то пошло не так";
            }
        }

    }
}