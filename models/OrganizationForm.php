<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class OrganizationForm extends Model{
    
    public $id;
    public $full_name;
    public $abbreviated_name;
    public $date_registration;
    public $legal_address;
    public $postal_adress;
    public $phone;
    public $email;
    public $director;
    public $inn;
    public $cat;
    public $okpo;

    private $_user = false;
    
    public function rules() {
        return [
            [['full_name', 'abbreviated_name', 'date_registration', 'legal_address', 'postal_adress', 'phone', 'email', 'director', 'inn', 'cat', 'okpo'], 'required', 'message' => 'Заполните поле'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'full_name' => 'Полное наименование', 
            'abbreviated_name' => 'Сокращенное наименование', 
            'date_registration' => 'Дата регистрации', 
            'legal_address' => 'Юридический адрес', 
            'postal_adress' => 'Фактический адрес', 
            'phone' => 'Телефон', 
            'email' => 'Электронная почта', 
            'director' => 'ФИО директора', 
            'inn' => 'ИНН', 
            'cat' => 'КПП', 
            'okpo' => 'ОКПО', 
        ];
    }
    public function create()
    {
        
        if ($this->validate()) {
            $organization = new Organization();
            $organization->full_name = $this->full_name;
            $organization->abbreviated_name = $this->abbreviated_name;
            $organization->date_registration = $this->date_registration;
            $organization->legal_address = $this->legal_address;
            $organization->postal_adress = $this->postal_adress;
            $organization->phone = $this->phone;
            $organization->email = $this->email;
            $organization->director = $this->director;
            $organization->inn = $this->inn;
            $organization->cat = $this->cat;
            $organization->okpo = $this->okpo;
            $organization->uid = $this->getUid();
            $organization->save(false);
            
        }

        return null;
    }

    public function getUid()
    {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
    
}