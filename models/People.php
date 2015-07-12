<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $comments
 * @property integer $person_id
 *
 * @property Customers[] $customers
 * @property Employees[] $employees
 * @property Giftcards[] $giftcards
 * @property Suppliers[] $suppliers
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'email','message' => 'Ingrese un email valido'],
            [['email'], 'unique','message' => 'El email ya existe, intente con otro'],
            [['first_name'] , 'required' , 'message' => 'Nombres no puede ser vacio'],
            [['comments'], 'string'],
            [['phone_number'], 'integer','message' => 'Celular debe ser solo numeros'],
            
            [['first_name', 'last_name', 'phone_number', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'country'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',
            'phone_number' => 'Celular',
            'email' => 'Email',
            'address_1' => 'Direccion',
            'address_2' => 'Address 2',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'country' => 'Country',
            'comments' => 'Comments',
            'person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customers::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiftcards()
    {
        return $this->hasMany(Giftcards::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Suppliers::className(), ['person_id' => 'person_id']);
    }
}
