<?php
echo \ramosisw\CImaterial\widgets\Menu::widget([
    'options' => ['class' => 'nav'],
    'items' => [
        ['label' => 'Home', 'url' => ['admin/site/index'], 'icon' => 'dashboard'],
    ],
]);