<? get_header();?>

<? $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

<div class="img.bg" style="background-image:url(<?php echo $url; ?>);no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; max-width:100%; height:500px; padding: 0px 0;"></div>

<div class="col-full" style="margin-top: 60px;">

    <div id="content" class="col-left" style="margin: 40px auto 0 auto; width: 600px;

margin-top: 30px;"> 

	<?php while ( have_posts() ) : the_post(); ?>

        <article>

       <span class="entry-time" style="margin-bottom: 15px;

display: inline-block;

color: #888; font-size:18px;"><?php the_time('m/d , Y   l');?> / <a href="#" style="color: #22A2EB;">Plus / プラス / Plus- / плюс / plus / 加</a></span><br><br>

<p class="entry-title" style="font-family:'Droid Serif', '微軟正黑體', serif; font-size: 40px;"><?php the_title();?></p>

<br>

<div class="post-content" style="font: 16px/1.7em 'Droid Serif','微軟正黑體',sans-serif;">

    <?php the_content();?>

</div>

        </article>

        <? endwhile; ?>

        <br><br>

        <div style="border-bottom: 1px solid #EEE;"><br></div>

        <br><br>

        <div style="display: inline-block;font-family: 'Open Sans', sans-serif;"><img style="float: left;" class="profilePic img" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1/s160x160/1526961_637303969672868_1705979698_a.jpg" alt="Mac Taylor">

        <span style="font-size: 24px; color: #f60; margin: 0 0 0 15px;">MacTaylor</span><br><br><div style="position:relative; left:15px; margin: 0 0 0 15px; white-space: nowrap;">Kaohsiung · Chonsin Pro Team CEO<br><a style="color: #666;" href="http://www.chonsin168.com/CHONSIN">http://www.chonsin168.com/CHONSIN</a><br>Programmer works of C,PHP,JAVA,NETWORK. <br>I would like to know every thing about computers! and About Moral philosophy and aviation</div></div>

        <div id="comment" style="font-family: 'Open Sans','微軟正黑體', serif;">

            <?php comments_template();?>

        </div>    

        <br>

        <br>

        <br>

<div style="border-bottom: 1px solid #EEE;"></div>

    </div>

</div>



<? get_footer();?>