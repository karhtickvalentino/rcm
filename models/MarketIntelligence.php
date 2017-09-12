<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_intelligence".
 *
 * @property integer $company_id
 * @property string $compitetor
 * @property string $market_intelligence
 *
 * @property Company $company
 */
class MarketIntelligence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_intelligence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['compitetor', 'market_intelligence','updated_by'], 'required'],
            [['company_id'], 'safe'],
            [['compitetor', 'market_intelligence'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
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
            'company_id' => 'Company ID',
            'compitetor' => 'Compitetor',
            'market_intelligence' => 'Market Intelligence',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
