<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Designer;
use yii\db\Query;

/**
 * DesignerSearch represents the model behind the search form about `app\models\Designer`.
 */
class DesignerSearch extends Designer
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['designer_id', 'title', 'desc', 'facebook', 'instagram', 'behance', 'website', 'email', 'photo'], 'string'],
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
		$query = Designer::find();

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
			'designer_id' => $this->designer_id,
		]);

		$query->andFilterWhere(['like', 'desc', $this->desc])
			->andFilterWhere(['like', 'facebook', $this->facebook])
			->andFilterWhere(['like', 'instagram', $this->instagram])
			->andFilterWhere(['like', 'behance', $this->behance])
			->andFilterWhere(['like', 'website', $this->website])
			->andFilterWhere(['like', 'email', $this->email])
			->andFilterWhere(['like', 'photo', $this->photo]);

		return $dataProvider;
	}

	public function designer_search($limit, $offset=0)
	{
		$query = Designer::find();

		// add conditions that should always apply here

		$designer = $query->andFilterWhere(['!=', 'designer_id', '0_no_designer'])
			->andWhere(['!=', 'thumb1', ""])
			->limit($limit)
			->offset($offset)
			->all();

		return $designer;
	}

	public function count()
	{
		$query = new Query;

		// add conditions that should always apply here

		$count = $query->select("COUNT(*)")
			->from("designer")
			->one();

		return $count['COUNT(*)'] - 1;
	}


}

