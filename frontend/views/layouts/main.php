<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use frontend\models\Script;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="page">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#eaeaea">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    
    <?php

    Yii::$app->view->registerMetaTag([
        'name' => 'keywords',
        'content' => Yii::$app->configManager->getItemValue('seoDefaultKeywords'),
    ], $tag);
    Yii::$app->view->registerMetaTag([
        'name' => 'description',
        'content' => Yii::$app->configManager->getItemValue('seoDefaultDescription'),
    ], $tag);

    ?>
    
    <!-- Скрипты перед </head> -->
    <?php Script::getScripts(Script::BEFORE_END_HEAD); ?>
</head>
<body class="page__body">
<?php $this->beginBody() ?>
<!-- Скрипты после <body> -->
<?php Script::getScripts(Script::AFTER_BEGIN_BODY); ?>

<div class="site-container">
    <header class="header">
        <?= $this->render('_header'); ?>
    </header>

<main class="main">
    <?= $content ?>
</main>

<footer class="footer pt-xxl">
    <?= $this->render('_footer'); ?>
</footer>

</div>

<!-- Скрипты перед </body> -->
<?php Script::getScripts(Script::BEFORE_END_BODY); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
