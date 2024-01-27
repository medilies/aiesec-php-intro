<?php

function redirect(string $path): void
{
    $path = '/'.trim($path, '/');
    
    header('Location: http://127.0.0.1:8000'.$path);
}