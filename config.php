<?php

$mysql = new mysqli('localhost', 'root', '', 'blog');
$mysql->set_charset('utf8');



if($mysql == TRUE) {
    echo "Banco conectado";
} else {
    echo "Banco nao conectado";
}