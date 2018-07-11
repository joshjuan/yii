<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "agent".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $zone_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Zones $zone
 */
class Agent extends \common\models\Agent
{

    public $password;
    public $repassword;
    private $_statusLabel;



    public function getStatusLabel()
    {
        if ($this->_statusLabel === null) {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }


    public static function getArrayStatus()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_INACTIVE => Yii::t('app', 'STATUS_INACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email','password','repassword', 'phone', 'zone_id', 'username'], 'required','on'=>'create'],
            [['password', 'repassword'], 'string', 'min' => 6, 'max' => 30],
            [['username', 'email'], 'unique'],
            ['username', 'string', 'min' => 3, 'max' => 30],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            [['zone_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'phone'], 'string', 'max' => 200],
            [['username'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zones::className(), 'targetAttribute' => ['zone_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'zone_id' => 'Zone Name',
            'username' => 'Username',
           // 'auth_key' => 'Auth Key',
          //  'password_hash' => 'Password Hash',
          //  'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zones::className(), ['id' => 'zone_id']);
    }


    /**
     * @inheritdoc
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || (!$this->isNewRecord && $this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }
            return true;
        }
        return false;
    }


    //gets all user

    public static function getZones()
    {
        return ArrayHelper::map(Zones::find()->all(),'id','name');
    }

    public static function getRules()
    {
        return ArrayHelper::map(AuthItem::find()->all(),'name','name');
    }


}
