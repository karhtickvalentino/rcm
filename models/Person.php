<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $customer_id
 * @property integer $company_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $email1
 * @property string $email2
 * @property integer $telephone1
 * @property integer $telephone
 * @property string $country
 * @property string $city
 * @property string $remarks
 * @property string $created_on
 * @property string $updated_on
 *
 * @property ContactLog[] $contactLogs
 * @property ContactLog[] $contactLogs0
 * @property Company $company
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'first_name', 'last_name', 'address', 'email1', 'telephone1', 'country', 'city', 'remarks','updated_by'], 'required'],
            [['company_id', 'telephone1', 'telephone'], 'integer'],
            [['created_on', 'updated_on','company_id','customer_id'], 'safe'],
            [['first_name', 'address'], 'string', 'max' => 225],
            [['last_name', 'email1', 'email2', 'country', 'city', 'remarks'], 'string', 'max' => 50],
            [['email1','email2'],'email'],
            // [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
             ['created_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')],
            ['updated_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'company_id' => 'Company',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'email1' => 'Email-1',
            'email2' => 'Email-2',
            'telephone1' => 'Telephone-1',
            'telephone' => 'Telephone-2',
            'country' => 'Country',
            'city' => 'City',
            'remarks' => 'Remarks',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactLogs()
    {
        return $this->hasMany(ContactLog::className(), ['contacted_person' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactLogs0()
    {
        return $this->hasMany(ContactLog::className(), ['assigned_to' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
