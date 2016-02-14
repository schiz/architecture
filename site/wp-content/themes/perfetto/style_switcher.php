<style type="text/css">
        /* Settings */
    .settings {
        margin-top: -15px;
        position: fixed;
        top: 50%;
        left: 0px;
        z-index: 9999;
    }
    .settings .btn-settings {
        width: 50px;
        height: 50px;
        background: #333;
        opacity: 0.25;
        display: block;
        transition: all linear 0.15s;
        -ms-transition: all linear 0.15s;
        -moz-transition: all linear 0.15s;
        -webkit-transition: all linear 0.15s;
        -o-transition: all linear 0.15s;
    }
    .settings .btn-settings:hover {
        margin-top: -25px;
        padding: 25px;
        opacity: 1;
    }
    .settings .btn-settings i {
        margin: 18px;
    }
    .settings-cont h4 {
        font-weight: 400;
    }
    .settings-cont ul {
        margin: 0px;
    }
    .settings-cont .inline li {
        margin: 0px;
        padding: 0px;
    }
    .settings-cont li a span {
        display: none;
    }
    .settings-cont li a {
        width: 30px;
        height: 30px;
        opacity: 1;
        display: block;
        transition: all linear 0.15s;
        -ms-transition: all linear 0.15s;
        -moz-transition: all linear 0.15s;
        -webkit-transition: all linear 0.15s;
        -o-transition: all linear 0.15s;
    }
    .settings-cont li a:hover {
        opacity: 0.5;
    }
    .settings-cont li.bordered a {
        padding: 0px 9px;
        width: auto;
        height: 28px;
        border: 1px solid #E5E5E5;
        line-height: 28px;
        display: inline-block;
    }
    .settings-cont li.active a, .settings-cont li.bordered.active a {
        border: 5px solid #000;
    }
    .settings-cont li.dark-grey a {
        background: #333;
    }
    .settings-cont li.purple a {
        background: #549;
    }
    .settings-cont li.violet a {
        background: #C06;
    }
    .settings-cont li.dark-red a {
        background: #C30;
    }
    .settings-cont li.orange a {
        background: #F90;
    }
    .settings-cont li.deep-yellow a {
        background: #FC0;
    }
    .settings-cont li.gold a {
        background: #C90;
    }
    .settings-cont li.olive a {
        background: #880;
    }
    .settings-cont li.acid-green a {
        background: #9C0;
    }
    .settings-cont li.aqua-green a {
        background: #0B8;
    }
    .settings-cont li.water a {
        background: #09C;
    }
    .settings-cont li.sky a {
        background: #7BF;
    }
    .settings-cont hr {
        margin: 19px 0px;
    }
</style>
<script type="text/javascript">
jQuery(document).ready(function(){
    $ = jQuery;
    $("#settingsColor ul a").click(function () {
        $this = $(this);
        $this.parent().addClass("active").siblings().removeClass("active");
    });
    $('#settingsColor ul.change-navbar a').click(function () {
        var name = $(this).attr('name');
        if (name == "navbar-static")
            $(".navbar").removeAttr("id");
        else
            $(".navbar").attr("id", "nav-follow");
        return false;
    });
    $('#settingsColor ul.change-color a').click(function () {
        var filename = $(this).parent().data('class') + ".css";
        $('#colorChanger').attr('href', '<?php echo get_template_directory_uri(); ?>/css/colors/' + filename)
        return false;
    });
    $('#settingsColor ul.change-layout a').click(function () {
        var className = $(this).attr('name');
        if (className === 'wide') {
            $('.change-bg').hide();
            $('body').removeClass('boxed');
            $('body').css('background', 'none').css("background-color", "#f9f9f9");
        } else if (className === 'boxed') {
            $('body').addClass('boxed');
            $('.change-bg').show();
        }
        return false;
    });
    $('#settingsColor ul.change-bg a').click(function () {
        var img = $(this).find('img').attr('src');
        $('body').css('background', 'url(' + img + ')');
        return false;
    });
});
</script>

<div class="settings"><a href="#settingsColor" class="btn-settings" data-toggle="modal"><i class="icon-cog icon-white"></i></a></div>
<div id="settingsColor" class="modal hide fade settings-cont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Настройте шаблон</h3>
    </div>
    <div class="modal-body">
        <div style="width: 50%; float: left;">
            <h4 class="half-margin">Панель навигации</h4>
            <ul class="inline change-navbar">
                <li class="bordered"><a href="#" name="navbar-static">Статичная</a></li>
                <li class="bordered"><a href="#" name="navbar-fixed">Фиксированная</a></li>
            </ul>
        </div>
        <div style="width: 50%; float: right;">
            <h4 class="half-margin">Изменить внешний вид</h4>
            <ul class="inline change-layout">
                <li class="bordered"><a href="#" name="wide">Широкий</a></li>
                <li class="bordered"><a href="#" name="boxed">В блоке</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <hr class="change-bg" style="display: block;" />
        <h4 class="half-margin change-bg" style="display: block;">Сменить фон</h4>
        <ul class="inline change-bg" style="display: block;">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/bar-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/cross-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/diag-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/grain-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/paper-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/plaster-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/sand-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/square-bg.png" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/color-bg.jpg" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/mix-bg.jpg" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/row-bg.jpg" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg/parquet-bg.jpg" /></a></li>
        </ul>
        <div class="clearfix"></div>
        <hr />
        <h4 class="half-margin">Сменить цвет</h4>
        <ul class="inline change-color">
            <li data-class="dark-grey" class="dark-grey"><a href="#"><span>dark-grey</span></a></li>
            <li data-class="purple" class="purple"><a href="#"><span>purple</span></a></li>
            <li data-class="violet" class="violet"><a href="#"><span>violet</span></a></li>
            <li data-class="dark-red" class="dark-red"><a href="#"><span>dark-red</span></a></li>
            <li data-class="orange" class="orange"><a href="#"><span>orange</span></a></li>
            <li data-class="deep-yellow" class="deep-yellow"><a href="#"><span>deep-yellow</span></a></li>
            <li data-class="gold" class="gold"><a href="#"><span>gold</span></a></li>
            <li data-class="olive" class="olive"><a href="#"><span>olive</span></a></li>
            <li data-class="acid-green" class="acid-green"><a href="#"><span>acid-green</span></a></li>
            <li data-class="aqua-green" class="aqua-green"><a href="#"><span>aqua-green</span></a></li>
            <li data-class="water" class="water"><a href="#"><span>water</span></a></li>
            <li data-class="sky" class="sky"><a href="#"><span>sky</span></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
    </div>
</div>