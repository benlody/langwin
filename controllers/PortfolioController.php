<?php

namespace app\controllers;

use Yii;
use app\models\Portfolio;
use app\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImgUploadForm;
use app\models\ExcelUploadForm;
use yii\web\UploadedFile;
use app\models\Designer;
use app\models\Client;
use app\models\DesignerSearch;
use app\models\Tag;
use app\models\PortfolioTagRelation;
use app\models\Develope;
use yii\db\Query;


function get_array_excel($path){

	$objPHPExcel = new \PHPExcel();
	$objPHPExcel = \PHPExcel_IOFactory::load($path);
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

	return $sheetData;

}



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
	public function actionIndex($search='', $token='')
	{
		$searchModel = new PortfolioSearch();
		if(0 != strcmp($search, '')){
			$dataProvider = $searchModel->mysearch($search);
		} else {
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}

		if(0 != strcmp($token, '')){
			$develope_model = Develope::findOne(['tracking_token' => $token]);
			$develope_model->tracking_status = 1;
			$develope_model->save();
		}

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionList($photo_uploaded=-1)
	{
		$searchModel = new PortfolioSearch();
		$search_param = Yii::$app->request->queryParams;
		if(0 == $photo_uploaded){
			$search_param['PortfolioSearch']['photo_uploaded'] = 0;
		} else if(1 == $photo_uploaded){
			$search_param['PortfolioSearch']['photo_uploaded'] = 1;
		}
		$dataProvider = $searchModel->search($search_param);

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

		$designerPortfolioSearchModel = new PortfolioSearch();

		$model = $this->findModel($id);
		$designer_model = Designer::findOne($model->designer_id);
		$client_model = Client::findOne($model->company_id);
		if( file_exists ('./images/'.$model->portfolio_id )){
			$photos = preg_grep('/^([^.])/', scandir('./images/'.$model->portfolio_id));
			foreach ($photos as $key => $value) {
				$photos[$key] = '/images/'.$model->portfolio_id.'/'.$value;
			}
		}

		$designerPortfolioDataProvider = $designerPortfolioSearchModel->search_by_designer($model->designer_id);

		return $this->render('view', [
			'model' => $model,
			'designer_model' => $designer_model,
			'client_model' => $client_model,
			'designerPortfolioDataProvider' => $designerPortfolioDataProvider,
			'photos' => $photos
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
		$client = new Client();
		$designer = new Designer();
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$thumb = $imgfile_model->upload($post_param['Portfolio']['portfolio_id']);

			$model->load(Yii::$app->request->post());
			$model->thumb = $thumb;
			$model->photo_uploaded = 1;
			$model->save();

			$tags = explode(",",$post_param['Portfolio']['tag']);
			foreach ($tags as $tag) {
				$tag = trim($tag);
				if(false == ($model_tag = Tag::find()->where(['name' => $tag])->one())){
					$model_tag = new Tag();
					$model_tag->name = $tag;
					$model_tag->save();
				}
				$relation = new PortfolioTagRelation();
				$relation->portfolio_id = $model->portfolio_id;
				$relation->tag_id = $model_tag->tag_id;
				$relation->save();
			}

			return $this->redirect(['view', 'id' => $model->portfolio_id]);

		} else {

			$query = new Query;
			$client = array();
			$client_q = $query->select('client_id,'.'title')
				->from('client')
				->all();

			foreach ($client_q as $key => $value) {
				$client[$value['client_id']]=$value['title'];
			}

			$query = new Query;
			$designer = array();
			$designer_q = $query->select('designer_id,'.'title')
				->from('designer')
				->all();

			foreach ($designer_q as $key => $value) {
				$designer[$value['designer_id']]=$value['title'];
			}

			return $this->render('create', [
				'model' => $model,
				'imgfile_model' => $imgfile_model,
				'client' => $client,
				'designer' => $designer,
			]);
		}
	}



	public function actionCreate_by_excel()
	{
		$model = new Portfolio();
		$client = new Client();
		$designer = new Designer();
		$excelfile_model = new ExcelUploadForm();
		$post_param = Yii::$app->request->post();

		if(isset($post_param['save'])){

			$portfolio_array = json_decode($post_param['portfolio_json'], true);

			foreach($portfolio_array as $key => $value){
				if($key == 1){
					continue;
				}
				if('' == $value['A']){
					continue;
				}

				$model = new Portfolio();

				$model->portfolio_id = $value['A'];
				$model->title = $value['B'];
				$model->spec = $value['C'];
				$model->content = $value['D'];
				$model->designer_id = $value['F'];
				$model->company_id = $value['H'];
				$model->tag = $value['I'];
				$model->photo_uploaded = 0;
				$model->save();

				$tags = explode(",",$value['I']);
				foreach ($tags as $tag) {
					$tag = trim($tag);
					if(false == ($model_tag = Tag::find()->where(['name' => $tag])->one())){
						$model_tag = new Tag();
						$model_tag->name = $tag;
						$model_tag->save();
					}
					$relation = new PortfolioTagRelation();
					$relation->portfolio_id = $model->portfolio_id;
					$relation->tag_id = $model_tag->tag_id;
					$relation->save();
				}
			}

			return $this->redirect(['list', 'photo_uploaded'=>0]);

		} else if(isset($post_param['upload'])){


		   if (Yii::$app->request->isPost) {
				$excelfile_model->excelFile = UploadedFile::getInstance($excelfile_model, 'excelFile');

				if ($excelfile_model->upload()) {
					// file is uploaded successfully
					$content = get_array_excel('uploads/'.$excelfile_model->excelFile->name);					
				}
			}

			return $this->render('create_by_excel', [
				'model' => $model,
				'excelfile_model' => $excelfile_model,
				'content' => $content
			]);

		} else {

			return $this->render('create_by_excel', [
				'model' => $model,
				'excelfile_model' => $excelfile_model
			]);

		}
	}


	public function actionUpload_photo($id)
	{
		$model = $this->findModel($id);
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$thumb = $imgfile_model->upload($id);


			$model->thumb = $thumb;
			$model->photo_uploaded = 1;
			$model->save();

			return $this->redirect(['update_thumb', 'id' => $model->portfolio_id]);

		} else {


			return $this->render('upload_photo', [
				'model' => $model,
				'imgfile_model' => $imgfile_model,
			]);
		}
	}

	public function actionUpdate_thumb($id)
	{
		$model = $this->findModel($id);
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {


			$model->load(Yii::$app->request->post());
			$model->save();

			return $this->redirect(['list', 'photo_uploaded'=>0]);

		} else {

			if( file_exists ('./images/'.$model->portfolio_id )){
				$photos = preg_grep('/^([^.])/', scandir('./images/'.$model->portfolio_id));
				foreach ($photos as $key => $value) {
					$photos[$key] = './images/'.$model->portfolio_id.'/'.$value;
				}
			}

			return $this->render('update_thumb', [
				'model' => $model,
				'photos' => $photos
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
