<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_method".
 *
 * @property integer $contact_method_id
 * @property string $contact_method
 * @property string $contact_method_description
 */
class ContactMethod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_method';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_method', 'contact_method_description'], 'required'],
            [['contact_method', 'contact_method_description'], 'string', 'max' => 225],
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
            'contact_method_id' => 'Contact Method ID',
            'contact_method' => 'Contact Method',
            'contact_method_description' => 'Contact Method Description',
        ];
    }
}
