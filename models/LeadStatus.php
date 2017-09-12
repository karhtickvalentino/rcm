<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lead_status".
 *
 * @property integer $lead_status_id
 * @property string $lead_status
 * @property string $lead_status_description
 */
class LeadStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lead_status', 'lead_status_description'], 'required'],
            [['lead_status', 'lead_status_description'], 'string', 'max' => 225],
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
            'lead_status_id' => 'Lead Status ID',
            'lead_status' => 'Lead Status',
            'lead_status_description' => 'Lead Status Description',
        ];
    }
}
