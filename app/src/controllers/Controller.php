<?php

namespace app\controllers;

use app\models\User;

/**
 * Class Controller
 *
 * @package app\controllers
 */
class Controller extends \yii\web\Controller
{
    /**
     * @param $action
     * @return bool|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $user = \Yii::$app->user;

        if (!$user->isGuest && $user->identity->role !== User::ROLE_CUSTOMER) {
            $user->logout();

            return $this->redirect($user->loginUrl);
        }

        return parent::beforeAction($action);
    }
}
