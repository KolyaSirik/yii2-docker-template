<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii2mod\alert\Alert;
\yii2mod\alert\AlertAsset::register($this);
\app\assets\MaterialAsset::register($this);
\app\assets\AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="perfect-scrollbar-off">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-md">
    <?php $this->beginBody(); ?>

    <div class="wrapper">
        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="sidebar" data-color="purple" data-background-color="black" data-image="/img/sidebar.jpg">
                <div class="logo">
                    <a href="/admin" class="simple-text logo-normal">
                        Awesome project
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <div class="user">
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
                            <span>
                                <?= \Yii::$app->user->identity->username ?>
                                <b class="caret"></b>
                            </span>
                            </a>
                            <div class="clearfix"></div>
                            <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
                                <ul class="nav">
                                    <li>
                                        <?= Html::a('Logout', ['admin/site/logout'], [
                                            'data' => ['method' => 'post'],
                                        ]); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?= $this->render('leftColumn') ?>
                </div>
                <div class="sidebar-background" style="background-image: url(/img/sidebar.jpg) "></div>
            </div>
        <?php endif; ?>
        <div class="main-panel">
            <?php if (!Yii::$app->user->isGuest): ?>
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"> <?= $this->title ?> </a>
                        </div>
                        <div class="collapse navbar-collapse">

                        </div>
                    </div>
                </nav>
            <?php endif; ?>

            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>