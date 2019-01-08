<?php

namespace app\controllers;

use Yii;
use app\models\Develope;
use app\models\DevelopeSearch;
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
use yii\db\Query;
use app\models\User;

require '../phpmail/PHPMailer/PHPMailerAutoload.php';


function get_array_excel($path){

	$objPHPExcel = new \PHPExcel();
	$objPHPExcel = \PHPExcel_IOFactory::load($path);
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

	return $sheetData;

}

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[rand(0, $max)];
    }
    return implode('', $pieces);
}

/**
 * DevelopeController implements the CRUD actions for Develope model.
 */
class DevelopeController extends Controller
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
	 * Lists all Develope models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$searchModel = new DevelopeSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Develope model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Develope model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = new Develope();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->develope_id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}


	public function actionCreate_by_excel()
	{
		if(Yii::$app->user->isGuest){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = new Develope();
		$excelfile_model = new ExcelUploadForm();
		$post_param = Yii::$app->request->post();

		if(isset($post_param['save'])){

			$develope_array = json_decode($post_param['develope_json'], true);

			foreach($develope_array as $key => $value){
				if($key == 1){
					continue;
				}
				if('' == $value['A']){
					continue;
				}

				$model = new Develope();

				$model->name = $value['A'];
				$model->email = $value['B'];
				$model->title = $value['C'];
				$model->content = $value['D'];
				$model->sales = Yii::$app->user->identity->username;
				$model->tracking_token = random_str(8);
				$model->tracking_status = 0;
				$model->date = date("Y-m-d", strtotime('today'));
				$model->save();

				$body = $this->renderPartial('develope', [
							'content' => $value['D'],
							'token' => $model->tracking_token
						]);

				$this->sendMail($body, $value['C'], $model->sales, $model->email);

			}

			return $this->redirect(['index']);

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

	/**
	 * Updates an existing Develope model.
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
			return $this->redirect(['view', 'id' => $model->develope_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Develope model.
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

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Develope model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Develope the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Develope::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function sendMail($body, $subject, $sales, $to){
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
		if("jack" == $sales){
			$mail->AddReplyTo('jack@lang-win.com.tw', '光隆印刷 - Jack');
			$mail->setFrom('jack@lang-win.com.tw', '光隆印刷 - Jack');
		}
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$address = explode(",", $to);
		foreach($address as $key => $value){
			$mail->addAddress(trim($value));
		}
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->send();
	}
}
