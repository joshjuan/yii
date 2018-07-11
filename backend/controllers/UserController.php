<?php

namespace backend\controllers;

use backend\models\Employee;
use common\models\LoginForm;
use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $arrayStatus = User::getArrayStatus();
        $arrayRole = User::getArrayRole();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayStatus' => $arrayStatus,
            'arrayRole' => $arrayRole,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \Exception
     */
    public function actionCreate()
    {
        if (yii::$app->user->can('admin')) {
            $model = new User();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                //Yii::$app->authManager->assign(Yii::$app->authManager->getRole($model->role), $model->id);

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->renderAjax('_pop', [
                    'model' => $model,
                ]);
            }
        } else {

            Yii::$app->session->setFlash('danger', 'You do not have permission to create user.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('admin-update');
        if (yii::$app->user->can('admin')) {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->authManager->revokeAll($id);
              //  Yii::$app->authManager->assign(Yii::$app->authManager->getRole($model->role), $id);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('danger', 'You do not have permission to update user.');
            return $this->redirect(['index']);
        }
    }


    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        if (yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('danger', 'You do not have permission to delete user');
            return $this->redirect(['index']);
        }
    }

    public function actionProfile()
    {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->identity->id;
            $model = $this->findModel($id);

            $emp = $this->findEmpModel($model->emp_id);
            $model->setScenario('admin-update');
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->authManager->revokeAll($id);
                Yii::$app->authManager->assign(Yii::$app->authManager->getRole($model->role), $id);
                $model->save();
                Yii::$app->session->setFlash('success', 'You have successfully changed your password.');
                return $this->redirect(['profile', 'id' => $model->id]);
            } else {
                return $this->render('profile', [
                    'model' => $this->findModel($id), 'emp' => $emp
                ]);
            }

        } else {
            $model = new LoginForm();
            return $this->render('site/login', [
                'model' => $model,
            ]);
        }
    }

    protected function findEmpModel($id)
    {
        if (($model = Employee::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
