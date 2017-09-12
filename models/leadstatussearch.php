<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LeadStatus;

/**
 * leadstatussearch represents the model behind the search form about `app\models\leadstatus`.
 */
class leadstatussearch extends LeadStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lead_status_id'], 'integer'],
            [['lead_status', 'lead_status_description'], 'safe'],
            ['created_on','default','value'=>date_format(date_create(),'Y:m:d H:i:s')]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LeadStatus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'lead_status_id' => $this->lead_status_id,
        ]);

        $query->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'lead_status_description', $this->lead_status_description]);

        return $dataProvider;
    }
}
