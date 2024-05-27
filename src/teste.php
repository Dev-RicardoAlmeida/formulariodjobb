<?php

foreach ($_POST as $item) {
    echo("$item-0-0") . "<br>";
}

foreach ($_REQUEST as $item) {
    echo("$item") . "<br>";
}