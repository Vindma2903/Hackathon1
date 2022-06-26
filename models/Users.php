<?php
namespace app\models;

use Yii;
use yii\base\Model; 
use yii\db\ActiveRecord;
 
class Users extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {

        //$users = Users::findOne(['username' => $this->username]);
                
        //return \Yii::$app->security->validatePassword($password);
        if($password == $this->password_hash){
            return true;
        }
        return false;
    }

    public function getPasswordHash($password)
    {
        return $password;
    }

    public function setPassword($password)
    {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        
        return $hash;
    }
}