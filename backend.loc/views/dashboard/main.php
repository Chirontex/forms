<?php

use yii\helpers\Html;

$this->title = 'Main';

?>
<div class="container">
    <div style="margin-top: 1rem; margin-bottom: 2rem;">
<?php

if (Yii::$app->request->get('assigned') === 'me') {

?>
        <a href="/dashboard/main">все</a> 
        | мои
<?php

} else {

?>
        все | 
        <a href="/dashboard/main?assigned=me">мои</a>
<?php

}

?>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Сообщение</th>
                <th>Назначено</th>
            </tr>
        </thead>
<?php

if (empty($forms)) {

?>
            <p style="font-style: italic;">
                Нет форм.
            </p>
<?php

} else {

?>
        <tbody>
<?php

    foreach ($forms as $form) {

?>
            <tr>
                <td><?= Html::encode($form->first_name) ?></td>
                <td><?= Html::encode($form->last_name) ?></td>
                <td><?= Html::encode($form->email) ?></td>
                <td><?= Html::encode($form->phone) ?></td>
                <td><?= Html::encode($form->message) ?></td>
                <td>
                <?= empty($form->assigned_to) ?
                    '(нет)' : Html::encode($form->assigned_to->email) ?>
                </td>
            </tr>
<?php

    }

?>
        </tbody>
<?php

}

?>
    </table>
</div>