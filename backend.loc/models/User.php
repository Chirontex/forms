<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        
        return '{{%users}}';

    }

    public static function findIdentity($id)
    {
        
        return self::findOne($id);

    }

    public static function findByEmail(string $email)
    {

        return self::find()->where(['email' => $email])->one();

    }

    public function getId() {
        
        return $this->id;
        
    }

    public function getEmail() {

        return $this->email;

    }

    public static function findIdentityByAccessToken($token, $type = null) {}
    public function getAuthKey() {}
    public function validateAuthKey($authKey) {}

}
