<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContactMethod;

/**
 * ContactMethodsearch represents the model behind the search form about `app\models\ContactMethod`.
 */
class contactmethodsearch extends ContactMethod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_method_id'], 'integer'],
            [['contact_method', 'contact_method_description'], 'safe'],
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
        $query = ContactMethod::find();

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
            'contact_method_id' => $this->contact_method_id,
        ]);

        $query->andFilterWhere(['like', 'contact_method', $this->contact_method])
            ->andFilterWhere(['like', 'contact_method_description', $this->contact_method_description]);

        return $dataProvider;
    }
}
