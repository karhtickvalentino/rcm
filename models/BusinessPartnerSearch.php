<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusinessPartner;

/**
 * BusinessPartnerSearch represents the model behind the search form about `app\models\BusinessPartner`.
 */
class BusinessPartnerSearch extends BusinessPartner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_partner_id', 'telephone1', 'telephone2'], 'integer'],
            [['fname', 'lname', 'address', 'city', 'country', 'pin', 'website_url', 'email'], 'safe'],
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
        $query = BusinessPartner::find();

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
            'business_partner_id' => $this->business_partner_id,
            'telephone1' => $this->telephone1,
            'telephone2' => $this->telephone2,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'pin', $this->pin])
            ->andFilterWhere(['like', 'website_url', $this->website_url])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
