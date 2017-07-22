<?php

//自定义评论结构
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;
   if(!$commentcount) {
       $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
       $cpp=get_option('comments_per_page');
       $commentcount = $cpp * $page;
    }
?>
<?php 
if (current_time('timestamp') - get_comment_time('U') < 518400 )//六天
{$cmt_time = human_time_diff( get_comment_time('U') , current_time('timestamp') ) . '前';}
else{$cmt_time = get_comment_date( 'Y/n/j' );};
 ;?>
<li class="comments" id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="touxiang">
       			<?php echo get_avatar( $comment, $size = '52'); ?>
            </div>
				<div style="margin-left: 94px;">
                	<?php comment_text() ?>
					<div class="date"> 
					<span class="name"><?php printf(__('%s'), get_comment_author_link()) ?>
						<?php if($comment->comment_parent){// 如果存在父级评论
							/*$comment_parent_href = get_comment_ID( $comment->comment_parent );
							$comment_parent = get_comment($comment->comment_parent);*/
						?>
						<!-- 回复 <a href="#comment- --><?php/* echo $comment_parent_href; */?><!--">--><?php/* echo $comment_parent->comment_author;*/?><!--</a>-->
						<?php }?>
						</span>
						<?php if(user_can($comment->user_id, 1)){echo "<span class='owner'>博主</span>";}; ?>
						<p><?php echo $cmt_time ;?></p>
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => "@Ta"))) ?>
					</div>
				</div>
                <div class="floor"><?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?></div>


    </div> 
<?php
}

//获取文章中的第一张图片
function catch_that_image() {
    $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
    if(empty($full_image_url)){ //定义默认图片
        $full_image_url = "/wp-content/themes/Clien/images/default.png";  //默认图片地址需自己设置
        return $full_image_url;
    }else{
        return $full_image_url[0];
    }
}

add_theme_support( "post-thumbnails" ); // 开启文章缩略图


/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='next'>"; 
        if( !$paged ){
            $paged = 1;
        }
        previous_posts_link("<div class='n_left'><i class='fa fa-chevron-left' aria-hidden='true'></i></div>");
        next_posts_link("<div class='n_right'><i class='fa fa-chevron-right' aria-hidden='true'></i></div>");
        echo "</div>";  
    }
}


//分页
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> <i class='fa fa-angle-double-left' aria-hidden='true'></i> </a>";}
	previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'><i class='fa fa-angle-double-right' aria-hidden='true' style='margin-right: 3px;margin-left: 1px;'></i></a>";}}
}


//禁止转义引号字符
remove_filter('the_content', 'wptexturize'); // 禁止英文引号转义为中文引号
remove_filter('the_content', 'balanceTags'); //禁止对标签自动校正


function pre_to_prettify($addClass){
    $replace = array(
        '<pre>' => '<pre class="prettyprint">',
        );
    $addClass = str_replace(array_keys($replace), $replace, $addClass);
    return $addClass;
}


//准许用户使用Email作为用户名登录 WordPress
function login_with_email_address($username) {
    $user = get_user_by_email($username);
    if(!empty($user->user_login))
        $username = $user->user_login;
    return $username;
}
add_action('wp_authenticate','login_with_email_address');


/*将WordPress 后台中的open-sans字体加载源从Google Fonts替换为360的CDN加载源。*/
 
function devework_replace_open_sans() {
	wp_deregister_style('open-sans');
	wp_register_style( 'open-sans', '//useso.com/' );
	wp_enqueue_style( 'open-sans');
}
add_action( 'wp_enqueue_scripts', 'devework_replace_open_sans' );
add_action('admin_enqueue_scripts', 'devework_replace_open_sans');


?>