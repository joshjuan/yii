<?php

namespace backend\controllers;


use backend\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;


class Api1Controller extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = User::findByUsername($username);
                if ($user && $user->validatePassword( $password)) {
                    return $user;
                }
            }
        ];
        return $behaviors;
    }
}

     /**
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function Auth($username, $password)
    {
        // username, password are mandatory fields
        if (empty($username) || empty($password))
            return null;

        // get user using requested email
        $user = User::findOne([
            'email' => $username,
        ]);

        // if no record matching the requested user
        if (empty($user))
            return null;

        // hashed password from user record
        $this->password = $user->password;

        // validate password
        $isPass = (new \backend\models\User)->validatePassword($password);

        // if password validation fails
        if (!$isPass)
            return null;

        // if user validates (both user_email, user_password are valid)
        return $user;
    }


}***/