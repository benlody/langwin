<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portfolio;

/**
 * PortfolioSearch represents the model behind the search form about `app\models\Portfolio`.
 */
class PortfolioSearch extends Portfolio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'designer_id', 'company_id'], 'integer'],
            [['name', 'spec', 'content'], 'safe'],
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
        $query = Portfolio::find();

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
            'portfolio_id' => $this->portfolio_id,
            'designer_id' => $this->designer_id,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'spec', $this->spec])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
