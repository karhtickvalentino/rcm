<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_partner".
 *
 * @property integer $business_partner_id
 * @property string $fname
 * @property string $lname
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $pin
 * @property integer $telephone1
 * @property integer $telephone2
 * @property string $website_url
 * @property string $email
 */
class BusinessPartner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'address', 'city', 'country', 'pin', 'telephone1', 'email','updated_by'], 'required'],
            [['telephone1', 'telephone2','business_partner_type'], 'integer'],
            [['business_partner_id','lname','website_url','telephone2'], 'safe'],
            [['fname', 'lname', 'address', 'city', 'country', 'website_url', 'email'], 'string', 'max' => 255],
            [['pin'], 'string', 'max' => 11],
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
            'business_partner_id' => 'Business Partner ID',
            'fname' => 'Name',
            'lname' => 'Last Name',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'pin' => 'Pin',
            'telephone1' => 'Telephone1',
            'telephone2' => 'Telephone2',
            'website_url' => 'Website Url',
            'email' => 'Email',
        ];
    }
}
