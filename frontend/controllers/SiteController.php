<?php

namespace frontend\controllers;

use backend\models\Article;
use backend\models\Uploads;
use common\models\Status;
use frontend\models\search\ApartmentsSearch;
use frontend\models\search\JobItemSearch;
use frontend\models\search\ReviewSearch;
use Yii;
use frontend\controllers\BaseController;

/**
 * Site controller
 */
class SiteController extends BaseController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $jobItemsSearch = new JobItemSearch();
        $jobItems = $jobItemsSearch->search(Yii::$app->request->queryParams);
        $reviewsSearch = new ReviewSearch();
        $reviews = $reviewsSearch->search(Yii::$app->request->queryParams);
        $apartmentsSearch = new ApartmentsSearch();
        $apartments = $apartmentsSearch->search(Yii::$app->request->queryParams);
        $articles = Article::find()->where(['status' => Status::STATUS_ACTIVE])->orderBy(['sort' => SORT_DESC])->all();
        $documents = Uploads::find()->where(['status' => Status::STATUS_ACTIVE])->orderBy(['sort' => SORT_DESC])->all();

        return $this->render('index', [
            'jobItems' => $jobItems,
            'reviews' => $reviews,
            'apartments' => $apartments,
            'articles' => $articles,
            'documents' => $documents,
        ]);
    }
}
