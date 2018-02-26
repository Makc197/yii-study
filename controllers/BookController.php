<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\BookSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends _BaseController {

    //public $layout = 'custom';

    public function behaviors() {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
////              'only' => ['login', 'logout', 'signup'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['index', 'view'],
//                        'roles' => ['book_reader', 'reader', 'author', 'editor', 'admin'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['create'],
//                        'roles' => ['author', 'editor', 'admin'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['update'],
//                        'roles' => ['editor', 'admin'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['delete'],
//                        'roles' => ['admin'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex() 
    {
        $auth = Yii::$app->authManager;
//        var_dump($auth->getRule('')); die;
//        var_dump(Yii::$app->user->can('isAuthor', [1 => 1])); die;
        
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
//        if (!Yii::$app->user->can('book_reader'))
//            throw new ForbiddenHttpException('Вам нельзя просматривать эту книгу');

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Book();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
//            var_dump(Yii::$app->user->id);
//            die;

            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
