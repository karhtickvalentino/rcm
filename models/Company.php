<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property integer $client_id
 * @property string $company_name
 * @property string $company_address
 * @property string $company_city
 * @property string $company_country
 * @property string $pin
 * @property integer $company_telephone1
 * @property integer $company_telephone2
 * @property string $website_url
 * @property integer $number_of_employees
 * @property integer $number_of_metrimap_users
 * @property integer $referal_source
 * @property integer $business_partner
 * @property string $scope
 * @property double $deal_value
 * @property integer $sales_stage
 * @property integer $lead
 * @property string $notes
 * @property string $created_by
 * @property string $created_on
 * @property string $updated_on
 *
 * @property ContactLog[] $contactLogs
 * @property Dashboard[] $dashboards
 * @property Person[] $people
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'company_name', 'company_address', 'company_city', 'company_country', 'pin', 'company_telephone1', 'website_url', 'number_of_employees', 'number_of_metrimap_users', 'referal_source', 'scope', 'deal_value', 'sales_stage', 'lead', 'notes', 'created_by','business_partner'], 'required'],
            [['client_id', 'company_telephone1', 'company_telephone2', 'number_of_employees', 'number_of_metrimap_users', 'referal_source', 'business_partner', 'sales_stage', 'lead'], 'integer'],
            [['deal_value'], 'number'],
            
            [['company_name', 'company_city', 'company_country', 'website_url'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 225],
            [['pin'], 'string', 'max' => 25],
            [['scope', 'created_by'], 'string', 'max' => 255],
            [['notes'], 'string', 'max' => 1000],
           ['created_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')],
           ['updated_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')],

           ['number_of_metrimap_users','greater']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'client_id' => 'Client ID',
            'company_name' => 'Client Name',
            'company_address' => 'Company Address',
            'company_city' => 'Company City',
            'company_country' => 'Company Country',
            'pin' => 'Pin',
            'company_telephone1' => 'Company Telephone-1',
            'company_telephone2' => 'Company Telephone-2',
            'website_url' => 'Website Url',
            'number_of_employees' => 'Number Of Employees',
            'number_of_metrimap_users' => 'Number Of Metrimap Users',
            'referal_source' => 'Referal Source',
            'business_partner' => 'Business Partner',
            'scope' => 'Scope',
            'deal_value' => 'Deal Value',
            'sales_stage' => 'Sales Stage',
            'lead' => 'Lead',
            'notes' => 'Notes',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactLogs()
    {
        return $this->hasMany(ContactLog::className(), ['company_name' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDashboards()
    {
        return $this->hasMany(Dashboard::className(), ['company' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['company_id' => 'company_id']);
    }
    public function greater($attribute,$params)
    {
       
        if(($this->attribute)>($this->number_of_metrimap_users)){
            $this->addError('number_of_metrimap_users','no of metrimap users must be less than no of employees');
        }
    }
}
