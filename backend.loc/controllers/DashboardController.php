<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class DashboardController extends Controller
{

    public $layout = 'dashboard';

    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];

    }

    public function actionIndex()
    {

        return $this->redirect(
            Yii::$app->urlManager->baseUrl.'/dashboard/login',
            301
        );

    }

    public function actionLogin()
    {

        if (empty(Yii::$app->user->id)) return $this->render('login');
        else return $this->redirect(
            Yii::$app->urlManager->baseUrl.'/dashboard/main',
            301
        );

    }

    public function actionLogout()
    {

        if (!empty(Yii::$app->user->id)) Yii::$app->user->logout();

        return $this->actionLogin();

    }

    public function actionMain()
    {

        if (empty(Yii::$app->user->id)) {

            $error_text = $this->authorizeUser();

            if (empty($error_text)) return $this->render('main');
            else return $this->render('login', [
                'message' => [
                    'type' => 'danger',
                    'text' => $error_text
                ]
            ]);

        } else return $this->render('main');

    }

    protected function authorizeUser() : string
    {

        $email = Yii::$app->request->post('email');
        $password = Yii::$app->request->post('password');

        $error_text = '';

        if (empty($email) ||
            empty($password)) $error_text = 'Пожалуйста, введите e-mail и пароль для авторизации.';
        else {

            $user = User::findByEmail($email);

            if ($user instanceof User) {

                if (Yii::$app->getSecurity()->validatePassword(
                    $password,
                    $user->password_hash
                    )) Yii::$app->user->login($user);
                else $error_text = 'Неверный пароль';

            } else $error_text = 'Пользователь с указанным e-mail не найден.';

        }

        return $error_text;

    }

}
