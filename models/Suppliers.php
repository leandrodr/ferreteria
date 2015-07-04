<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property integer $id
 * @property integer $person_id
 * @property string $company_name
 * @property string $account_number
 * @property integer $deleted
 *
 * @property Items[] $items
 * @property Receivings[] $receivings
 * @property People $person
 */
class Suppliers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_name'], 'required'],
            [['id', 'deleted'], 'integer'],
            [['company_name', 'account_number'], 'string', 'max' => 255],
            [['account_number'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'company_name' => 'Company Name',
            'account_number' => 'Account Number',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['supplier_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceivings()
    {
        return $this->hasMany(Receivings::className(), ['supplier_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(People::className(), ['person_id' => 'person_id']);
    }
}
