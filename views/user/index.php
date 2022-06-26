<?php

/** @var yii\web\View $this */

$this->title = 'Организации';
?>
<div class="site-organization">

    <div class="body-content">

        <div class="row">
            <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Наименование</th>
                      <th scope="col">ИНН</th>
                      <th scope="col">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                    <? foreach($model AS $element):?>
                        <tr>
                          <th scope="row"><?=$element->uid?></th>
                          <td><?=$element->full_name?></td>
                          <td><?=$element->inn?></td>
                          <td><a href="/user/organization-card?uid=<?=$element->uid?>">Карточка организации</a></td>
                        </tr>
                    <? endforeach;?>
                  </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
