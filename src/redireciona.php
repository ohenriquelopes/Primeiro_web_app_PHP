<?php

function redireciona(string $url): void {
    //redirecionar
    header("Location: $url");
    die();
}