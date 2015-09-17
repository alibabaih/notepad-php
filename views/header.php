<!DOCTYPE html>
<head>
    <meta charset="utf-8">
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <title>Notepad — Liwest Nizhny Novgorod</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- jQuery Google CDN -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <script src="<?php echo URL; ?>assets/js/moment-with-locales.js"></script>



    <!-- App stylesheets -->

<!--  salvattore grid  -->
    <style>


        @media screen and (min-width: 1px) and (max-width: 600px){
            #grid[data-columns]::before {
                content: '1 .col .s12';
            }
        }
        @media screen and (min-width:601px) and (max-width: 992px){
            #grid[data-columns]::before {
                content: '3 .col m4';
            }
        }
        @media screen and (min-width:993px) and (max-width: 9999px){
            #grid[data-columns]::before {
                content: '4 .col .l3';
            }
        }
    </style>




</head>

