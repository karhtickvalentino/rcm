<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dashboard;

/**
 * DashboardSearch represents the model behind the search form about `app\models\Dashboard`.
 */
class DashboardSearch extends Dashboard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'client_id', 'company_telephone1', 'company_telephone2', 'number_of_employees', 'number_of_metrimap_users', 'referal_source', 'business_partner', 'sales_stage', 'lead'], 'integer'],
            [['company_name', 'company_address', 'company_city', 'company_country', 'pin', 'website_url', 'scope', 'notes', 'created_by', 'created_on', 'updated_on'], 'safe'],
            [['deal_value'], 'number'],
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
        $query = Dashboard::find();

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
            'company_id' => $this->company_id,
            'client_id' => $this->client_id,
            'company_telephone1' => $this->company_telephone1,
            'company_telephone2' => $this->company_telephone2,
            'number_of_employees' => $this->number_of_employees,
            'number_of_metrimap_users' => $this->number_of_metrimap_users,
            'referal_source' => $this->referal_source,
            'business_partner' => $this->business_partner,
            'deal_value' => $this->deal_value,
            'sales_stage' => $this->sales_stage,
            'lead' => $this->lead,
            
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_address', $this->company_address])
            ->andFilterWhere(['like', 'company_city', $this->company_city])
            ->andFilterWhere(['like', 'company_country', $this->company_country])
            ->andFilterWhere(['like', 'pin', $this->pin])
            ->andFilterWhere(['like', 'website_url', $this->website_url])
            ->andFilterWhere(['like', 'scope', $this->scope])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
