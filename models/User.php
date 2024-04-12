<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string|null $FULLNAME
 * @property string $USERNAME
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $EMAIL
 * @property string $PHONE
 * @property int $ID_ROL
 * @property string|null $BITHDATE
 * @property string|null $IDENTIFICATION
 * @property bool $IS_OTP
 * @property bool $ACTIVE
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $temp;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USERNAME', 'PASSWORD', 'EMAIL', 'PHONE', 'ID_ROL'], 'required'],
            [['ID_ROL'], 'integer'],
            [['CREATED_AT', 'LAST_ACCESS'], 'safe'],
            [['IS_OTP', 'ACTIVE'], 'boolean'],
            [['FULLNAME', 'USERNAME', 'PASSWORD', 'password_reset_token', 'EMAIL', 'verification_token','ACCESS_TOKEN'], 'string', 'max' => 255],
            [['AUTHKEY'], 'string', 'max' => 32],
            [['PHONE'], 'string', 'max' => 20],
            [['BITHDATE'], 'string', 'max' => 10],
            [['IDENTIFICATION'], 'string', 'max' => 50],
            [['USERNAME'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FULLNAME' => 'Fullname',
            'USERNAME' => 'Username',
            'AUTHKEY' => 'Auth Key',
            'PASSWORD' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'EMAIL' => 'Email',
            'PHONE' => 'Phone',
            'ID_ROL' => 'Role',
            'BITHDATE' => 'Bithdate',
            'IDENTIFICATION' => 'Identification',
            'IS_OTP' => 'Is Otp',
            'ACTIVE' => 'Active',
            'CREATED_AT' => 'Created At',
            'LAST_ACCESS' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    
    public function getRol()
    {
        return $this->hasOne(Rol::class, ['ID' => 'ID_ROL']);
    }

        /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['USERNAME' => $username]);
    }

    public function validatePassword($password)
    {
        //return $this->password_hash == $password;
        return Yii::$app->security->validatePassword($password, $this->PASSWORD);
        //return Yii::$app->security->validatePassword($password, $this->password_hash);
        //return $this->password_hash === Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['ACCESS_TOKEN' => $token]);
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        return $this->AUTHKEY;
    }

    public function validateAuthKey($authKey)
    {
        return $this->AUTHKEY === $authKey;
    }

}
