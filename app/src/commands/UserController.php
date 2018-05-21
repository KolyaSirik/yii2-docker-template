<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;

/**
 * Class UserController
 *
 * @package console\controllers
 */
class UserController extends Controller
{
    /**
     * Reset admin password
     *
     * @param string $password
     */
    public function actionResetPassword($password)
    {
        $user = User::findOne(['username' => 'admin']);

        if ($password) {
            $user->password = $password;
            $user->save();

            echo "Password was updated!\n";
        } else {
            echo "Different passwords. Please, try again!\n";
        }
    }
}
