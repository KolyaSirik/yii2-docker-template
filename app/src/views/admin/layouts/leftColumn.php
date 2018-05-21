<?php
echo \ramosisw\CImaterial\widgets\Menu::widget([
    'options' => ['class' => 'nav'],
    'itemOptions' => ['class' => 'nav-item'],
    'items' => [
        ['label' => 'Home', 'url' => ['admin/site/index'], 'icon' => 'dashboard'],
    ],
]);