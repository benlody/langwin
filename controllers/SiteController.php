<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Portfolio;
use app\models\PortfolioSearch;
use app\models\Designer;
use app\models\DesignerSearch;

//use app\models\PasswordResetRequestForm;
//use app\models\ResetPasswordForm;
use app\models\SignupForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;


class SiteController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
//					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{

		$portfolio_searchModel = new PortfolioSearch();
		$portfolio_array = $portfolio_searchModel->portfolio_search(10);

		$desginer_searchModel = new DesignerSearch();
		$designer_array = $desginer_searchModel->designer_search(6);

		$service_list = array();
		$service_list = [
				['name' => '名片', 'ico_src' => 'images/index/si-ico-ncard.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
				['name' => '書籍', 'ico_src' => 'images/index/si-ico-book.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
				['name' => '型錄', 'ico_src' => 'images/index/si-ico-catalog.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
				['name' => 'DM', 'ico_src' => 'images/index/si-ico-dm.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
				['name' => '卡片', 'ico_src' => 'images/index/si-ico-card.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
				['name' => '信封', 'ico_src' => 'images/index/si-ico-env.png', 'bg_src' =>'images/tmp/aabba_07.jpg' ],
		];

		return $this->render('index', [
			'portfolio_array' => $portfolio_array,
			'designer_array' => $designer_array,
			'service_list' => $service_list,
		]);

//		return $this->render('index');
	}

	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	public function actionSignup()
	{

		if(Yii::$app->user->identity->group !== User::GROUP_ADMIN){
			throw new NotFoundHttpException('The requested page does not exist.');
		}

		$model = new SignupForm();
		if ($model->load(Yii::$app->request->post())) {
			if ($user = $model->signup()) {
				if (Yii::$app->getUser()->login($user)) {
					return $this->goHome();
				}
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}
}
