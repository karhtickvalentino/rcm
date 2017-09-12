<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_log".
 *
 * @property integer $contact_log_id
 * @property integer $company_id
 * @property integer $contact_method
 * @property integer $contacted_person
 * @property integer $assigned_to
 * @property string $followup_date
 * @property string $comments
 * @property string $created_on
 * @property string $updated_on
 *
 * @property Company $companyName
 * @property Person $contactedPerson
 * @property Person $assignedTo
 * @property ContactMethod $contactMethod
 */
class ContactLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'contact_method', 'contacted_person', 'assigned_to', 'followup_date', 'comments'], 'required'],
            [['company_id', 'contact_method', 'contacted_person'], 'integer'],
            [[ 'updated_on','company_id'], 'safe'],
            [['followup_date'], 'string', 'max' => 255],
            [['assigned_to'], 'string', 'max' => 255],
            [['comments'], 'string', 'max' => 1000],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['contacted_person'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['contacted_person' => 'customer_id']],
            [['assigned_to'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['assigned_to' => 'customer_id']],
            [['contact_method'], 'exist', 'skipOnError' => true, 'targetClass' => ContactMethod::className(), 'targetAttribute' => ['contact_method' => 'contact_method_id']],
            ['created_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contact_log_id' => 'Contact Log ID',
            'company_id' => 'Company Name',
            'contact_method' => 'Contact Method',
            'contacted_person' => 'Contacted Person',
            'assigned_to' => 'Assigned To',
            'followup_date' => 'Followup Date',
            'comments' => 'Comments',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyName()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactedPerson()
    {
        return $this->hasOne(Person::className(), ['customer_id' => 'contacted_person']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedTo()
    {
        return $this->hasOne(Person::className(), ['customer_id' => 'assigned_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactMethod()
    {
        return $this->hasOne(ContactMethod::className(), ['contact_method_id' => 'contact_method']);
    }
}
