<? get_header();?>

</body>

<div class="img.bg" style="background-image:url(http://sphotos-g.ak.fbcdn.net/hphotos-ak-prn2/968897_552171714852761_1459822509_n.jpg);no-repeat center center fixed; 

  -webkit-background-size: cover;

  -moz-background-size: cover;

  -o-background-size: cover;

  background-size: cover; max-width:100%; height:500px; padding: 0px 0;"></div>

<div class="col-full">

    <div id="content" class="col-left" style="width: 600px;

margin-top: 26px;

margin: 40px auto 0 auto;">

<?php while ( have_posts() ) : the_post(); ?>

        <article style="border-bottom: 1px solid #EEE;">

<br><br>

                    <span class="entry-time" style="margin-bottom: 15px;

display: inline-block;

color: #888; font-size:18px;"><?php the_time('m/d , Y  l');?></span>

                    <header class="entry-header"><br>

                <p class="entry-title" style="font-family:'Droid Serif', '微軟正黑體', serif; font-size: 40px;"><a href="<?php the_permalink();?>" title="<? the_title();?>"><?php the_title();?></a></p>

                <div class="postmeta">

                </div>

            </header>

            <br>

            <div class="entry-content" style="font: 16px/1.7em 'Droid Serif','微軟正黑體',sans-serif;">

<?php the_content();?>

                <div class="clear"></div>

            </div>

          <br><br>

        </article>
<!--<?php native_pagenavi(); ?>-->
        <?php endwhile;?>

<?php wp_reset_query();?>

    </div>

</div>


<div class="pagination" align="center">
            <?php pagenavi();?>
</div>
<? get_footer();?>

<!--

<a class="btn btn-primary pull-right" href="javascript:onClickDiv('contact')">點擊影片</a>-->