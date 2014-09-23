<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="Search the site" onblur="if (this.value == '') {this.value = 'Search the site';}" onfocus="if (this.value == 'Search the site') {this.value = '';}" >
		<input id="search-image" class="sbutton" type="submit" style="border:0; vertical-align: top;" value="Search">
	</fieldset>
</form>