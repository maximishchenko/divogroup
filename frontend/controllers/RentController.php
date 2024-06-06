<?php

namespace frontend\controllers;

class RentController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}