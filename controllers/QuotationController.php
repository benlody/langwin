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

		if(empty($post_param)){
			return $this->render('create', [
				'model' => $model,
				'show_msg' => false,
			]);
		}

		if(isset($post_param['quotation_book'])){

			$content = $this->getContentBook($post_param);

		} else if (isset($post_param['quotation_card'])){

			$content = $this->getContentCard($post_param);

		} else if (isset($post_param['quotation_poster'])){

			$content = $this->getContentPoster($post_param);

		} else if (isset($post_param['quotation_sticker'])){

			$content = $this->getContentSticker($post_param);

		} else if (isset($post_param['quotation_envelope'])){

			$content = $this->getContentEnvelope($post_param);

		} else if (isset($post_param['quotation_bag'])){

			$content = $this->getContentBag($post_param);

		} else if (isset($post_param['quotation_box'])){

			$content = $this->getContentBox($post_param);

		} else if (isset($post_param['quotation_else'])){

			$content = $this->getContentElse($post_param);

		}

		$model->load($post_param);
		$model->content = $content;
		$model->status = 0;
		$model->date = date("Y-m-d H:i:s", strtotime('now'));
		$model->save();

			return $this->render('create', [
				'model' => $model,
				'show_msg' => true,
			]);

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

	protected function getContentBook($post_param){

		$content = "";
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

		return $content;

	}

	protected function getContentCard($post_param){

		$content = "";

		if("else" == $post_param["size"]){
			$content = $content."尺寸:其他(".$post_param["other_size"].")\n";
		} else {
			$content = $content."尺寸:".$post_param["size"]."\n";
		}

		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		$content = $content."單雙面:".$post_param["side"]."\n";

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}

		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}

	protected function getContentPoster($post_param){

		$content = "";

		if("else" == $post_param["size"]){
			$content = $content."尺寸:其他(".$post_param["other_size"].")\n";
		} else {
			$content = $content."尺寸:".$post_param["size"]."\n";
		}

		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		$content = $content."單雙面:".$post_param["side"]."\n";

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}


		if("else" == $post_param["fold"]){
			$content = $content."摺紙:其他(".$post_param["other_fold"].")\n";
		} else if ("無摺紙" != $post_param["fold"] && "" != $post_param["fold"]) {
			$content = $content."摺紙:".$post_param["fold"]."\n";
		}


		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}


	protected function getContentSticker($post_param){

		$content = "";

		if("else" == $post_param["size"]){
			$content = $content."尺寸:其他(".$post_param["other_size"].")\n";
		} else {
			$content = $content."尺寸:".$post_param["size"]."\n";
		}

		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		$content = $content."形狀:".$post_param["shape"]."\n";

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}

		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}

	protected function getContentEnvelope($post_param){

		$content = "";

		if("else" == $post_param["size"]){
			$content = $content."尺寸:其他(".$post_param["other_size"].")\n";
		} else {
			$content = $content."尺寸:".$post_param["size"]."\n";
		}

		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}

		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}

	protected function getContentBag($post_param){

		$content = "";

		$content = $content."尺寸:W".$post_param["width"]." H".$post_param["height"]." D".$post_param["depth"]."\n";
		$H_total = 4 + $post_param["height"] + 0.8*$post_param["depth"];
		$W_total = 3 + 2*$post_param["width"] + 2*$post_param["depth"];
		$content = $content."展開尺寸(系統自動計算):W".$W_total." H".$H_total."\n";


		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}

		if("else" == $post_param["rope"]){
			$content = $content."提繩:其他(".$post_param["other_rope"].")\n";
		} else {
			$content = $content."提繩:".$post_param["rope"]."\n";
		}

		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}

	protected function getContentBox($post_param){

		$content = "";

		if("else" == $post_param["box_type"]){
			$content = $content."盒形:其他(".$post_param["other_box_type"].")\n";
		} else {
			$content = $content."盒形:".$post_param["box_type"]."\n";
		}

		$content = $content."尺寸:W".$post_param["width"]." L".$post_param["length"]." H".$post_param["height"]."\n";

		if("else" == $post_param["paper"]){
			$content = $content."紙張:其他(".$post_param["other_paper"].")\n";
		} else {
			$content = $content."紙張:".$post_param["paper"]."\n";
		}

		if("else" == $post_param["color"]){
			$content = $content."印刷:其他(".$post_param["other_color"].")\n";
		} else {
			$content = $content."印刷:".$post_param["color"]."\n";
		}

		if(is_array($post_param["addtional"])){
			$content = $content."加工:";
			foreach ($post_param["addtional"] as $key => $value) {
				if("else" == $value){
					$content = $content."其他加工(".$post_param["other_addtional"]."),";
				} else {
					$content = $content.$value.",";
				}
			}
			$content = $content."\n";
		}


		$content = $content."數量:".$post_param["qty"]."\n";
		$content = $content."備註:".$post_param["remark"]."\n";

		return $content;

	}

	protected function getContentElse($post_param){

		$content = "";

		$content = $content."說明:".$post_param["remark"]."\n";

		return $content;

	}

}
