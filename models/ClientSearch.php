<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['client_id', 'client_group_id', 'title', 'desc', 'contact', 'logo'], 'safe'],
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
		$query = Client::find();

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
			'client_id' => $this->client_id,
		]);

		$query->andFilterWhere(['like', 'title', $this->title])
			->andFilterWhere(['like', 'desc', $this->desc])
			->andFilterWhere(['like', 'contact', $this->contact])
			->andFilterWhere(['=', 'client_group_id', $this->client_group_id]);
		return $dataProvider;
	}

	public function client_search($client_group_id = -1)
	{
		$query = Client::find();

		// grid filtering conditions
		if($client_group_id > 0){
			$query->andFilterWhere([
				'client_group_id' => $client_group_id,
			]);
		} else {
			$query->andFilterWhere(['NOT IN','client_group_id',[0]]);
		}

		$client_array = $query->all();

		return $client_array;
	}

}
