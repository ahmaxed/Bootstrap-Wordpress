<?php $options = get_option('playbook'); ?>
		</div>
	</div><!--#page-->
</div><!--.main-container-->
<footer>
	<div class="container">
		<div class="footer-widgets">
			<?php widgetized_footer(); ?>
			<div class="copyrights">
				<?php mts_copyrights_credit(); ?>
                <span class="cright"><?php echo $options['mts_copyrights']; ?></span>
			</div> 
            <div class="top">
                <a href="#top" class="toplink">   </a></div>
		</div><!--.footer-widgets-->
	</div><!--.container-->
</footer><!--footer-->
<?php mts_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>