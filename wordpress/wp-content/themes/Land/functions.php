<?php

//添加自定义登录CSS
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}
add_action('login_head', 'custom_login');




add_theme_support('woocommerce');
// Customize your functions
function mail_smtp( $phpmailer ){
	$phpmailer->From = "info@iconntechs.com"; //发件人
	$phpmailer->FromName = "ICONNETCHS"; //发件人昵称
	$phpmailer->Host = "smtp.exmail.qq.com"; //SMTP服务器地址(比如QQ是smtp.qq.com,腾讯企业邮箱是smtp.exmail.qq.com,阿里云是smtp.域名,其他自行咨询邮件服务商)
	$phpmailer->Port = 25; //SMTP端口，常用的有25、465、587，SSL加密连接端口：465或587,qq是25,qq企业邮箱是465
	$phpmailer->SMTPSecure = ""; //SMTP加密方式，常用的有ssl/tls,一般25端口不填，端口465天ssl
	$phpmailer->Username = "info@iconntechs.com"; //邮箱帐号，一般和发件人相同
	$phpmailer->Password = 'BoRong2016'; //邮箱密码
	$phpmailer->IsSMTP(); //使用SMTP发送
	$phpmailer->SMTPAuth = true; //启用SMTPAuth服务
}
add_action('phpmailer_init','mail_smtp');

//取得文章的阅读次数
function post_views($before = 'view ', $after = ' times', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
function record_visitors()
{
    if (is_singular()) {
      global $post;
      $post_ID = $post->ID;
      if($post_ID) {
          $post_views = (int)get_post_meta($post_ID, 'views', true);
          if(!update_post_meta($post_ID, 'views', ($post_views+1))) {
            add_post_meta($post_ID, 'views', 1, true);
          }
      }
    }
}
add_action('get_header', 'record_visitors');

add_action( 'widgets_init', 'maxstore_widgets_init' );

function maxstore_widgets_init() {
        register_sidebar(
            array(
            'name' => __( 'Right Sidebar', 'maxstore' ),
            'id' => 'maxstore-right-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));        
} 

function dmeng_email_login_authenticate( $user, $username, $password ) {
if ( is_a( $user, 'WP_User' ) ){
return $user;
}
if ( !empty( $username ) && is_email( $username ) ) {
$username = str_replace( '&', '&amp;', stripslashes( $username ) );
$user = get_user_by( 'email', $username );
if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status )
$username = $user->user_login;
}
return wp_authenticate_username_password( null, $username, $password );
}
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'dmeng_email_login_authenticate', 20, 3 );

?>