<?php

function renderHead(string $title, string $css){
    $icon = ICON_PATH;
    
    ?> 
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/x-icon' href='<?=$icon?>'>
    <link rel='stylesheet' href='<?=$css?>'>
    <title> <?=$title?> </title>
    </head>
    <body>

<?php
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}