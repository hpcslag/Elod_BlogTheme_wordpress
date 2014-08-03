<?
require_once( get_stylesheet_directory() . '/functions/theme-function.php'); 
require_once( get_stylesheet_directory() . '/functions/theme-options.php' );
add_theme_support( 'post-thumbnails' );
function mytheme_comment($comment, $args, $depth){
$GLOBALS['comment'] = $comment;
?>
<li style="list-style-type: none;" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
 
        <div class="comment-author vcard">
        <?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
        <?php printf(__('<span style="font-size: 20px;text-indent: 5px; color: #f60;">%s</span>'), get_comment_author_link()) ?>  <?php printf(__('%1$s (%2$s)'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?>
    </div>
 

        <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment_approved"><?php _e('Your comment is awaiting moderation.') ?></em>
        <?php endif; ?>
        <div style="border-radius: 0;margin-left: 76px;position: relative;
padding: 15px 15px 6px 15px;
border-radius: 0px;
box-shadow: none;
margin: -30px 0 9px 84px;
font-size: 14px;
line-height: 18px;min-height: 20px;
margin-bottom: 20px;
background-color: #fff;
border: 1px solid #e3e3e3;">
        <?php comment_text() ?><div class="reply" align="right">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div></div>
        
    </div>
<? }

//Fashon
function pagenavi($range = 5){
  global $paged, $wp_query;
  if ( !$max_page ) {
    $max_page = $wp_query->max_num_pages;
  }
  if($max_page > 1){
    if(!$paged){
      $paged = 1;
    }
echo '<div class="paviinfo">第'.$paged.'頁、共'.$max_page.'頁</div>';
    if($paged != 1){
      echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='首頁'>首頁</a>";
    }
    previous_posts_link(' « ');
    if($max_page > $range){
      if($paged < $range){
        for($i = 1; $i <= ($range + 1); $i++){
          echo "<div class=".'"spagenum"'."><a title=".'"第'.$i.'頁"'. " href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo " class='current'";
          echo ">$i</a>";
        }
      }
      elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){
          echo ",<a title=".'"第'.$i.'頁"'. " href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo " class=''";
          echo ">$i</a>";
        }
      }
      elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
          echo ",<a title=".'"第'.$i.'頁"'. " href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo " class=''";
          echo ">$i</a>";
        }
      }
    }
    else{
      for($i = 1; $i <= $max_page; $i++){
        echo "<a title=".'"第'.$i.'頁"'. " href='" . get_pagenum_link($i) ."'";
        if($i==$paged) echo " class=''";
        echo ">$i</a>,";
      }
    }
    next_posts_link(' » ');
    if($paged != $max_page){
      echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='最後一頁'>最後一頁</a>";
    }
  }
}
?>
<?php
function native_pagenavi(){

    global $wp_query, $wp_rewrite;           
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
      'base' => @add_query_arg('page','%#%'),
      'format' => '',
      'total' => $wp_query->max_num_pages,
      'current' => $current,
      'prev_text' => 'Prev',
      'next_text' => 'Next'
    );

     if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

     if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));

    echo paginate_links($pagination);
} ?>
