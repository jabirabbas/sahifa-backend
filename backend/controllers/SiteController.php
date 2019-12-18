<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get','post'],
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
                'layout' => false
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        $this->layout = 'login_layout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect(['sahifa/chapter']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signup action.
     *
     * @return Response|string
     */
    public function actionSignup()
    {

        $this->layout = 'login_layout';
        $model = new \common\models\User();
        
        if ($model->load(Yii::$app->request->post())){
            $model->password = password_hash($model->password, PASSWORD_DEFAULT);
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Registered successfully.');
                return $this->redirect(['login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionForgot()
    {
        $this->layout = 'login_layout';
        $model = new \common\models\User();
        if (Yii::$app->request->post()) {
            $model = \app\models\Users::findOne(['email'=>Yii::$app->request->post('email')]);
            if($model){
                $model->forgot_pass_code = uniqid();
                $model->forgot_pass_date = date('Y-m-d H:i:s');
                $model->save(false);    
                //email link to user
                Yii::$app->session->setFlash('success', 'Password reset link sent to your email address.');
                return $this->redirect(['login']);
            } else {
                Yii::$app->session->setFlash('error', 'Email Address not found.');
            }
        }

        return $this->render('forgot', [
            'model' => $model,
        ]);
    }

    public function actionReset()
    {
        $this->layout = 'login_layout';
        $lmodel = new ResetForm();

        if (Yii::$app->request->post()) {
            $model = \app\models\Users::findOne(['forgot_pass_code'=>Yii::$app->request->post()['ResetForm']['code']]);
            $model->forgot_pass_code = '';
            $model->forgot_pass_date = '';
            $model->password = password_hash(Yii::$app->request->post()['ResetForm']['password'], PASSWORD_DEFAULT);
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Password reset successful.');
            return $this->redirect(['login']);
        }   

        if (Yii::$app->getRequest()->getQueryParam('code')) {
            $model = \app\models\Users::findOne(['forgot_pass_code'=>Yii::$app->getRequest()->getQueryParam('code')]);
            if($model){
                if(date('Y-m-d') <= date('Y-m-d',strtotime($model->forgot_pass_date . ' +3 days'))){
                    $lmodel->code = Yii::$app->getRequest()->getQueryParam('code');
                    return $this->render('reset', [
                        'model' => $lmodel,
                    ]);
                } else {
                    Yii::$app->session->setFlash('error', 'Link to reset password has expired.');
                    return $this->redirect(['login']);
                }
                //email user
            } else {
                Yii::$app->session->setFlash('error', 'Link to reset password is invalid.');
                return $this->redirect(['login']);
            }
        } else {
            return $this->redirect(['login']);
        }
    }

    public function actionChangePassword(){
        $model = \common\models\User::findOne(['id'=>Yii::$app->user->identity->id]);
        if(!$model->validatePassword(Yii::$app->request->post('current_password'))){
            return 0;
        } else {
            $model->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('new_password'));
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Password modified successfully.');
            return 1;
        }
    }

    public function actionError(){
        if(empty(Yii::$app->user->identity)){
            header('Location: '.Url::base().'/index.php/site/login');
            exit;
        } else {
            return true;
        }
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
}
