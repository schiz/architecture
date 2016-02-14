<!--<div class="row">-->
<!--    <div class="span12">-->

        <div class="slides ">
            <?php
            $slides = ot_get_option('home_slider');
            if( $slides ) :
                foreach ( $slides as $slide )
                {
                    ?>
                    <div>
                        <a href="#"><img src="<?php echo $slide['img']; ?>" alt=""/></a>
                        <div class="detail">
                            <h3><a href="#"><?php echo $slide['title']; ?></a></h3>
                            <?php echo $slide['content']; ?>
                        </div>
                    </div>
                <?php
                }
            endif;
            ?>
        </div>

<!--    </div>-->
<!--</div>-->
<!---->
<!--<hr />-->