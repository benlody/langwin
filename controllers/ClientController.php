<?php

namespace app\controllers;

use Yii;
use app\models\Client;
use app\models\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImgUploadForm;
use yii\web\UploadedFile;
use app\models\Portfolio;
use app\models\PortfolioSearch;
use yii\db\Query;


/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Client models.
	 * @return mixed
	 */
	public function actionIndex($client_group_id = -1)
	{
		$searchModel = new ClientSearch();
		$query_params = Yii::$app->request->queryParams;

		$query = new Query;
		$group_array = $query->select('client_group_id,'.'chinese_name')
			->from('group')
			->orderBy('rand()')
			->all();

		$client_array = $searchModel->client_search($client_group_id);

		return $this->render('index', [
			'client_array' => $client_array,
			'group_array' => $group_array,
			'client_group_id' => $client_group_id,
		]);
	}

	/**
	 * Lists all Client models.
	 * @return mixed
	 */
	public function actionList()
	{
		$searchModel = new ClientSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('list', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}


	/**
	 * Displays a single Client model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{

		$portfolioSearchModel = new PortfolioSearch();
		$model = $this->findModel($id);
		$dataProvider = $portfolioSearchModel->search_by_client($model->client_id);

		return $this->render('view', [
			'model' => $model,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new Client model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Client();
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$filename = $imgfile_model->upload_client($post_param['Client']['client_id']);

			$model->load(Yii::$app->request->post());
			$model->logo = $filename;

			$model->save();

			return $this->redirect(['view', 'id' => $model->client_id]);
		} else {
			$query = new Query;
			$group = array();
			$group_q = $query->select('client_group_id,'.'chinese_name')
				->from('group')
				->all();
			foreach ($group_q as $key => $value) {
				$group[$value['client_group_id']] = $value['chinese_name'];
			}
			return $this->render('create', [
				'model' => $model,
				'group' => $group,
				'imgfile_model' => $imgfile_model,
			]);
		}
	}

	/**
	 * Updates an existing Client model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->client_id]);
		} else {
			$query = new Query;
			$group = array();
			$group_q = $query->select('client_group_id,'.'chinese_name')
				->from('group')
				->all();
			foreach ($group_q as $key => $value) {
				$group[$value['client_group_id']] = $value['chinese_name'];
			}
			return $this->render('update', [
				'model' => $model,
				'group' => $group,
			]);
		}
	}

	/**
	 * Deletes an existing Client model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Client model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Client the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Client::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
