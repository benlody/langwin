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
use app\models\Develope;
use app\models\User;

require '../phpmail/PHPMailer/PHPMailerAutoload.php';

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
				],
			],
		];
	}

	/**
	 * Lists all Designer models.
	 * @return mixed
	 */
	public function actionIndex($page=1, $token='')
	{
		$page_size = 40;
		$designer_searchModel = new DesignerSearch();

		$designer_cnt = $designer_searchModel->count();
		$page_max = ceil($designer_cnt/$page_size);

		if($page > $page_max){
			$page = $page_max;
		} else if ($page < 1){
			$page = 1;
		}
		$offset = ($page-1)*$page_size;

		$designer_array = $designer_searchModel->designer_search($page_size, $offset);

		if(0 != strcmp($token, '')){
			$develope_model = Develope::findOne(['tracking_token' => $token]);
			if(null != $develope_model){
				$develope_model->tracking_status = 1;
				$develope_model->save();
			}
		}

		return $this->render('index', [
			'designer_array' => $designer_array,
			'page' => $page,
			'page_max' => $page_max,
		]);
	}


	/**
	 * Lists all Designer models.
	 * @return mixed
	 */
	public function actionList()
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$searchModel = new DesignerSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('list', [
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
		$portfolio_array = $portfolioSearchModel->search_by_designer($model->designer_id);

		return $this->render('view', [
			'model' => $model,
			'portfolio_array' => $portfolio_array,
		]);
	}

	/**
	 * Creates a new Designer model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = new Designer();
		$imgfile_model = new ImgUploadForm();
		$post_param = Yii::$app->request->post();

		if (Yii::$app->request->isPost) {

			$imgfile_model->imgFile = UploadedFile::getInstances($imgfile_model, 'imgFile');
			$filename = $imgfile_model->upload_designer($post_param['Designer']['designer_id']);

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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = $this->findModel($id);

		if (Yii::$app->request->isPost) {
			$model->load(Yii::$app->request->post());
			$model->save();
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
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$this->findModel($id)->delete();

		return $this->redirect(['list']);
	}

	public function actionAjaxSendMail()
	{
		$post_param = Yii::$app->request->post();

		$model = $this->findModel($post_param['designer_id']);

		$this->sendMail($model, $post_param['cdcon'], $post_param['cdmail']);

		return $true;
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

	protected function sendMail($model, $content, $c_mail){
		$mail = new \PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'iwatch.247-hosting.com';
		$mail->SMTPAuth = true;
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->CharSet = 'UTF-8';
		$mail->Username = 'test@lang-win.com.tw';
		$mail->Password = 'quotation29999099';
		$mail->setFrom('website@lang-win.com.tw', '光隆印刷 - 聯絡設計師');
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->addBcc('jack@lang-win.com.tw');
		$mail->addAddress($model->email);
		$mail->isHTML(true);
		$mail->Subject = '來自<'.$c_mail.'>透過<光隆印刷>的聯繫';

		$body = $this->renderPartial('contact_design', [
					'model' => $model,
					'content' => $content,
					'c_mail' => $c_mail
				]);

		$mail->Body = $body;
		$mail->send();
	}

}
