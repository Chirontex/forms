<?php

use yii\helpers\Html;

$this->title = 'Пожалуйста, авторизуйтесь';

?>
<link rel="stylesheet" href="/css/login.css?v=0.0.3">
<main class="form-signin text-center">
<?php

if (isset($message)) {

?>
    <div class="alert alert-<?= Html::encode($message['type']) ?>" role="alert">
        <?= Html::encode($message['text']) ?>
    </div>
<?php

}

?>
    <form action="/dashboard/main" method="post">
        <h1 class="h3 mb-3 fw-normal">Пожалуйста, авторизуйтесь</h1>
        <div>
            <input type="email" class="form-control" name="loginEmail" placeholder="e-mail" required="true">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="loginPassword" placeholder="пароль" required="true">
        </div>
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
    </form>
</main>
