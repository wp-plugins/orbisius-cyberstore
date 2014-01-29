<?php

$msg = '';

$id = !isset($_REQUEST['id']) ? 0 : $_REQUEST['id'];
$settings_key = $orbisius_digishop_obj->get('plugin_settings_key');
$db_prefix = $orbisius_digishop_obj->get('plugin_db_prefix');

$product_rec = $orbisius_digishop_obj->get_product_defaults();

if (!empty($_POST)) {
    $data = $_REQUEST[$settings_key];

    $ret_id = $orbisius_digishop_obj->admin_product($data, $id);

    if (empty($ret_id)) {
        $msg = $orbisius_digishop_obj->message('Cannot add/update record. <br/>Errors: <br/>' . $orbisius_digishop_obj->get_errors_str());
        $err = 1;
    } else {
        $shortcode = '[' . $orbisius_digishop_obj->get('plugin_id_str') . ' id="' . $ret_id . '"]';
        $msg = $orbisius_digishop_obj->message("Successfully added/updated record. Shortcode: $shortcode", 1);
        $id = $ret_id;
    }

    // preserve data only when updating or error adding
    if (!empty($err) || !empty($id)) {
        $product_rec = $_REQUEST[$settings_key];
    }
}

if (!empty($id)) {
    $product_rec = $orbisius_digishop_obj->get_product($id, 'admin');
    
    if ($orbisius_digishop_obj->is_variable($product_rec)) {
        $product_rec['variable_pricing'] = $orbisius_digishop_obj->parse_variable_array_and_encode2str($product_rec);
    }
}

?>

<?php
$settings_key = $orbisius_digishop_obj->get('plugin_settings_key');
$opts = $orbisius_digishop_obj->get_options();

$plugin_file = dirname(__FILE__) . '/orbisius-cyberstore.php';

?>
<div class="wrap orbisius_cyberstore">
        <h2>Orbisius CyberStore &rarr; Add/Edit Product</h2>

        <?php if (!empty($msg)) : ?>
           <?php echo $msg; ?>
        <?php else : ?>
           <div class="updated"><p>
               Enter product details below.
           </p></div>
        <?php endif; ?>
		
        <div id="poststuff">

            <div id="post-body" class="metabox-holder columns-2">

                <!-- main content -->
                <div id="post-body-content">

                    <div class="meta-box-sortables ui-sortable">

                        <div class="postbox">
                            <div class="inside">
                                <form method="post" enctype="multipart/form-data">
									<?php settings_fields($orbisius_digishop_obj->get('plugin_dir_name')); ?>
                                    <input type="hidden" name="id" value="<?php echo esc_attr($id); ?>" />

									<table class="form-table">
										<tr valign="top">
											<th scope="row">Product Name</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[label]" value="<?php echo esc_attr($product_rec['label']); ?>" class="input_field widefat" /></td>
										</tr>
										<tr valign="top">
											<th scope="row">Price</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[price]" value="<?php echo esc_attr($product_rec['price']); ?>" autocomplete="off" class="small-text" />
											Ex.: 29.95 or 10, use 0 for a free (download button will be shown instead of the buy now)
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">File</th>
											<td>
												<input type="file" name="file" value="" /> Max file upload size:
													<?php echo Orbisius_CyberStoreUtil::get_max_upload_size(); ?> MB *
												
                                                    <?php if (!empty($product_rec['file'])) : ?>
                                                        <br/>
                                                        <?php
                                                            if (!Orbisius_CyberStoreUtil::validate_url($product_rec['file'])) {
                                                                if (file_exists($orbisius_digishop_obj->get('plugin_uploads_dir') . $product_rec['file'])) {
                                                                    echo '<span class="app_success">' . $product_rec['file'] . ' (' . Orbisius_CyberStoreUtil::format_file_size(
                                                                        @filesize($orbisius_digishop_obj->get('plugin_uploads_dir') . $product_rec['file'])) . ') </span>';
                                                                } else {
                                                                    echo "<span class='app_error'>The uploaded file [{$product_rec['file']}] cannot be found.</span>";
                                                                }
                                                            }
                                                        ?>
                                                    <?php elseif (!empty($id)) : ?>
                                                        <span class="app_error">You haven't uploaded a file yet.</span>
                                                    <?php endif; ?>
											</td>
										</tr>
                                        <tr valign="top">
											<th scope="row">Active</th>
                                            <td>
                                                <label for="cyberstore_add_product_active">
                                                    <input type="checkbox" id="cyberstore_add_product_active" name="<?php echo $settings_key; ?>[active]" value="1"
                                                            <?php echo empty($product_rec) || !empty($product_rec['active']) ? 'checked="checked"' : ''; ?> />
                                                    Enabled
                                                </label>
											</td>
										</tr>
                                        <tr valign="top">
											<th scope="row" colspan="2">
												<h3>Advanced
													(<a href="javascript:void(0);" onclick="jQuery('.digishop_advanced_add_options').toggle();return false;">show/hide</a>)
												</h3>
											</th>
										</tr>
										</table>
                                    
										<table class="digishop_advanced_add_options form-table hide-if-js">
										<tr valign="top">
											<th scope="row">Variable Pricing (price override)</th>
                                            <td>
                                                <textarea name="<?php echo $settings_key; ?>[variable_pricing]" class="widefat"><?php
                                                    echo $product_rec['variable_pricing']; ?></textarea>
                                                <br/>Example: <a href="javascript:void(0);" onclick="jQuery('.orb_variable_pricing_ex').toggle();return false;">show/hide</a><br/>
                                                <div class="orb_variable_pricing_ex <?php echo empty($product_rec['variable_pricing']) ? 'hide-if-js' : ''; ?> ">
                                                    <br />
                                                    <textarea class="widefat " readonly="readonly">
Personal License (1 domain) | 19.95 | limits=1
Business License (3 domains) | 29.95 | limits=3
Developer License (Unlimited Domains) | 49.95 | limits=999</textarea>
                                                    <br/>If you enter variable pricing this will override the price field.
                                                </div>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">External URL</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[ext_link]" value="<?php
												$ext_link = '';

												if (!empty($product_rec['ext_link'])) {
													$ext_link = $product_rec['ext_link'];
												} elseif (Orbisius_CyberStoreUtil::validate_url($product_rec['file'])) {
													$ext_link = $product_rec['file'];
												}

												echo esc_attr($ext_link); ?>" class="widefat" />
											<p>
												Example: http://yourdomain.com/some-document.pdf OR ftp://yourdomain.com/sample.doc<br/>
												If your file is too big you can provide an external link and your users will be redirected to that file. </p>
											</td>
										</tr>
                                        <tr valign="top">
											<th scope="row">System Note (Optional)</th>
                                            <td>
                                                <textarea name="<?php echo $settings_key; ?>[system_note]" class="orb_product_note"><?php
                                                    echo $product_rec['system_note']; ?></textarea>
                                                <br/>Admin use only | 1024 character limit.
											</td>
										</tr>
									</table>
									
									<p class="submit">
										<input type="submit" class="button-primary" value="<?php _e('Add/Update Product') ?>" />
									</p>

                                    <p>
										Notes:
										<br/> One file per product. If you need more please add them into a ZIP archive file.
										<br/> * The maximum file upload size is determined by your hosting company.
										If it is too low (e.g. less than 2 MB) contact your hosting to increase it.
									</p>
								</form>
                            </div> <!-- .inside -->

                        </div> <!-- .postbox -->

                        <div class="postbox">

                            <h3><span>Tell Your Friends</span></h3>
                            <div class="inside">
                                <?php
                                    $plugin_data = get_plugin_data($plugin_file);

                                    $app_link = urlencode($plugin_data['PluginURI']);
                                    $app_title = urlencode($plugin_data['Name']);
                                    $app_descr = urlencode($plugin_data['Description']);
                                ?>
                                <p>
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                        <a class="addthis_button_facebook" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_twitter" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_google_plusone" g:plusone:count="false" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_linkedin" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_email" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_myspace" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_google" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_digg" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_delicious" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_stumbleupon" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_tumblr" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_favorites" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                                        <a class="addthis_button_compact"></a>
                                    </div>
                                    <!-- The JS code is in the footer -->

                                    <script type="text/javascript">
                                    var addthis_config = {"data_track_clickback":true};
                                    var addthis_share = {
                                      templates: { twitter: 'Check out {{title}} at {{lurl}} (from @orbisius)' }
                                    }
                                    </script>
                                    <!-- AddThis Button START part2 -->
                                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=lordspace"></script>
                                    <!-- AddThis Button END part2 -->
                                </p>
                            </div> <!-- .inside -->

                        </div> <!-- .postbox -->

                    </div> <!-- .meta-box-sortables .ui-sortable -->

                </div> <!-- post-body-content -->

                <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container">

                    <div class="meta-box-sortables">
						<!-- Hire Us -->
                        <div class="postbox">
                            <h3><span>Hire Us</span></h3>
                            <div class="inside">
                                Hire us to create a plugin/web/mobile app
                                <br/><a href="http://orbisius.com/page/free-quote/?utm_source=<?php echo str_replace('.php', '', basename($plugin_file));?>&utm_medium=plugin-settings&utm_campaign=product"
                                   title="If you want a custom web/mobile app/plugin developed contact us. This opens in a new window/tab"
                                    class="button-primary" target="_blank">Get a Free Quote</a>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->
                        <!-- /Hire Us -->
                        
                        <!-- Newsletter-->
                        <div class="postbox">
                            <h3><span>Newsletter</span></h3>
                            <div class="inside">
                                <!-- Begin MailChimp Signup Form -->
                                <div id="mc_embed_signup">
                                    <?php
                                        $current_user = wp_get_current_user();
                                        $email = empty($current_user->user_email) ? '' : $current_user->user_email;
                                    ?>

                                    <form action="http://WebWeb.us2.list-manage.com/subscribe/post?u=005070a78d0e52a7b567e96df&amp;id=1b83cd2093" method="post"
                                          id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                        <input type="hidden" value="settings" name="SRC2" />
                                        <input type="hidden" value="<?php echo str_replace('.php', '', basename($plugin_file));?>" name="SRC" />

                                        <span>Get notified about cool plugins we release</span>
                                        <!--<div class="indicates-required"><span class="app_asterisk">*</span> indicates required
                                        </div>-->
                                        <div class="mc-field-group">
                                            <label for="mce-EMAIL">Email</label>
                                            <input type="email" value="<?php echo esc_attr($email); ?>" name="EMAIL" class="required email" id="mce-EMAIL">
                                        </div>
                                        <div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button-primary"></div>
                                    </form>
                                </div>
                                <!--End mc_embed_signup-->
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->
                        <!-- /Newsletter-->

                        <!-- support options -->
                        <div class="postbox">
                            <div class="inside">
                                <!-- Twitter: code -->
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                <!-- /Twitter: code -->

                                <!-- Twitter: Orbisius_Follow:js -->
                                    <a href="https://twitter.com/orbisius" class="twitter-follow-button"
                                       data-align="right" data-show-count="false">Follow @orbisius</a>
                                <!-- /Twitter: Orbisius_Follow:js -->

                                &nbsp;

                                <!-- Twitter: Tweet:js -->
                                <a href="https://twitter.com/share" class="twitter-share-button"
                                   data-lang="en" data-text="Checkout FlexPrice #WordPress plugin.It allows you change product prices in #WooCommerce"
                                   data-count="none" data-via="orbisius" data-related="orbisius,qsandbox"
                                   data-url="<?php
                                    $plugin_data = get_plugin_data($plugin_file);
                                    echo $plugin_data['PluginURI'];
                                   ?>">Tweet</a>
                                <!-- /Twitter: Tweet:js -->

                                <br/>
                                <span>
                                    <a target="_blank" title="[new window]" href="<?php
                                    $plugin_data = get_plugin_data($plugin_file);
                                    echo $plugin_data['PluginURI'];
                                    ?>">Product Page</a>
                                    |
                                    <a href="http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/digishop/?utm_source=<?php
                                        echo str_replace('.php', '', basename($plugin_file));?>&utm_medium=plugin-settings&utm_campaign=product"
                                    target="_blank" title="[new window]">Forums</a>
                                    |
                                    More <a href="http://club.orbisius.com/products/?utm_source=<?php
                                        echo str_replace('.php', '', basename($plugin_file));?>&utm_medium=plugin-settings-support&utm_campaign=product"
                                    target="_blank" title="[new window]">Products</a>

                                    <!--|
                                     <a href="http://docs.google.com/viewer?url=https%3A%2F%2Fdl.dropboxusercontent.com%2Fs%2Fwz83vm9841lz3o9%2FOrbisius_LikeGate_Documentation.pdf" target="_blank">Documentation</a>
                                    -->
                                </span>
                            </div>
                        </div> <!-- .postbox --> <!-- /support options -->

                        <div class="postbox"> <!-- quick-contact -->
                            <?php
                            $current_user = wp_get_current_user();
                            $email = empty($current_user->user_email) ? '' : $current_user->user_email;
                            $quick_form_action = is_ssl()
                                    ? 'https://ssl.orbisius.com/apps/quick-contact/'
                                    : 'http://apps.orbisius.com/quick-contact/';

                            if (!empty($_SERVER['DEV_ENV'])) {
                                $quick_form_action = 'http://localhost/projects/quick-contact/';
                            }
                            ?>
                            <h3><span>Quick Question or Suggestion</span></h3>
                            <div class="inside">
                                <div>
                                    <form method="post" action="<?php echo $quick_form_action; ?>" target="_blank">
                                        <?php
                                            global $wp_version;
                                            $plugin_data = get_plugin_data($plugin_file);

                                            $hidden_data = array(
                                                'site_url' => site_url(),
                                                'wp_ver' => $wp_version,
                                                'first_name' => $current_user->first_name,
                                                'last_name' => $current_user->last_name,
                                                'product_name' => $plugin_data['Name'],
                                                'product_ver' => $plugin_data['Version'],
                                                'woocommerce_ver' => defined('WOOCOMMERCE_VERSION') ? WOOCOMMERCE_VERSION : 'n/a',
                                            );
                                            $hid_data = http_build_query($hidden_data);
                                            echo "<input type='hidden' name='data[sys_info]' value='$hid_data' />\n";
                                        ?>
                                        <textarea class="widefat" id='orbisius_woocommerce_ext_quick_order_msg' name='data[msg]' required="required"></textarea>
                                        <br/>Your Email: <input type="text" class=""
                                               name='data[sender_email]' placeholder="Email" required="required"
                                               value="<?php echo esc_attr($email); ?>"
                                               />
                                        <br/><input type="submit" class="button-primary" value="<?php _e('Send Feedback') ?>"
                                                    onclick="try { if (jQuery('#orbisius_woocommerce_ext_quick_order_msg').val().trim() == '') { alert('Enter your message.'); jQuery('#orbisius_woocommerce_ext_quick_order_msg').focus(); return false; } } catch(e) {};" />
                                        <br/>
                                        What data will be sent
                                        <a href='javascript:void(0);'
                                            onclick='jQuery(".orbisius_woocommerce_ext_quick_order_data_to_be_sent").toggle();'>(show/hide)</a>
                                        <div class="hide-if-js hide orbisius_woocommerce_ext_quick_order_data_to_be_sent">
                                            <textarea class="widefat" rows="4" readonly="readonly" disabled="disabled"><?php
                                            foreach ($hidden_data as $key => $val) {
                                                if (is_array($val)) {
                                                    $val = var_export($val, 1);
                                                }

                                                echo "$key: $val\n";
                                            }
                                            ?></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- .inside -->

                        </div> <!-- .postbox --> <!-- /quick-contact -->
                    </div> <!-- .meta-box-sortables -->

                </div> <!-- #postbox-container-1 .postbox-container -->

            </div> <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">
        </div> <!-- #poststuff -->		
</div> <!-- /wrap -->
