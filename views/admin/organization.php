<?php

/** @var yii\web\View $this */

$this->title = 'Организация';
?>
<div class="site-organization">

    <div class="body-content">

        <div class="row">
            <div class="col-12">
                <?php
                    foreach($model AS $element){
                        print_r($element);
                    }
                ?>
            </div>
        </div>

    </div>
</div>
