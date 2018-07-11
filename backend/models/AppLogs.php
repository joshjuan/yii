<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "application_login_logs".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $last_login
 */
class AppLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_login_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'username', 'last_login'], 'required'],
            [['user_id'], 'integer'],
            [['last_login'], 'safe'],
            [['username'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'last_login' => 'Last Login',
        ];
    }
}
