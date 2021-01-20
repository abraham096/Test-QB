<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/ITH.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en Login</title>
</head>

<body>
    <?= $alerts ?>
    <div id="popup" style="display: none;">
        <div class="content-popup">
            <div class="close"><a href="#" id="close"><img src="images/remove.png" /></a></div>
            <div style="text-align: center">
                <h2 style="text-align: left">Los datos ingresados, son incorrectos</h2>
                <img src="images/cancel.png" alt="" height="42" width="42">
                <p style="font-size: 12;font-weight: bolder"><br>
                <?= $msg ?></p>
                <div style="float:left; width:100%;">
                </div>
            </div>
        </div>
    </div>
    <div class="popup-overlay"></div>
</body>

<script>
    window.onload = function(e) {
        $(document).ready(function() {
            $('#popup').fadeIn('slow');
            $('.popup-overlay').fadeIn('slow');
            $('.popup-overlay').height($(window).height());

            $('#close').on('click', function() {
                $('#popup').fadeOut('slow');
                $('.popup-overlay').fadeOut('slow');

                $(location).attr('href', 'dashboard');
                //return false;
            });
        });
    }
</script>
</html>