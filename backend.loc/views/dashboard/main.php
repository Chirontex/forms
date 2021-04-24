<?php

use yii\helpers\Html;

$this->title = 'Main';

?>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Сообщение</th>
                <th>Назначено, ID</th>
            </tr>
        </thead>
        <tbody>
<?php

if (empty($forms)) {

?>
            <p>В данный момент нет отправленных форм.</p>
<?php

} else {

    foreach ($forms as $form) {

?>
            <tr>
                <td><?= Html::encode($form->first_name) ?></td>
                <td><?= Html::encode($form->last_name) ?></td>
                <td><?= Html::encode($form->email) ?></td>
                <td><?= Html::encode($form->phone) ?></td>
                <td><?= Html::encode($form->message) ?></td>
                <td><?= Html::encode($form->assigned_to) ?></td>
            </tr>
<?php

    }

}

?>
        </tbody>
    </table>
</div>