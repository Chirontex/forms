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

            if (empty($error_text)) return $this->render('main', [
                'forms' => $this->selectForms()
            ]);
            else return $this->render('login', [
                'message' => [
                    'type' => 'danger',
                    'text' => $error_text
                ]
            ]);

        } else return $this->render('main', [
            'forms' => $this->selectForms()
        ]);

    }

    protected function authorizeUser() : string
    {

        $email = Yii::$app->request->post('loginEmail');
        $password = Yii::$app->request->post('loginPassword');

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

    protected function selectForms()
    {

        $whose = Yii::$app->request->get('whose');

        $filter = [
            'first_name' => Yii::$app->request->post('firstName'),
            'last_name' => Yii::$app->request->post('lastName'),
            'email' => Yii::$app->request->post('email'),
            'phone' => Yii::$app->request->post('phone'),
            'message' => Yii::$app->request->post('message'),
            'assigned' => Yii::$app->request->post('assignedTo'),
        ];

        $order = [
            'column' => Yii::$app->request->post('order_column'),
            'type' => Yii::$app->request->post('order_type')
        ];

        $query = "SELECT
                    t.first_name,
                    t.last_name,
                    t.email,
                    t.phone,
                    t.message,
                    t1.email AS assigned
                    FROM `forms` AS t
                    LEFT JOIN `users` AS t1
                    ON t.assigned_to = t1.id";

        $where = "";

        $bind = [];

        if ($whose ===
            'mine') $where .= " WHERE t.assigned_to = '".Yii::$app->user->id."'";

        foreach ($filter as $key => $value) {

            if (!empty($value)) {

                if (empty($where)) $where = " WHERE";
                else $where .= " AND";

                if ($key === 'assigned') $where .= " t1.email";
                else $where .= " t.".$key;

                $where .= " LIKE :".$key;

                $bind[':'.$key] = "%".$value."%";

            }

        }

        if (!empty($order['column']) && !empty($order['type'])) {

            $where .= " ORDER BY";

            if ($order['column'] === 'assigned') $where .= " t1.email";
            else $where .= " t.".$order['column'];

            if ($order['type'] === 'DESC') $where .= " DESC";
            else $where .= " ASC";

        }

        return Yii::$app->db
            ->createCommand($query.$where)
            ->bindValues($bind)
            ->queryAll();

    }

}
