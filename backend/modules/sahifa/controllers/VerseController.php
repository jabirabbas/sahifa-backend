<?php

namespace app\modules\sahifa\controllers;

use Yii;
use app\modules\sahifa\models\Verse;
use app\modules\sahifa\models\VerseSearch;
use app\modules\sahifa\models\Words;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * VerseController implements the CRUD actions for Verse model.
 */
class VerseController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionValidate()
    {
        $model = new Verse();
        $wModel = new Words();
        $request = \Yii::$app->getRequest();
        if ($request->isPost) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->load($request->post()) && !ActiveForm::validate($model)){
                return ActiveForm::validate($model);
            } else if($wModel->load($request->post()) && !ActiveForm::validate($wModel)){
                return ActiveForm::validate($wModel);
            }
        }
    }

    /**
     * Lists all Verse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VerseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Verse model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Verse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = false;
        $model = new Verse();
        $wModel = new Words();

        if ($model->load(Yii::$app->request->post())) {
            $date = new \DateTime(null, new \DateTimeZone('UTC'));
            $model->created_on = $date->format('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->identity->id;
            if($model->save()){
                Yii::$app->session->setFlash('success','Verse created successfully.');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'wModel' => $wModel
        ]);
    }

    /**
     * Updates an existing Verse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = false;
        $model = $this->findModel($id);
        $wModel = new Words();

        if ($model->load(Yii::$app->request->post())) {
            exit;
            if($model->save()){
                //deleting all words before adding new one
                Words::deleteAll(['verse_id'=>$model->id]);

                $post = Yii::$app->request->post();
                for($i = 0; $i < count($post['Words']['word_sequence']); $i++){
                    if(empty($post['Words']['word_sequence'][$i]) or empty($post['Words']['word_ar'][$i])){
                        continue;
                    }
                    $wModel = new Words();
                    $wModel->verse_id = $model->id;
                    $wModel->word_sequence = $post['Words']['word_sequence'][$i];
                    $wModel->word_en = $post['Words']['word_en'][$i];
                    $wModel->word_ar = $post['Words']['word_ar'][$i];
                    $wModel->word_ur = $post['Words']['word_ur'][$i];
                    $wModel->word_fa = $post['Words']['word_fa'][$i];
                    $wModel->word_hi = $post['Words']['word_hi'][$i];
                    $wModel->save();
                }
                Yii::$app->session->setFlash('success','Verse updated successfully.');
                return $this->redirect(['index']);    
            }
        }

        return $this->renderAjax('update', [
            'model' => $model,
            'wModel' => $wModel
        ]);
    }

    /**
     * Deletes an existing Verse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning','Verse deleted successfully.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Verse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Verse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Verse::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
