<?php

use yii\helpers\Html;

$this->title = 'Формы';

$arrow_up = file_get_contents(Yii::$app->basePath.'/web/icons/arrow-up.svg');
$arrow_down = file_get_contents(Yii::$app->basePath.'/web/icons/arrow-down.svg');

?>
<link rel="stylesheet" href="/css/main.css?v=0.0.1">
<div class="container">
    <div style="margin-top: 1rem; margin-bottom: 2rem;">
<?php

if (Yii::$app->request->get('whose') === 'mine') {

?>
        <a href="/dashboard/main">все</a> 
        | мои
<?php

} else {

?>
        все | 
        <a href="/dashboard/main?whose=mine">мои</a>
<?php

}

?>
    </div>
    <form action="" method="post" id="filter">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'first_name', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'first_name', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    Имя
                </th>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'last_name', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'last_name', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    Фамилия
                </th>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'email', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'email', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    E-mail
                </th>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'phone', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'phone', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    Телефон
                </th>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'message', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'message', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    Сообщение
                </th>
                <th>
                    <div>
                        <span class="arrow" role="button" onclick="filter({column: 'assigned', type: 'DESC'});"><?= $arrow_up ?></span>
                        <span class="arrow" role="button" onclick="filter({column: 'assigned', type: 'ASC'});"><?= $arrow_down ?></span>
                    </div>
                    Назначено
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" id="firstName" class="form-control" value="<?= Html::encode(Yii::$app->request->post('firstName')) ?>">
                </td>
                <td>
                    <input type="text" id="lastName" class="form-control" value="<?= Html::encode(Yii::$app->request->post('lastName')) ?>">
                </td>
                <td>
                    <input type="email" id="email" class="form-control" value="<?= Html::encode(Yii::$app->request->post('email')) ?>">
                </td>
                <td>
                    <input type="text" id="phone" class="form-control" value="<?= Html::encode(Yii::$app->request->post('phone')) ?>">
                </td>
                <td>
                    <input type="text" id="message" class="form-control" value="<?= Html::encode(Yii::$app->request->post('message')) ?>">
                </td>
                <td>
                    <input type="text" id="assigned" class="form-control" value="<?= Html::encode(Yii::$app->request->post('assigned')) ?>">
                </td>
                <td>
                    <button class="btn btn-primary" onclick="filter();">Фильтр</button>
                </td>
            </tr>
<?php

if (!empty($forms)) {

    foreach ($forms as $form) {

?>
            <tr>
                <td><?= Html::encode($form['first_name']) ?></td>
                <td><?= Html::encode($form['last_name']) ?></td>
                <td><?= Html::encode($form['email']) ?></td>
                <td><?= Html::encode($form['phone']) ?></td>
                <td><?= Html::encode($form['message']) ?></td>
                <td>
                <?= empty($form['assigned']) ?
                    '(нет)' : Html::encode($form['assigned']) ?>
                </td>
                <td></td>
            </tr>
<?php

    }

}

?>
        </tbody>
    </table>
</div>
<script src="<?= Yii::$app->urlManager->baseUrl ?>/js/main.js?v=0.0.2"></script>