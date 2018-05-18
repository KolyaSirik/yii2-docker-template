<?php

namespace app\forms\admin;

use app\models\admin\User;

/**
 * Class LoginForm
 *
 * @package backend\models\forms
 */
class LoginForm extends \app\forms\LoginForm
{
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
