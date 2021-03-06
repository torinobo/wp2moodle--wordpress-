<?php require_once(ABSPATH . 'wp-includes/pluggable.php'); ?>
<div class="wrap">
<h2><?php print WP2M_PUGIN_NAME ." ". WP2M_CURRENT_VERSION ?></h2>
<p>This plugin allows you to place a shortcode in a post that passes encrypted logon information to Moodle, using the <a href="https://github.com/frumbert/wp2moodle-moodle">Wp2Moodle authentication plugin</a> for Moodle 2.2. The user will be created (if required) by Moodle and enrolled in the specified Cohort. User the Moodle button on the rich editor to insert the shortcode.</p>
<p>Group enrolment example: <em>[wp2moodle group='group1']enrol in group 1[/wp2moodle]</em>.</p>
<p>Cohort enrolment example: <em>[wp2moodle cohort='business_cert3']enrol in Cert 3 Business[/wp2moodle]</em>.</p>
<p>Another example: <em>[wp2moodle class='css-classname' group='group1' cohort='class1' target='_blank']my link text[/wp2moodle]</em>.</p>
<h2>Shortcode attributes:</h2>
<ul>
	<li><em>class</em>: optional, defaults to 'wp2moodle'; CSS class attribute of link</li>
	<li><em>cohort</em>: optional, idnumber of the cohort in which to enrol a user at the moodle end</li>
	<li><em>group</em>: optional, idnumber of the group in which to enrol a user at the moodle end (typically you use group <i>or</i> cohort)</li>
	<li><em>target</em>: optional, defaults to '_self'; href target attribute of link</li>
</ul>
<p class="description">Note: The link that is generated is timestamped and will expire, so it cannot be bookmarked or hijacked. You must set the expiry time in the Moodle plugin. You should allow reading time of the page when considering a timeout value, since the link is generated when the page is loaded, not when the link is clicked.</p>
<h2>Settings</h2>
<form method="post" action="options.php">
    <?php
		settings_fields( 'wp2m-settings-group' );
	?>
    <table class="form-table">
        <tr valign="top">
	        <th scope="row">Moodle URL</th>
	        <td><input type="text" name="wp2m_moodle_url" value="<?php echo get_option('wp2m_moodle_url'); ?>" size="60" />
	        <span class="description">Plugin will append the url <em><?php echo WP2M_MOODLE_PLUGIN_URL ?></em>.</span>
	        </td>
        </tr>
         
        <tr valign="top">
    	    <th scope="row">Encryption secret</th>
        	<td><input type="text" name="wp2m_shared_secret" value="<?php echo get_option('wp2m_shared_secret'); ?>" size="60" />
        	<span class="description">Must match setting on Moodle plugin</span>
        	</td>
        </tr>
        
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
