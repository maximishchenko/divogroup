<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->configManager->getItemValue('seoDefaultTitle');
?>


<?= $this->render('//layouts/_hero'); ?>
<?= $this->render('//layouts/_card', ['articles' => $articles]); ?>
<?= $this->render('//layouts/_work', ['jobItems' => $jobItems]); ?>
<?= $this->render('//layouts/_document', ['documents' => $documents]); ?>
<?= $this->render('//layouts/_room'); ?>
<?= $this->render('//layouts/_review', ['reviews' => $reviews]); ?>
<?= $this->render('//layouts/_apartment', ['apartments' => $apartments]); ?>
<?= $this->render('//layouts/_modal'); ?>