<?php

namespace app\controllers;

use Yii;
use app\models\Quotation;
use app\models\QuotationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
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
	 * Lists all Quotation models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new QuotationSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Quotation model.
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
	 * Creates a new Quotation model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Quotation();
		$post_param = Yii::$app->request->post();

		if(isset($post_param['quotation_book'])){

			$model->load($post_param);

			$contect = "";
			if("else" == $post_param["size"]){
				$content = $content."尺寸:其他(".$post_param["other_size"].")\n";
			} else {
				$content = $content."尺寸:".$post_param["size"]."\n";
			}

			if("else" == $post_param["cover-paper"]){
				$content = $content."封面紙張:其他(".$post_param["other_cover-paper"].")\n";
			} else {
				$content = $content."封面紙張:".$post_param["cover-paper"]."\n";
			}

			if("else" == $post_param["cover-color"]){
				$content = $content."封面印刷:其他(".$post_param["other_cover-color"].")\n";
			} else {
				$content = $content."封面印刷:".$post_param["cover-color"]."\n";
			}

			$content = $content."封面單雙面:".$post_param["cover-side"]."\n";

			if(is_array($post_param["cover-addtional"])){
				$content = $content."封面加工:";
				foreach ($post_param["cover-addtional"] as $key => $value) {
					if("else_stamp" == $value){
						$content = $content."燙其他色箔(".$post_param["other_cover-stamping"]."),";
					} else if("else" == $value){
						$content = $content."其他加工(".$post_param["other_cover-addtional"]."),";
					} else {
						$content = $content.$value.",";
					}
				}
				$content = $content."\n";
			}

			$content = $content."內頁紙張:".$post_param["inside-paper"]."\n";

			if("else" == $post_param["inside-color"]){
				$content = $content."內頁印刷:其他(".$post_param["other_inside-color"].")\n";
			} else {
				$content = $content."內頁印刷:".$post_param["inside-color"]."\n";
			}

			if("else" == $post_param["binding"]){
				$content = $content."裝訂方式:其他(".$post_param["other_binding"].")\n";
			} else {
				$content = $content."裝訂方式:".$post_param["binding"]."\n";
			}

			if("horizontal" == $post_param["horizontal"]){
				$content = $content."橫式(短邊裝釘)\n";
			}

			$content = $content."頁數:".$post_param["page"]."\n";
			$content = $content."數量:".$post_param["qty"]."\n";
			$content = $content."備註:".$post_param["remark"]."\n";



			$model->content = $content;
			$model->status = 0;
			$model->date = date("Y-m-d", strtotime('today'));
			$model->save();

			return $this->redirect('create', [
				'model' => new Quotation(),
			]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Quotation model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->quotation_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Quotation model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	public function actionTake($id)
	{
		$model = $this->findModel($id);
		$model->status = 1;
		$model->sales = Yii::$app->user->identity->username;
		$model->save();

		return $this->redirect(['index']);
	}

	public function actionDeal($id)
	{
		$model = $this->findModel($id);
		$model->status = 2;
		$model->save();

		return $this->redirect(['index']);
	}


	/**
	 * Finds the Quotation model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Quotation the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Quotation::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
