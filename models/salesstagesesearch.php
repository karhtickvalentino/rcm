<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalesStage;

/**
 * salesstagesesearch represents the model behind the search form about `app\models\salesstage`.
 */
class salesstagesesearch extends SalesStage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sales_stage_id'], 'integer'],
            [['stage_name', 'description', 'stage_activities_collateral'], 'safe'],
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
        $query = SalesStage::find();

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
            'sales_stage_id' => $this->sales_stage_id,
        ]);

        $query->andFilterWhere(['like', 'stage_name', $this->stage_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'stage_activities_collateral', $this->stage_activities_collateral]);

        return $dataProvider;
    }
}
