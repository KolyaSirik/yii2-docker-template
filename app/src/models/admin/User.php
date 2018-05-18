<?php

namespace app\models\admin;

/**
 * Class User
 *
 * @package backend\models
 */
class User extends \app\models\User
{
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS['ACTIVE'], 'role' => self::ROLE['ADMIN']]);
    }
}
