<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContactLog;

/**
 * ContactLogsearch represents the model behind the search form about `app\models\ContactLog`.
 */
class ContactLogsearch extends ContactLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_log_id', 'company_id', 'contact_method', 'contacted_person', 'assigned_to'], 'integer'],
            [['followup_date', 'comments', 'created_on', 'updated_on'], 'safe'],
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
        $query = ContactLog::find();

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
           // 'contact_log_id' => $this->contact_log_id,
            //'company_id' => $this->company_id,
            //'contact_method' => $this->contact_method,
            //'contacted_person' => $this->contacted_person,
            //'assigned_to' => $this->assigned_to,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'followup_date', $this->followup_date])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
