<?php

namespace app\controllers\admin;

use app\models\User;
use yii\filters\AccessControl;

/**
 * Class Controller
 *
 * @package app\controllers\admin
 */
class Controller extends \yii\web\Controller
{
    public $viewPath = '@app/views/admin';
    public $layout = '@app/views/admin/layouts/main';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param $action
     * @return bool|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $user = \Yii::$app->user;
        $user->loginUrl = '/admin/site/login';

        if (!$user->isGuest && $user->identity->role !== User::ROLE_ADMIN) {
            $user->logout();

            return $this->redirect($user->loginUrl);
        }

        return parent::beforeAction($action);
    }
}
