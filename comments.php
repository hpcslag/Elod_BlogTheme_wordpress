<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
<script language="JavaScript">
function onClickDiv(DivId)
{
  if(document.getElementById(DivId).style.display=='none')
   { document.getElementById(DivId).style.display=''; }
   else
   { document.getElementById(DivId).style.display='none'; }
   
}
</script>
<?php
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Bonvolu ne senpripense 、 請不要亂來 、 Пожалуйста, воздержитесь от сыпи 、 Bitte sehen Sie von Hautausschlag 、 発疹はご遠慮ください !!');
 
    if ( post_password_required() ) { ?>
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>

        <p class="nocomments">本文需要密碼才能查看，請輸入密碼。</p>
    <?php
        return;
    }
?>
<?php if ( have_comments() ) : ?>
 
<?php else :  ?>
 
<?php endif; ?>
<div style="border-bottom: 1px solid #EEE;"><br><br></div>
<br>
<br>
<p style="color: #f60;font-size: 42px;font-weight: 300;" id="res_title">Comments  <a class="btn btn-primary pull-right" href="javascript:onClickDiv('contact')">點擊評論</a></p><br>

<ol class="commentlist">
    <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ol>
<div class="clear"></div>
<div class="comment-navigation">
    <div class="older"><?php previous_comments_link() ?></div>
    <div class="newer"><?php next_comments_link() ?></div>
</div>
<LI class="lx_nr flipInX" id="contact" style="display:none; list-style-type: none;">
<?php if ( comments_open() ) : ?>
 <?php else : ?>
    <p class="nocomments">コメント無し 、 Без комментариев 、 neniu Komento!!</p>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<?php endif; ?>
<div id="respond">
<h3 id="res_title"><?php comment_form_title( '留下迴響', '回應給  %s' ); ?></h3>
<div class="cancel-comment-reply">
    <?php cancel_comment_reply_link(); ?>
</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p> 你需要先  <a href="<?php echo wp_login_url( get_permalink() ); ?>">登入 </a> 才能留下迴響 。</p>
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
<?php if ( is_user_logged_in() ) : ?>
 
<p>登入為 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
<?php else : ?>
 
<p><input type="text" placeholder="您的名子" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> style="height: 40px;
font-size: 20; color:#1278b3;" /><?php if ($req) echo "(必填)"; ?></p>
<p><input placeholder="電子信箱" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> style="height: 40px;
font-size: 20; color:#76b900;" />
<?php if ($req) echo "(必填)"; ?></p> 
<p><input type="text" name="url" placeholder="網站" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" style="height: 40px;
font-size: 20;" tabindex="3" />
<label for="url"></label></p>
 
<?php endif; ?>
<p><small><strong>小提示:<!--XHTML:--></strong>註冊信箱有Gravatar 可以顯示大頭貼!<!--你可以使用這些標籤: --><code><!--<?php echo allowed_tags(); ?>--></code></small></p>
 
<p><textarea name="comment" placeholder="寫下您的評論...." id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
 
<p><input name="submit" class="btn btn-primary pull-right" type="submit" id="submit" tabindex="5" value="送出回覆" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
</li>