<?php
$themename = "Tesdbrne UI";
$shortname = "Tesdbrne_";
?>
<?
$options =
array (
    array( "type" => "section",
           "desc" => '<div class="op_section">',
           "name" => "圖標"
         ),
    array( "name" => "網站 Favicon",
           "id" => $shortname."favicon",
           "type" => "upload",
           "std" => "",
           "desc" => '就是網址列前面顯示的小圖示。'
         ),
    array( "name" => "Logo 圖片",
           "id" => $shortname."logo",
           "type" => "upload",
           "std" => "",
           "desc" => "請輸入 LOGO 網址 或 點擊上傳圖片加入。"
         ),
    array( "type" => "section",
           "desc" => '</div><div class="op_section">',
           "name" => "雜項設定"
         ),
    array( "name" => "色系",
           "id" => $shortname."color",
           "type" => "select",
           "desc" => "網頁色系",
           "options" => array("blue", "red", "green"),
         ),
    array( "name" => "啟用作者資訊",
           "id" => $shortname."author",
           "type" => "checkbox",
           "std" => "",
           "desc" => "啟用後會在文章下方及作者文章列表上方顯示作者資訊，內容來自帳號個人資訊，請至帳號 -> 個人資訊填寫。"
         ),
    array( "name" => "自定義CSS",
           "id" => $shortname."custom_css",
           "type" => "textarea",
           "std" => "",
           "desc" => "可輸入CSS語法"
         ),
    array( "name" => "統計分析相關程式碼",
           "id" => $shortname."analytics",
           "type" => "textarea",
           "std" => "",
           "desc" => "可放入相關統計或需要放置在 Footer區塊  的分析代碼"
         ),
    array( "name" => "網站底部資訊",
           "id" => $shortname."footer_text",
           "type" => "text",
           "std" => "",
           "desc" => "顯示於網頁最底部"
         ),
    array( "type" => "section",
           "desc" => '</div><div class="op_section">',
           "name" => "廣告"
         ),
    array( "name" => "文章廣告 1",
           "id" => $shortname."gad1",
           "type" => "textarea",
           "std" => "",
           "desc" => "可放入廣告代碼"
         ),
 
    array( "name" => "文章廣告 2",
           "id" => $shortname."gad2",
           "type" => "textarea",
           "std" => "",
           "desc" => "可放入廣告代碼"
         ),
 
    array( "type" => "section",
           "desc" => '</div>',
         )
    );
?>
<?
 
global $options, $value, $shortname;
 
function mytheme_add_admin() {
global $themename, $shortname, $options;
       $filename = basename(__FILE__);
 
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
            foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ){
                    update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
                } else {
                    delete_option( $value['id'] );
                }
            }
            header("Location: admin.php?page=$filename&saved=true");
            die;
        } else if ( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
            delete_option( $value['id'] ); }
            header("Location: admin.php?page=$filename&reset=true");
            die;
        }
    }
    add_menu_page($themename.' 佈景設定選項', $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}
function mytheme_add_init() {
global $themename, $shortname, $options;
    $theme_dir = get_bloginfo('template_directory');
    wp_enqueue_style("style", $theme_dir."/functions/css/op_style.css", false, "1.0", "all");
    wp_enqueue_style("jquery", "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, "1.7.1", "all");
 
}
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
<?
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_bloginfo('template_directory').'/functions/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
 
if (isset($_GET['page']) && $_GET['page'] == 'theme-options.php') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}
?>
<?
function mytheme_admin() {
global $themename, $shortname, $options;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' 佈景選項<b>儲存</b>成功。</p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' 佈景選項<b>重置</b>成功。</p></div>';
?>
<div class="op_wrapper">
    <h2><?php echo $themename; ?> 佈景設定選項</h2>
 
    <div class="op_content">
        <form method="post" class="op_form" enctype="multipart/form-data">
 
        <?php
            foreach ($options as $value) {
                switch ( $value['type'] ) {
                case 'section':
        ?>
                <?php echo $value['desc']; ?>
                <? if($value['name']){?>
                    <div class="section_title">
                        <span><?php echo $value['name']; ?></span>
                    </div>
                <? } ?>
				  <?php   break;
                case 'upload':
        ?>
<div class="op_input op_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 
    <input id="<?php echo $value['id']; ?>" class="upload_input" type="text" size="90" name="<?php echo $value['id']; ?>" value="<?php echo(get_option($value['id'])); ?>" />
    <div class="upload_button">
        <input class="upload_image_button" id="upload_image_button" type="button" value="上傳圖片" />
    </div>
    <?php $preview = get_option($value['id']);if ($preview) { ?>
    <div class="upload_preview">右方為你所上傳的圖片：</div>
        <img src="<?php echo(get_option($value['id'])); ?>" class="up_img">
    <?php } ?>
    <small><?php echo $value['desc']; ?></small>
    <div class="clear"></div>
 
</div>
 <?php   break;
                case 'text':
        ?>
 
<div class="op_input op_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
    value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 
    <small><?php echo $value['desc']; ?></small>
 
    <div class="clear"></div>
 
</div>
 <?php
                break;
                case 'textarea':
        ?>
 
<div class="op_input op_textarea">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
    <small><?php echo $value['desc']; ?></small>
 
    <div class="clear"></div>
 
</div>
    <?php
                break;
                case 'select':
        ?>
 
<div class="op_input op_select">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
        <?php foreach ($value['options'] as $option) { ?>
            <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
        <?php } ?>
    </select>
 
    <small><?php echo $value['desc']; ?></small>
 
    <div class="clear"></div>
</div>
<?php
break;
 
case "checkbox":
?>
 
<div class="op_input op_checkbox">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 
    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
 
    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
 
    <small><?php echo $value['desc']; ?></small>
 
    <div class="clear"></div>
</div>
 
<?php break;
 
}
}
?>
<input type="hidden" name="action" value="save" />
    <input name="save" class="save" type="submit" value="儲存變更" />
</form>
<form method="post">
    <input name="reset" class="reset" type="submit" value="全部重置" />
    <input type="hidden" name="action" value="reset" />
</form>
</div>
</div>
<?php
}
?>