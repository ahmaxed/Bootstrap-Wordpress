<?php
$options = get_option('playbook');	

/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta() { 
	global $options
?>
<?php if ($options['mts_favicon'] != '') { ?>
<link rel="icon" href="<?php echo $options['mts_favicon']; ?>" type="image/x-icon" />
<?php } ?>
<!--iOS/android/handheld specific -->	
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ) {
	function mts_head() { 
	global $options
?>
<style type="text/css">
<?php if($options['mts_bg_color'] != '') { ?>
body {background-color:<?php echo $options['mts_bg_color']; ?>;}
<?php } ?>
<?php if ($options['mts_bg_pattern_upload'] != '') { ?>
body {background-image: url(<?php echo $options['mts_bg_pattern_upload']; ?>);}
<?php } ?>

<?php if ($options['mts_color_scheme'] != '') { ?>
.top .toplink,.flex-direction-nav .flex-prev,.flex-direction-nav .flex-next, #search-image, .nav-previous a,.nav-next a, .mts-subscribe input[type="submit"], .sbutton, .currenttext, .pagination a:hover {background-color:<?php echo $options['mts_color_scheme']; ?>; }
.currenttext, .pagination a:hover{ border:1px solid <?php echo $options['mts_color_scheme']; ?>;}
.related-posts a,.theauthor a,.single_post a, a:hover, .textwidget a, #commentform a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, footer .widget li a:hover {color:<?php echo $options['mts_color_scheme']; ?>; }
.postauthor h5,.reply a,.current-menu-item a{ color:<?php echo $options['mts_color_scheme']; ?>;}
.secondary-navigation{ border-bottom:4px solid <?php echo $options['mts_color_scheme']; ?>; }
body > footer{border-top:4px solid <?php echo $options['mts_color_scheme']; ?>;}
<?php } ?>
<?php if ($options['mts_layout'] == 'sclayout') { ?>
.article { float: right; padding-right: 0; border-right: 0; }
#content_box { border-right:none; border-left:1px solid #E5E5E5; padding:0 0 0 4%; width: 96%; }
.sidebar.c-4-12 { float: left; padding-right: 0; }
<?php } ?>
<?php echo $options['mts_custom_css']; ?>
</style>
<?php echo $options['mts_header_code']; ?>
<?php }
}

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() { 
	global $options
?>
<!--start copyrights-->
<div class="row" id="copyright-note">
<span><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> Copyright &copy; <?php echo date("Y") ?>.</span>

</div>
<!--end copyrights-->
<?php }
}

/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() { 
	global $options
?>
<!--start footer code-->
<?php if ($options['mts_analytics_code'] != '') { ?>
<?php echo $options['mts_analytics_code']; ?>
<?php } ?>
<!--end footer code-->
<?php }
}
?>