<?php
/*
Plugin Name: TwittLink Twitter Client
Plugin URI: http://www.twittlink.com/tlc
Description: Adds a Twitter Client to your blog
Version: 1.3
Author: TwittLink
Author URI: http://www.twittlink.com
*/

add_action('admin_menu', 'tlc_options');
add_action('wp_footer','tlc_addfooter');
 
add_option('tlc_xlocation', 'left');  
add_option('tlc_ylocation', '10%'); 
add_option('tlc_twname', '');
add_option('tlc_showbtn', "true");
add_option('tlc_route_twitter', "true");
add_option('tlc_showbtn_img', '');
add_option('tlc_showonline', "true");
add_option('tlc_noconflicts', "true");
add_option('tlc_delayedload', "true");

function tlc_options()
{
    add_options_page('TwittLink Twitter Client Settings', 'TwittLink Client', 8, __FILE__, 'tlc_options_page');
}

function tlc_addfooter() 
{

?>
<!-- Start of TwittLink Twitter Client Code -->
<script type="text/javascript">
	var tlc_xpos="<?php echo get_option('tlc_xlocation'); ?>"; 
	var tlc_ypos="<?php echo get_option('tlc_ylocation'); ?>"; 
	var tlc_twname="<?php echo get_option('tlc_twname'); ?>"; 
	var tlc_showbtn=<?php echo get_option('tlc_showbtn'); ?>; 
	var tlc_route_twitter=<?php echo get_option('tlc_route_twitter'); ?>; 
	var tlc_showonline=<?php echo get_option('tlc_showonline'); ?>; 
	var tlc_noconflicts=<?php echo get_option('tlc_noconflicts'); ?>; 
	var tlc_showbtn_img="<?php echo get_option('tlc_showbtn_img'); ?>"; 
	var tlc_delayedload=<?php echo get_option('tlc_delayedload'); ?>;
</script>
<?php if(get_option('tlc_delayedload') == "true") { ?>
<script type="text/javascript" src="http://www.twittlink.com/tools/tlc/tlcc.js"></script>
<?php } else { ?>
<script type="text/javascript" src="http://www.twittlink.com/tools/tlc/tlc.js"></script>
<?php } ?>
<!-- TwittLink Twitter Client Code -->
<?php

}

function tlc_options_page()
{
?>
    <div class="wrap">
    <h2>Settings for TwittLink Twitter Client</h2>

    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?> 
        <table class="form-table">
            <tr>
                <th scope="row">
                    Where do you want twitter client, left or right ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="left" <?php if (get_option('tlc_xlocation') == 'left') echo 'checked="checked"'; ?> name="tlc_xlocation" group="tlc_xlocation"/> 
                        <label for="tlc_xlocation">Left side</label>     
                    </p>
                    <p>
                        <input type="radio" value="right" <?php if (get_option('tlc_xlocation') == 'right') echo 'checked="checked"'; ?> name="tlc_xlocation" group="tlc_xlocation"/> 
                        <label for="tlc_xlocation">Right side</label>     
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    Where do you want twitter client button to appear ?
                </th>
                <td>
                    <p>
                        <input type="text" value="<?php echo get_option('tlc_ylocation'); ?>" name="tlc_ylocation"/> 
                        <label for="tlc_ylocation">Button vertical position (ex: 200px, 10%)</label>
                    </p>
                </td>
            </tr>  
            <tr>
                <th scope="row">
                     Twitter account associated with this blog ?
                </th>
                <td>
                    <p>
                        <input type="text" value="<?php echo get_option('tlc_twname'); ?>" name="tlc_twname"/> 
                    </p>
                </td>
            </tr>  
            <tr>
                <th scope="row">
                    Display TwittLink client button ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="true" <?php if (get_option('tlc_showbtn') == "true") echo 'checked="checked"'; ?> name="tlc_showbtn" group="tlc_showbtn"/> 
                        <label for="tlc_showbtn">Yes</label>     
                    </p>
                    <p>
                        <input type="radio" value="false" <?php if (get_option('tlc_showbtn') == "false") echo 'checked="checked"'; ?> name="tlc_showbtn" group="tlc_showbtn"/> 
                        <label for="tlc_showbtn">No</label>     
                    </p>
		    <p>If you select 'no' you can activate twitter client by implementing a custom control with id 'tlc_user_button'</p>
                </td>
            </tr> 
            <tr>
                <th scope="row">
                    You can specify a different image for client button if you don't like the default one ?
                </th>
                <td>
                    <p>
                        <input type="text" size="70" value="<?php echo get_option('tlc_showbtn_img'); ?>" name="tlc_showbtn_img"/> 
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    Intercept twitter.com links ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="true" <?php if (get_option('tlc_route_twitter') == "true") echo 'checked="checked"'; ?> name="tlc_route_twitter" group="tlc_route_twitter"/> 
                        <label for="tlc_route_twitter">Yes</label>     
                    </p>
                    <p>
                        <input type="radio" value="false" <?php if (get_option('tlc_route_twitter') == "false") echo 'checked="checked"'; ?> name="tlc_route_twitter" group="tlc_route_twitter"/> 
                        <label for="tlc_route_twitter">No</label>     
                    </p>
                </td>
            </tr> 
            <tr>
                <th scope="row">
                    Show online/live users ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="true" <?php if (get_option('tlc_showonline') == "true") echo 'checked="checked"'; ?> name="tlc_showonline" group="tlc_showonline"/>
                        <label for="tlc_showonline">Yes</label>     
                    </p>
                    <p>
                        <input type="radio" value="false" <?php if (get_option('tlc_showonline') == "false") echo 'checked="checked"'; ?> name="tlc_showonline" group="tlc_showonline"/> 
                        <label for="tlc_showonline">No</label>     
                    </p>
                </td>
            </tr> 
            <tr>
                <th scope="row">
                    No conflicts with other libraries ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="true" <?php if (get_option('tlc_noconflicts') == "true") echo 'checked="checked"'; ?> name="tlc_noconflicts" group="tlc_noconflicts"/>
                        <label for="tlc_noconflicts">Yes</label>     
                    </p>
                    <p>
                        <input type="radio" value="false" <?php if (get_option('tlc_noconflicts') == "false") echo 'checked="checked"'; ?> name="tlc_noconflicts" group="tlc_noconflicts"/> 
                        <label for="tlc_noconflicts">No</label>     
                    </p>
				    <p>If Twittlink Client or your Blog is not working properly you can switch this option to No.</p>
				</td>
            </tr> 
            <tr>
                <th scope="row">
                    Delayed load ?
                </th>
                <td>
                    <p>
                        <input type="radio" value="true" <?php if (get_option('tlc_delayedload') == "true") echo 'checked="checked"'; ?> name="tlc_delayedload" group="tlc_delayedload"/>
                        <label for="tlc_delayedload">Yes</label>     
                    </p>
                    <p>
                        <input type="radio" value="false" <?php if (get_option('tlc_delayedload') == "false") echo 'checked="checked"'; ?> name="tlc_delayedload" group="tlc_delayedload"/> 
                        <label for="tlc_delayedload">No</label>     
                    </p>
				    <p>If you want Twittlink Client to load latter and not affect your blog loading time you can switch this option to Yes.</p>
				</td>
            </tr> 
        </table>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="tlc_xlocation,tlc_ylocation,tlc_twname,tlc_showbtn,tlc_route_twitter,tlc_showbtn_img,tlc_showonline,tlc_noconflicts,tlc_delayedload"/>
        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Update Settings') ?>" />
        </p>
	<p><strong>If you experience problems with this plugin please send us an email at <a href="mailto:bug@twittlink.com">bug@twittlink.com</a>. We will do our best to solve them as soon as possible. Thank you!</strong></p>
    </form>
    </div>
<?php
}

?>