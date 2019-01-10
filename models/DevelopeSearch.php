<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Develope;

/**
 * DevelopeSearch represents the model behind the search form about `app\models\Develope`.
 */
class DevelopeSearch extends Develope
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['develope_id', 'tracking_status'], 'integer'],
            [['name', 'email', 'title', 'content', 'tracking_token', 'sales'], 'safe'],
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
        $query = Develope::find();

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
            'develope_id' => $this->develope_id,
            'tracking_status' => $this->tracking_status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tracking_token', $this->tracking_token])
            ->andFilterWhere(['like', 'sales', $this->sales])
            ->orderBy('date DESC');

        return $dataProvider;
    }
}
