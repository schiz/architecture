<?php
$color = ot_get_option('scheme');
if( $color )
{
?>
    <style type="text/css">
        @charset "utf-8";

        .btn-primary, .single-post p:first-letter, .logo a span, .progress .bar, .settings .btn-settings:hover {
            background: <?php echo $color; ?>;
        }
        .slides:hover .slidesjs-play, a.fancybox span.view {
            background: rgba(-, -, -, 0.5);
        }
        .navbar .navbar-inner .nav li:hover, .navbar .navbar-inner .nav li a:hover, .navbar .navbar-inner .nav li.active, .navbar .navbar-inner .nav li.active a {
            border-bottom-color: <?php echo $color; ?>;
        }
        a, .thumbnails li h3 a, .breadcrumb a, #masonry .single h3 a, blockquote, .lead, .tooltip-hover, .popover-hover, .accordion-heading .accordion-toggle, .nav-tabs li a:hover, .nav-tabs li a:focus, .nav-tabs .dropdown-menu li a:hover, .nav-tabs .dropdown.active.open .dropdown-menu li a:hover, .nav-tabs .dropdown a.dropdown-toggle, .navbar .navbar-inner .nav li:hover, .navbar .navbar-inner .nav li a:hover, .navbar .navbar-inner .nav li.active, .navbar .navbar-inner .nav li.active a, .media-list .media .media-body h4 {
            color: <?php echo $color; ?>;
        }
        .navbar .navbar-inner .nav li a:hover, .navbar .navbar-inner .nav li.active, .navbar .navbar-inner .nav li.active a{
            border-left-color: <?php echo $color; ?>;
        }
    </style>
<?php
}
?>