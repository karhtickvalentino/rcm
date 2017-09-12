<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referal_source".
 *
 * @property integer $referal_source_id
 * @property string $referal_source
 * @property string $referal_source_description
 */
class ReferalSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referal_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referal_source', 'referal_source_description'], 'required'],
            [['referal_source', 'referal_source_description'], 'string', 'max' => 225],
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
            'referal_source_id' => 'Referal Source ID',
            'referal_source' => 'Referal Source',
            'referal_source_description' => 'Referal Source Description',
        ];
    }
}
