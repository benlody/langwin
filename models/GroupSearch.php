<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Group;

/**
 * GroupSearch represents the model behind the search form about `app\models\Group`.
 */
class GroupSearch extends Group
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_group_id'], 'integer'],
            [['chinese_name', 'english_name'], 'safe'],
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
        $query = Group::find();

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
            'client_group_id' => $this->client_group_id,
        ]);

        $query->andFilterWhere(['like', 'chinese_name', $this->chinese_name])
            ->andFilterWhere(['like', 'english_name', $this->english_name]);

        return $dataProvider;
    }
}
