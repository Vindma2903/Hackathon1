<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class SignupForm extends Model{
    
    public $username;
    public $password;
    public $phone;
    public $email;
    public $fullname;

    private $_user = false;
    
    public function rules() {
        return [
            [['username', 'password', 'phone', 'email', 'fullname'], 'required', 'message' => 'Заполните поле'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'email' => 'E-Mail',
            'fullname' => 'ФИО',
        ];
    }
    public function signup()
    {
        
        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->name = $this->username;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->fullname = $this->fullname;
            $user->password_hash = $this->password;
            $user->generateAuthKey();
            $user->save(false);
            //$auth = Yii::$app->authManager;
            //$userRole = $auth->getRole('user');
            //$auth->assign($userRole, $user->getId());

            print_r($user);
        }

        return null;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }
    
}