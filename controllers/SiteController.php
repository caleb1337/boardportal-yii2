<?php

namespace app\controllers;

use app\models\Advert;
use app\models\Category;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
//        $categories = Category::find()->all();
        $categories = new ActiveDataProvider([
            'query' => Category::find(),
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => Advert::find()->where(['status' => 1,]),
            'pagination' => [
                'pageSize' => 10,
            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'created_at' => SORT_DESC,
//                    'title' => SORT_ASC,
//                ]
//            ],
        ]);
        return $this->render('index', compact('dataProvider', 'categories'));
    }

    public function actionSearchByCategory($category_id)
    {
        $categories = new ActiveDataProvider([
            'query' => Category::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => Advert::find()->where(['category_id' => $category_id]),
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);
        return $this->render('index', compact('dataProvider', 'categories'));
    }


    /**
     * View action.
     * Detailed view of the advert
     *
     * @return Response|string
     */

    public function actionView($advert_id)
    {
        try {
            $model = Advert::findOne($advert_id);
            return $this->render('view', compact('model'));
        } catch (\Exception $exception) {
            return $this->render('error', compact('exception'));
        }

    }

    /**
     * Login action.
     *
     * @return Response|string
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

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->login = $model->login;
            $user->first_name = $model->first_name;
            $user->last_name = $model->last_name;
            $user->password = \Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $user->date_of_registration = date('Y-m-d H:i:s');
            $user->role = 'user';
            if ($user->save()) {
                return $this->goHome();
            }
        }

        return $this->render('register', compact('model'));
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
