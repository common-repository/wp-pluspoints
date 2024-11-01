<?php
function wppp_settings_page() {
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"></div>
		<h2>Your PointsPlus Personal Settings</h2>
		<script type="text/javascript" charset="utf-8">
			/*global jQuery:true */
			var unitMeasureCopy={metric:{weight:"kilograms",height:"meters"},english:{weight:"pounds",height:"inches"}};
			jQuery(function(f){jQuery(':input[name="wppp_unit_of_measurement"]').on("change",function(a){a=jQuery(this).val();jQuery(':input[name="wppp_weight"]').val("").next("span").text(unitMeasureCopy[a].weight);jQuery(':input[name="wppp_height"]').val("").next("span").text(unitMeasureCopy[a].height)});""!==jQuery(':input[name="wppp_unit_of_measurement"]:checked').val()&&(f=jQuery(':input[name="wppp_unit_of_measurement"]:checked').val(),jQuery(':input[name="wppp_weight"]').next("span").text(unitMeasureCopy[f].weight),
				jQuery(':input[name="wppp_height"]').next("span").text(unitMeasureCopy[f].height));jQuery("input[type=submit]").click(function(){var a=[],b,d,c,e;d=/^\d+$/;c=/[0-9\.]/;1>jQuery(':input[name="wppp_sex"]:checked').length&&(a.push("Please select a sex"),"undefined"==typeof b&&(b=jQuery(':input[name="wppp_sex"]')));if(""===jQuery(':input[name="wppp_age"]').val()||""!==jQuery(':input[name="wppp_age"]').val()&&!d.test(jQuery(':input[name="wppp_age"]').val()))a.push("Please enter an integer for your age"),
			"undefined"==typeof b&&(b=jQuery(':input[name="wppp_age"]'));1>jQuery(':input[name="wppp_unit_of_measurement"]:checked').length&&(a.push("Please select a unit of measurement"),"undefined"==typeof b&&(b=jQuery(':input[name="wppp_unit_of_measurement"]')));if(""===jQuery(':input[name="wppp_weight"]').val()||""!==jQuery(':input[name="wppp_weight"]').val()&&!c.test(jQuery(':input[name="wppp_weight"]').val()))a.push("Please enter a proper value for your weight"),"undefined"==typeof b&&(b=jQuery(':input[name="wppp_weight"]'));
				if(""===jQuery(':input[name="wppp_height"]').val()||""!==jQuery(':input[name="wppp_height"]').val()&&!c.test(jQuery(':input[name="wppp_height"]').val()))a.push("Please enter a proper value for your height"),"undefined"==typeof b&&(b=jQuery(':input[name="wppp_height"]'));if(0<a.length)return d=jQuery("<blockquote/>").attr("style","color:#ff0000"),a=a.join("<br/>"),jQuery(d).append(a),a=jQuery("<p/>").html("<strong>Unable to process</strong><br/>").append(d),a=jQuery("<div/>").attr("id","wppp-validation").addClass("updated fade").append(a),
					jQuery("#wppp_form").before(a),b.focus(),!1;b=jQuery(':input[name="wppp_sex"]:checked').val();a=jQuery(':input[name="wppp_age"]').val();d=jQuery(':input[name="wppp_unit_of_measurement"]:checked').val();c=jQuery(':input[name="wppp_weight"]').val();e=jQuery(':input[name="wppp_height"]').val();"english"==d&&(c/=2.20462262,e*=.0254);b=.9*("male"==b?864-9.72*a+1.12*(14.2*c+503*e):387-7.31*a+1.14*(10.9*c+660.7*e))+200;b=Math.min(Math.max(Math.round(Math.max(b-1E3,1E3)/35)-11,29),71);jQuery(':input[name="wppp_daily_points"]').val(b);
				jQuery("#wppp_form").submit()});return!1});
		</script>
		<form method="post" id="wppp_form" action="options.php">
			<?php settings_fields( 'wppp-settings-group' ); ?>
			<!-- <p><em>All fields are required</em></p> -->
			<dl class="clearfix">
				<dt><label for="male">Sex<em>*</em></label></dt>
				<dd>
					<label for="male"><input type="radio" id="male" name="wppp_sex" value="male"<?php if(get_option('wppp_sex') && get_option('wppp_sex') == "male") { ?> checked="checked"<?php } ?> /> Male</label>
					<label for="female"><input type="radio" id="female" name="wppp_sex" value="female"<?php if(get_option('wppp_sex') && get_option('wppp_sex') == "female"){ ?> checked="checked" /><?php } ?> /> Female</label>
				</dd>

				<dt><label for="wppp_age">Age<em>*</em></label></dt>
				<dd><input type="number" id="wppp_age" name="wppp_age" value="<?php echo get_option('wppp_age'); ?>" /></dd>

				<dt><label for="english">Unit of Measure<em>*</em></label></dt>
				<dd>
					<label for="metric"><input type="radio" id="metric" name="wppp_unit_of_measurement" value="metric"<?php if(get_option('wppp_unit_of_measurement') && get_option('wppp_unit_of_measurement') == "metric") { ?> checked="checked"<?php } ?> /> Metric (kilograms &amp; meters)</label>
					<label for="english"><input type="radio" id="english" name="wppp_unit_of_measurement" value="english"<?php if(get_option('wppp_unit_of_measurement') && get_option('wppp_unit_of_measurement') == "english"){ ?> checked="checked"<?php } ?> /> English (pounds &amp; inches)</label>
				</dd>

				<dt><label for="wppp_weight">Weight<em>*</em></label></dt>
				<dd><input type="number" id="wppp_weight" name="wppp_weight" value="<?php echo get_option('wppp_weight'); ?>" /><span></span></dd>

				<dt><label for="wppp_height">Height<em>*</em></label></dt>
				<dd><input type="number" id="wppp_height" name="wppp_height" value="<?php echo get_option('wppp_height'); ?>" /><span></span></dd>

				<dt></dt>
				<dd><input type="hidden" name="wppp_daily_points" value="<?php echo get_option('wppp_daily_points'); ?>" /><span>Daily Plus Points = <strong><?php echo get_option('wppp_daily_points'); ?></strong></span></dd>

				<dt></dt>
				<dd><label for="show"><input type="checkbox" id="show" name="wppp_credits" value="true"<?php if(!get_option('wppp_daily_points') || get_option('wppp_credits') == "true") { ?> checked="checked"<?php } ?> /> Show Plug-in Credits</label></dd>

				<dt></dt>
				<dd><button type="submit" class="button button-primary" value="<?php _e('Save Changes', 'wp_pluspoints') ?>"><i class="dashicons dashicons-edit" style="vertical-align:text-bottom;"></i> <?php _e('Save', 'wp_pluspoints') ?></button> <button type="reset" class="button button-secondary"><i class="dashicons dashicons-no" style="vertical-align:text-bottom;"></i> Clear</button></dd>
			</dl>
			<div id="wppp_logo"><i class="dashicons dashicons-wordpress"></i><div><span>your</span>PointsPlus</div></div>
		</form>
		<div style="font-size:x-small;">
			<p><strong style="color:#cc0000;">IMPORTANT:</strong> This is not affiliated with Weight Watchers&reg; nor is it a Weight Watchers&reg; product. The Official PointsPlus calculators and program information can be found at the <a href="http:/www.weightwatchers.com/" title=Weight Watchers" target="_blank">Weight Watchers&reg;</a> web site.<br/>
				<em style="font-size:xx-small;">Please note that Weight Watchers PointsPlus and Points are registered trademarks of Weight Watchers Inc.</em></p>
		</div>
		<h3>Using the plug-in</h3>
		<div id="wppp-tutorial" class="updated fade"><p><strong>NOTE:</strong> Please <a href="http://www.dingobytes.com/wordpress/wordpress-plus-points" title="How to use Your PointsPlus plug-in" target="_blank">watch our video tutorial</a> that explains how to use the plug-in on your WordPress site.</p></div>
		<div>
			<p>This plug-in currently makes the following assumptions.</p>
			<ol>
				<li>Posts will not log more then one day of data.</li>
				<li>Pages will not log more then one day of data.</li>
				<li>There is only one user per site.</li>
			</ol>
		</div>
		<h3>Using the Shortcode API</h3>
		<div>
			<p>The points can be inserted into your blog post by using WordPress 'shortcode' API. The current shortcode tags are [wppp] and [wppp_total]</p>
		</div>
		<h4>[wppp]</h4>
		<div>
			<p>The 'wppp' shortcode supports five different attributes. Those attributes, their default values and descriptions are:</p>
			<ul>
				<li>servings [default = 1]: How many servings consumed.</li>
				<li>protein [default = 0]: How much protein per serving (grams).</li>
				<li>carbs [default = 0]: How much carbohydrates per serving (grams).</li>
				<li>fat [default = 0]: How much fat per serving (grams).</li>
				<li>fiber [default = 0]: How much fiber per serving (grams).</li>
			</ul>
			<p><strong>Example:</strong> You have two servings of salsa that has 0g protein, og carbohydrates, 0g fat and 0g fiber. You can enter that shortcode in as follows.</p>
			<pre>[wppp servings=o carbs=o]</pre>
			<p>Because all other values are the same as the default values you don't need to enter them.</p>
		</div>
		<h4>[wppp_total]</h4>
		<div>
			<p>The 'wppp_total' shortcode will display the total values in the post and compares them to the daily points target. This shortcode does not have any attributes passed to it.</p>
			<pre>[wppp_total]</pre>
		</div>
		<h3>Embedding into Theme</h3>
		<div>
			<p><strong>NOTE:</strong> This is not the preferred method. Because this method embeds the function call into your template, this could cause errors if the template is deactivated.</p>
			<p>You can embed the plug-in into your theme by simply inserting the following call into your theme</p>
			<p><strong>wppp</strong></p>
			<pre>&lt;?php echo wp_pluspoints_func(); ?&gt;</pre>
			<p><strong>wppp_total</strong></p>
			<pre>&lt;?php echo wp_pluspoints_total_func(); ?&gt;</pre>
		</div>
		<div>
			<p>Learn more about this plug-in at <a href="http://www.dingobytes.com/wordpress/wordpress-plus-points" title="Dingobytes.com">http://www.dingobytes.com/</a>.</p>
		</div>
	</div>
	<?php
}
?>