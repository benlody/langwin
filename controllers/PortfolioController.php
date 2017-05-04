<?php

namespace app\controllers;

use Yii;
use app\models\Portfolio;
use app\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImgUploadForm;
use yii\web\UploadedFile;


/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
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
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionIndex($search='')
	{
		$searchModel = new PortfolioSearch();
		if(0 != strcmp($search, '')){
			$dataProvider = $searchModel->mysearch($search);
		} else {
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionList()
	{
		$searchModel = new PortfolioSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('list', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Portfolio model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Portfolio model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Portfolio();
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {


			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$imgfile_model->upload($post_param['Portfolio']['name']);

			$model->load(Yii::$app->request->post());
			$model->save();

			return $this->redirect(['view', 'id' => $model->portfolio_id]);
		} else {
			return $this->render('create', [
				'model' => $model,
				'imgfile_model' => $imgfile_model,
			]);
		}
	}

	/**
	 * Updates an existing Portfolio model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->portfolio_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Portfolio model.
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
	 * Finds the Portfolio model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Portfolio the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Portfolio::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
