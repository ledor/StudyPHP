	</div>
<div id="footer">
<?php if(get_option('boldy_footer_actions')!="no") {?>
	<div style="width:960px; margin: 0 auto; position:relative;">
	</div>
	<?php }?>
	<div id="footerWidgets">
		<div id="footerWidgetsInner">
			<?php /* Widgetized sidebar */
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?><?php endif; ?>
			<div id="copyright">
					<p>Copyright &copy; <?php echo date('Y'); ?><a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>"> <?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>. All Right Reserve!<br><br>
                                           <a href="http://animesubs.comoj.com/private-policy-disclaimer">Privacy & Disclaimer</a> | <a href="http://animesubs.comoj.com/contact">Contact Us</a></p>
			</div>
		</div>
	</div>
</div>	
<script type="text/javascript">
	$(document).ready(function(){ //hide the all of the element with class msg_body
	 $(".drop").hide();  //toggle the component with class msg_body
	 $(".drop-btn").click(function()
	 {
	 		$(".drop").slideToggle();
		});});
</script>
<?php
 wp_footer();
?>
</body>
</html>
