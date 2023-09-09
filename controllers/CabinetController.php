<?php

namespace app\controllers;

use app\models\Advert;
use app\models\AdvertForm;
use app\models\Category;
use app\models\ChangePasswordForm;
use app\models\User;
use app\models\UserInfo;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class CabinetController extends \yii\web\Controller
{
//    public $layout = 'cabinet';

    public function actionAdd()
    {
        $categories = Category::find()->asArray()->all();;
        $model = new Advert();
        $user_info = UserInfo::findOne(['user_id' => \Yii::$app->user->identity->id]);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->date_of_placement = date('Y-m-d H:i:s');
            $model->user_id = \Yii::$app->user->identity->id;
            $model->status = 1;
            //обновляем количество объявлений в таблице users_info
            $user_info->num_of_active_adverts = $user_info->num_of_active_adverts + 1;
            $user_info->save();
            $model->save();
            \Yii::$app->session->setFlash('info', 'Данные сохранены');
            return $this->redirect('cabinet/index');
        }
        return $this->render('add', compact('model', 'categories'));
    }

    public function actionDelete($advert_id)
    {
        $model = Advert::findOne($advert_id);
        $user_info = UserInfo::findOne(['user_id' => \Yii::$app->user->identity->id]);
        if($model){
            $model->delete();
            $user_info->num_of_active_adverts = $user_info->num_of_active_adverts - 1;
            $user_info->save();
        }
        \Yii::$app->session->setFlash('info', 'Объявление удалено');
        return $this->redirect(['cabinet/show-my-adverts']);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserInfo::find()->where(['user_id' => \Yii::$app->user->identity->id]),
        ]);

        if (\Yii::$app->user->isGuest) {
            \Yii::$app->session->setFlash('error', 'Выполните вход!!!');
            return $this->redirect('site/index');
        }
        return $this->render('index', compact('dataProvider'));
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionRedact()
    {
        $user_model = User::find()->where(['id' => \Yii::$app->user->identity->id])->one();
        $info_model = UserInfo::find()->where(['user_id' => \Yii::$app->user->identity->id])->one();
        if ($user_model->load(\Yii::$app->request->post()) && $user_model->validate() && $info_model->load(\Yii::$app->request->post()) && $info_model->validate()) {
            \Yii::$app->security->generatePasswordHash($user_model->password);
            $user_model->save();
            $info_model->save();
            \Yii::$app->session->setFlash('info', 'Данные сохранены');
            return $this->refresh();

        }
        return $this->render('redact', compact('user_model', 'info_model'));
    }

    public function actionChangePassword()
    {
        $user = User::findOne(\Yii::$app->user->identity->id);
        $model = new ChangePasswordForm($user);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user->password = \Yii::$app->security->generatePasswordHash($model->newPassword);
            $user->save();
            \Yii::$app->session->setFlash('info', 'Данные сохранены');
            return $this->redirect('cabinet/index');

        }

        return $this->render('change-password', compact('model'));
    }

    public function actionShowMyAdverts()
    {
        $query = Advert::find()->where(['user_id' => \Yii::$app->user->identity->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('show-my-adverts', compact('dataProvider'));
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

}
