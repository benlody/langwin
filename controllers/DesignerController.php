<?php

namespace app\controllers;

use Yii;
use app\models\Designer;
use app\models\DesignerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImgUploadForm;
use yii\web\UploadedFile;
use app\models\Portfolio;
use app\models\PortfolioSearch;


/**
 * DesignerController implements the CRUD actions for Designer model.
 */
class DesignerController extends Controller
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
	 * Lists all Designer models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new DesignerSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Designer model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{

		$portfolioSearchModel = new PortfolioSearch();
		$model = $this->findModel($id);
		$dataProvider = $portfolioSearchModel->search_by_designer($model->designer_id);

		return $this->render('view', [
			'model' => $model,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new Designer model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Designer();
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$filename = $imgfile_model->upload_designer($post_param['Designer']['name']);

			$model->load(Yii::$app->request->post());
			$model->photo = $filename;
			$model->save();
			
			return $this->redirect(['view', 'id' => $model->designer_id]);

		} else {
			return $this->render('create', [
				'model' => $model,
				'imgfile_model' => $imgfile_model,
			]);
		}
	}

	/**
	 * Updates an existing Designer model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->designer_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Designer model.
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
	 * Finds the Designer model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Designer the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Designer::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
