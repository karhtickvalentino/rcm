<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_stage".
 *
 * @property integer $sales_stage_id
 * @property string $stage_name
 * @property string $description
 * @property string $stage_activities_collateral
 */
class SalesStage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_stage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stage_name', 'description', 'stage_activities_collateral'], 'required'],
            [['stage_name', 'stage_activities_collateral'], 'string', 'max' => 225],
            [['description'], 'string', 'max' => 1025],
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
            'sales_stage_id' => 'Sales Stage ID',
            'stage_name' => 'Stage Name',
            'description' => 'Description',
            'stage_activities_collateral' => 'Stage Activities Collateral',
        ];
    }
}
