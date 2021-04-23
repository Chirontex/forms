<?php

use yii\helpers\Html;

$this->title = 'Пожалуйста, авторизуйтесь';

?>
<link rel="stylesheet" href="css/signin.css?v=0.0.2">
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
    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Пожалуйста, авторизуйтесь</h1>
        <div>
            <input type="email" class="form-control" name="input" placeholder="e-mail" required="true">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="пароль" required="true">
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" value="true"> Запомнить меня
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
    </form>
</main>
