
    </div>
    <!-- end of .container -->

</div>
<!-- end of .section -->


<?php
$banner = ot_get_option( 'footer_banner' );
if( $banner == "hide" || is_404() ){}
else
{
    get_template_part( 'inc/footer_banner' );
}
?>

<div class="section">
    <div class="container">

        <!-- footer -->
        <div class="row">
            <div class="span12">
                <div class="footer">
                    <hr />
                    <p class="text-center"><?php echo ot_get_option('footer-text');?></p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Go to top page -->
<div id="toTop" style="display: block">Вверх</div>

<?php wp_footer(); ?>

</body>
</html>