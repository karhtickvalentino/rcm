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
 * @property integer $customer_id
 * @property string $created_by
 * @property string $created_on
 * @property string $updated_on
 *
 * @property Person $customer
 * @property ContactLog[] $contactLogs
 * @property Dashboard[] $dashboards
 */
class Dashboard extends \yii\db\ActiveRecord
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
            [['client_id', 'company_name', 'company_address', 'company_city', 'company_country', 'pin', 'company_telephone1', 'website_url', 'number_of_employees', 'number_of_metrimap_users', 'referal_source', 'business_partner', 'scope', 'deal_value', 'sales_stage', 'lead', 'notes', 'customer_id', 'created_by'], 'required'],
            [['client_id', 'company_telephone1', 'company_telephone2', 'number_of_employees', 'number_of_metrimap_users', 'referal_source', 'business_partner', 'sales_stage', 'lead', 'customer_id'], 'integer'],
            [['deal_value'], 'number'],
            [['created_on', 'updated_on'], 'safe'],
            [['company_name', 'company_city', 'company_country', 'website_url'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 225],
            [['pin'], 'string', 'max' => 25],
            [['scope', 'created_by'], 'string', 'max' => 255],
            [['notes'], 'string', 'max' => 1000],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
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
            'company_name' => 'Client',
            'company_address' => 'Company Address',
            'company_city' => 'Company City',
            'company_country' => 'Company Country',
            'pin' => 'Pin',
            'company_telephone1' => 'Company Telephone1',
            'company_telephone2' => 'Company Telephone2',
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
            'customer_id' => 'Customer ID',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Person::className(), ['customer_id' => 'customer_id']);
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
}
