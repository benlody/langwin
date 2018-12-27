<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portfolio;
use yii\db\Query;

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
			[['designer_id', 'company_id', 'photo_uploaded'], 'integer'],
			[['portfolio_id', 'spec', 'content','title','tag'], 'safe'],
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
			'pagination' => [
					'pageSize' => 50,
			],
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
			'company_id' => $this->company_id,
			'photo_uploaded' => $this->photo_uploaded,
		]);

		$query->andFilterWhere(['like', 'title', $this->title])
			->andFilterWhere(['like', 'portfolio_id', $this->portfolio_id])
			->andFilterWhere(['like', 'spec', $this->spec])
			->andFilterWhere(['like', 'tag', $this->tag]);

		return $dataProvider;
	}

	public function mysearch($search)
	{
		$query = Portfolio::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
					'pageSize' => 50,
			],
		]);


		$query->orFilterWhere(['like', 'title', $search])
			->orFilterWhere(['like', 'content', $search])
			->orFilterWhere(['like', 'spec', $search])
			->orFilterWhere(['like', 'tag', $search]);

//		$query->addOrderBy('date DESC');

		return $dataProvider;

	}

	public function search_by_designer($search)
	{
		$query = new Query;

		// add conditions that should always apply here

		$portfolio_array = $query->select("p.portfolio_id, p.title AS p_title, d.title AS d_title, c.title AS c_title, p.tag, p.thumb")
			->from("portfolio AS p, designer AS d, client AS c")
			->Where("p.designer_id = d.designer_id AND p.company_id = c.client_id AND p.designer_id = '".$search."'")
//			->limit($limit)
			->all();

		return $portfolio_array;

	}

	public function search_by_client($search)
	{
		$query = Portfolio::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
					'pageSize' => 50,
			],
		]);


		$query->orFilterWhere(['company_id' => $search]);

//		$query->addOrderBy('date DESC');

		return $dataProvider;

	}

	public function portfolio_search($limit, $offset=0, $search='')
	{
		$query = new Query;
		$seed = date('oW');

		// add conditions that should always apply here
		if(0 != strcmp($search, '')){
			$where = "photo_uploaded = 1 AND (p.designer_id = d.designer_id AND p.company_id = c.client_id) AND (p.title like '%".$search."%' OR p.content like '%".$search."%' OR p.tag like '%".$search."%')";
		} else {
			$where = "photo_uploaded = 1 AND p.designer_id = d.designer_id AND p.company_id = c.client_id";
		}

		$portfolio_array = $query->select("p.portfolio_id, p.title AS p_title, d.title AS d_title, c.title AS c_title, p.tag, p.thumb")
			->from("portfolio AS p, designer AS d, client AS c")
			->Where($where)
			->orderBy('rand('.$seed.')')
			->limit($limit)
			->all();

		return $portfolio_array;
	}

	public function count()
	{
		$query = new Query;

		// add conditions that should always apply here

		$count = $query->select("COUNT(*)")
			->from("portfolio")
			->where("photo_uploaded = 1")
			->one();

		return $count['COUNT(*)'];
	}

}
