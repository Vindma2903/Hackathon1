<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
{

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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionOrganization()
    {
        return $this->render('organization');
    }

    public function actionOrganizationCard()
    {
        return $this->render('organization-card');
    }

    public function actionFormBuilder()
    {
        return $this->render('form-builder');
    }

    public function actionQuestionnaire()
    {
        return $this->render('questionnaire');
    }

    public function actionReport()
    {
        return $this->render('report');
    }


    public function actionOrganizationCreate(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->load(Yii::$app->request->post()) && $model->signup()){
                print_r(Yii::$app->request->post());
                //return $this->goBack();
            }

        }
        
        return $this->render('signup', compact('model'));
    }

}
