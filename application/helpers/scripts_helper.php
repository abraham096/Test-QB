<?php

function css()
{
    return '
    <link href="css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="css/ColorLib/main.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    ';
}

function Centrar()
{
    return '
        <style>
            .center {
                width: 70%;
                margin: auto;
                padding: 10px;
            }
        </style>
    ';
}

function js()
{
    return '
        <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    ';
}

function SoloNumerosJS()
{
    return '
    <script>
        $("#numero").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
    
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        </script>
    ';
}
