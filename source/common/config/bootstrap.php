<?php

function dump($expression, $die = false) {
    echo "<PRE>";
    var_dump($expression);
    echo "</PRE>";
    !$die or die();
}

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
