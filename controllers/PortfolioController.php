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
use app\models\User;


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
//					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionIndex($search='', $token='', $page=1)
	{

		$page_size = 70;
		$portfolio_searchModel = new PortfolioSearch();

		$portfolio_cnt = $portfolio_searchModel->count($search);
		$page_max = ceil($portfolio_cnt/$page_size);

		if($page > $page_max){
			$page = $page_max;
		} else if ($page < 1){
			$page = 1;
		}
		$offset = ($page-1)*$page_size;

		$portfolio_array = $portfolio_searchModel->portfolio_search($page_size, $offset, $search);

		if(0 != strcmp($token, '')){
			$develope_model = Develope::findOne(['tracking_token' => $token]);
			$develope_model->tracking_status = 1;
			$develope_model->save();
		}

		return $this->render('index', [
			'portfolio_array' => $portfolio_array,
			'search' => $search,
			'page' => $page,
			'page_max' => $page_max,
		]);
	}

	/**
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionList($photo_uploaded=-1)
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$searchModel = new PortfolioSearch();

		$post_param = Yii::$app->request->post();
		$search_param = Yii::$app->request->queryParams;
		$search_param['PortfolioSearch'] = '';

		if(isset($post_param['PortfolioSearch'])){
			$search_param['PortfolioSearch'] = $post_param['PortfolioSearch'];
		}

		if($photo_uploaded != -1){
			if(0 == $photo_uploaded){
				$search_param['PortfolioSearch']['photo_uploaded'] = 0;
			} else if (1 == $photo_uploaded) {
				$search_param['PortfolioSearch']['photo_uploaded'] = 1;
			}
		}

		$dataProvider = $searchModel->search($search_param);

		return $this->render('list', [
			'search_param' => $search_param['PortfolioSearch'],
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
				$photos[$key] = 'images/'.$model->portfolio_id.'/'.$value;
			}
		}

		return $this->render('view', [
			'model' => $model,
			'designer_model' => $designer_model,
			'client_model' => $client_model,
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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

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
			$model->date = date("Y-m-d", strtotime('today'));
			$model->save();

			$tags = explode(",",$post_param['Portfolio']['tag']);
			foreach ($tags as $tag) {
				$tag = trim($tag);
				if(false == ($model_tag = Tag::find()->where(['name' => $tag])->one())){
					$model_tag = new Tag();
					$model_tag->name = $tag;
					$model_tag->save();
				}
				if(false == ($relation = PortfolioTagRelation::findOne(['portfolio_id' => $model->portfolio_id, 'tag_id' => $model_tag->tag_id]))){
					$relation = new PortfolioTagRelation();
					$relation->portfolio_id = $model->portfolio_id;
					$relation->tag_id = $model_tag->tag_id;
					$relation->save();
				}
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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

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

				$model->portfolio_id = strval($value['A']);
				$model->title = $value['B'];
				$model->spec = $value['C'];
				$model->content = $value['D'];
				$model->tag = $value['E'];
				$model->designer_id = $value['G'];
				$model->company_id = $value['I'];
				$model->photo_uploaded = 0;
				$model->date = date("Y-m-d", strtotime('today'));
				$model->save();

				$tags = explode(",",$value['E']);
				foreach ($tags as $tag) {
					$tag = trim($tag);
					if(false == ($model_tag = Tag::find()->where(['name' => $tag])->one())){
						$model_tag = new Tag();
						$model_tag->name = $tag;
						$model_tag->save();
					}
					if(false == ($relation = PortfolioTagRelation::findOne(['portfolio_id' => $model->portfolio_id, 'tag_id' => $model_tag->tag_id]))){
						$relation = new PortfolioTagRelation();
						$relation->portfolio_id = $model->portfolio_id;
						$relation->tag_id = $model_tag->tag_id;
						$relation->save();
					}
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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = $this->findModel($id);
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();
		$designer_model = Designer::findOne($model->designer_id);

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$thumb = $imgfile_model->upload($id);

			$model->thumb = $thumb;
			$model->photo_uploaded = 1;
			$model->save();

			$designer_model->thumb1 = $model->portfolio_id.'/'.$thumb;
			$designer_model->save();

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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = $this->findModel($id);
		$post_param = Yii::$app->request->post();
		$designer_model = Designer::findOne($model->designer_id);

		if (Yii::$app->request->isPost) {

			$model->load(Yii::$app->request->post());
			$model->save();

			$designer_model->thumb1 = $model->portfolio_id.'/'.$post_param['Portfolio']['thumb'];
			$designer_model->save();

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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {

			$designer_model = Designer::findOne($model->designer_id);
			$designer_model->thumb1 = $model->portfolio_id.'/'.$model->thumb;
			$designer_model->save();

			$tags = explode(",",$model->tag);
			foreach ($tags as $tag) {
				$tag = trim($tag);
				if(false == ($model_tag = Tag::find()->where(['name' => $tag])->one())){
					$model_tag = new Tag();
					$model_tag->name = $tag;
					$model_tag->save();
				}
				if(false == ($relation = PortfolioTagRelation::findOne(['portfolio_id' => $model->portfolio_id, 'tag_id' => $model_tag->tag_id]))){
					$relation = new PortfolioTagRelation();
					$relation->portfolio_id = $model->portfolio_id;
					$relation->tag_id = $model_tag->tag_id;
					$relation->save();
				}
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

			return $this->render('update', [
				'model' => $model,
				'client' => $client,
				'designer' => $designer,
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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$this->findModel($id)->delete();

		return $this->redirect(['list']);
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
