<?php

namespace app\commands;

use app\models\admin\User;
use yii\console\Controller;

/**
 * Class ConfigController
 *
 * @package console\controllers
 */
class ConfigController extends Controller
{
    public function actionInit()
    {
//        $this->initAdmin();
    }

    protected function initAdmin()
    {
        if (!User::findByUsername('admin')) {
            $user = new User([
                'email'    => 'admin@example.com',
                'username' => 'admin',
                'role'     => User::ROLE_ADMIN,
                'password' => 'admin'
            ]);

            $user->save();
        }
    }
}
