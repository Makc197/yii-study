<?php

namespace app\controllers;

use Yii;
use app\models\MyUser;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\ContactForm;

class SiteController extends _BaseController {

    //public $layout = 'custom';
    /**
     * @inheritdoc
     */
    public function behaviors() {
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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
    public function actionIndex() {
        //$this->layout = 'custom';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }

        //Создаем пустую модель с 3-мя пустыми полями ('login', 'password', 'rememberme') - см. SCENARIO_LOGIN
        $user = new MyUser(['scenario' => MyUser::SCENARIO_LOGIN]);

        //Загружаем массив пост в модель и валидируем пароль
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            //Если все Ок - Берем полноценную модель из бд чтобы передать её в Yii::$app->user->login
            //Иначе не заработает - нельзя передавать обрезанную текущюю модель $user с 3мя полями
            $user = MyUser::findByUsername($user->login);
            Yii::$app->user->login($user, $user->rememberme ? 3600 * 24 * 30 : 0);

            return $this->redirect('/');
        }

        return $this->render('login', [
            'model' => $user,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
//      return $this->goHome();
        return $this->redirect('/');
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }

}
