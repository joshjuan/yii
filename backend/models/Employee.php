<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $job_title
 * @property string $email
 * @property string $phone_number
 * @property int $zone_id
 * @property string $created_by
 * @property string $created_at
 *
 * @property Zones $zone
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'job_title'], 'required'],
            [['zone_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'job_title', 'email', 'phone_number', 'created_by'], 'string', 'max' => 200],
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
            'job_title' => 'Job Title',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'zone_id' => 'Zone ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zones::className(), ['id' => 'zone_id']);
    }
}
