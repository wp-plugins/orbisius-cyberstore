<?php
$settings_key = $orbisius_digishop_obj->get('plugin_settings_key');
$opts = $orbisius_digishop_obj->get_options();

$plugin_file = dirname(__FILE__) . '/orbisius-cyberstore.php';

?>
<div class="wrap">
        <h2>Orbisius CyberStore</h2>

        <div class="updated"><p>
            <?php if (!empty($_REQUEST['settings-updated'])) : ?>
               <strong>Settings saved.</strong>
            <?php else : ?>
               Orbisius CyberStore plugin allows you to start selling your digital products such as e-books, reports in minutes.
            <?php endif; ?>
        </p></div>
		
        <div id="poststuff">

            <div id="post-body" class="metabox-holder columns-2">

                <!-- main content -->
                <div id="post-body-content">

                    <div class="meta-box-sortables ui-sortable">

                        <div class="postbox">
                            <div class="inside">
                                <form method="post" action="options.php">
									<?php settings_fields($orbisius_digishop_obj->get('plugin_dir_name')); ?>
									<table class="form-table">										
										<tr valign="top">
											<th scope="row">Status</th>
											<td>
												<label for="radio1">
													<input type="radio" id="radio1" name="<?php echo $settings_key; ?>[status]"
														value="1" <?php echo empty($opts['status']) ? '' : 'checked="checked"'; ?> /> Enabled
												</label>
												<br/>
												<label for="radio2">
													<input type="radio" name="<?php echo $settings_key; ?>[status]"  id="radio2"
														value="0" <?php echo!empty($opts['status']) ? '' : 'checked="checked"'; ?> /> Disabled
												</label>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">PayPal Email</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[business_email]" value="<?php echo $opts['business_email']; ?>" class="input_field" /></td>
										</tr>
										<tr valign="top">
											<th scope="row">Order Notification Email</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[notification_email]" value="<?php echo $opts['notification_email']; ?>" class="input_field" />
												The plugin will send order info to that email (usually same as customer's)
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Subject (download email)</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[purchase_subject]" value="<?php echo $opts['purchase_subject']; ?>" class="input_field widefat"/></td>
										</tr>
										<tr valign="top">
											<th scope="row">Content (download email)</th>
											<td>
												<?php if (has_action('orb_cyber_store_render_textarea2richtext')) : ?>
													<?php do_action('orb_cyber_store_render_textarea2richtext', $opts, $settings_key, 'purchase_content'); ?>
												<?php else : ?>
												   <textarea name="<?php echo $settings_key; ?>[purchase_content]"><?php echo $opts['purchase_content']; ?></textarea>
												<?php endif; ?>

												<p>
													<div>
														<strong>Supported Variables <a href="javascript:void(0);" onclick="jQuery('.suppored_vars').toggle('slow');return false;">(show/hide)</a></strong>
														<ul class="suppored_vars app_hide">
															<li>%%SITE%%</li>
															<li>%%FIRST_NAME%% - Payer's first name</li>
															<li>%%LAST_NAME%% - Payer's last name</li>
															<li>%%EMAIL%% - Payer's email</li>
															<li>%%TXN_ID%% - Transaction ID (PayPal)</li>
															<li>%%PRODUCT_NAME%% - Product name</li>
															<li>%%PRODUCT_PRICE%% - Product price</li>
															<li>%%DOWNLOAD_LINK%% - Download link</li>
														</ul>
													</div>
												</p>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Thank You message (after a successful payment)</th>
											<!--<td><textarea name="<?php echo $settings_key; ?>[purchase_thanks]"><?php echo $opts['purchase_thanks']; ?></textarea></td>-->
											<td><input type="text" name="<?php echo $settings_key; ?>[purchase_thanks]" value="<?php echo $opts['purchase_thanks']; ?>" class="input_field widefat"/></td>
										</tr>
										<tr valign="top">
											<th scope="row">Error message (after a failed payment)</th>
											<!--<td><textarea name="<?php echo $settings_key; ?>[purchase_error]"><?php echo $opts['purchase_error']; ?></textarea></td>-->
											<td><input type="text" name="<?php echo $settings_key; ?>[purchase_error]" value="<?php echo $opts['purchase_error']; ?>" class="input_field widefat"/></td>
										</tr>
										<tr valign="top">
											<th scope="row">Currency</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[currency]" value="<?php echo $opts['currency']; ?>" /> Example: USD, CAD, EUR
												<a href="https://developer.paypal.com/webapps/developer/docs/classic/api/currency_codes/" target="_blank">See full list</a>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Submit the form in a new window</th>
											<td>
												<label for="digishop_form_new_window">
														<input type="checkbox" id="digishop_form_new_window" name="<?php echo $settings_key; ?>[form_new_window]" value="1"
															<?php echo empty($opts['form_new_window']) ? '' : 'checked="checked"'; ?> /> Enable form submission in a new window</label>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Require buyer's shipping address (on PayPal's site)</th>
											<td>
												<label for="digishop_require_shipping">
														<input type="checkbox" id="digishop_require_shipping" name="<?php echo $settings_key; ?>[require_shipping]" value="1"
															<?php echo empty($opts['require_shipping']) ? '' : 'checked="checked"'; ?> /> Enable</label>
											</td>
										</tr>
										<?php if (0) : /* No need to parse old code because this plugin has to read another db table and match ids. */ ?>
										<tr valign="top">
											<th scope="row">Parse the old [digishop] shortcode</th>
											<td>
												<label for="digishop_require_parse_old_shortcode">
														<input type="checkbox" id="digishop_require_parse_old_shortcode"
															   name="<?php echo $settings_key; ?>[parse_old_shortcode]" value="1"
															<?php echo empty($opts['parse_old_shortcode']) ? '' : 'checked="checked"'; ?> /> Enable</label>
												<p>Check the box if you are running OrbisiusCyberstore and the DigiShop</p>
											</td>
										</tr>
										<?php endif; ?>

										<?php if (has_action('orb_cyber_store_render_extension_settings')) : ?>
											<tr valign="top">
												<th scope="row"><strong>Extensions</strong></th>
												<td colspan="1">
													
												</td>
											</tr>
											<?php do_action('orb_cyber_store_render_extension_settings', $opts, $settings_key); ?>
										<?php else : ?>
											<tr valign="top">
												<!--<th scope="row">Extension Name</th>-->
												<td colspan="2">
													No extensions found.
												</td>
											</tr>
										<?php endif; ?>

										<tr valign="top">
											<th scope="row" colspan="2">
												<h3>Advanced 
													(<a href="javascript:void(0);" onclick="jQuery('.digishop_advanced_options').toggle('slow');return false;">show/hide</a>)
												</h3>
											</th>
										</tr>
										</table>
										<table class="digishop_advanced_options app_hide">
										<tr valign="top">
											<th scope="row">Sandbox (no real transactions)</th>
											<td>
												<label for="digishop_sandbox_mode">
														<input type="checkbox" id="digishop_sandbox_mode" name="<?php echo $settings_key; ?>[test_mode]" value="1"
															<?php echo empty($opts['test_mode']) ? '' : 'checked="checked"'; ?> /> Enable Sandbox</label>

												<p>If the sandbox mode is enabled please use the test accounts generated from
														<a href="http://developer.paypal.com" target="_blank">developer.paypal.com</a> otherwise transactions will fail.
												</p>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Sandbox IP Address</th>
											<td>
												<input type="text" id="sandbox_only_ip" name="<?php echo $settings_key; ?>[sandbox_only_ip]"
														value="<?php echo $opts['sandbox_only_ip']; ?>" class="input_field" />
												Your IP: <?php echo $_SERVER['REMOTE_ADDR']; ?> (<a href="javascript:void(0);" onclick="jQuery('#sandbox_only_ip').val('<?php echo $_SERVER['REMOTE_ADDR']; ?>');"
																										title="This will use your current IP address as sandbox IP address.">Use</a>)
												<p>If the sandbox is enabled and you have entered IP in the box the sandbox will be enabled only for that specific IP address. <br/>
													Is it made for testing live installation of Orbisius_CyberStore.
												</p>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Sandbox PayPal Email</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[sandbox_business_email]" value="<?php echo $opts['sandbox_business_email']; ?>" class="input_field" /></td>
										</tr>
										<tr valign="top">
											<th scope="row">Submit Button Image Source
													<br/>(optional)
											</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[submit_button_img_src]" value="<?php echo $opts['submit_button_img_src']; ?>" class="input_field" />
												Example: http://domain.com/image.jpg ,
												<?php
												if (!empty($opts['submit_button_img_src'])) {
													echo <<<EOF
						<br/> <span style="vertical-align:middle;">Preview: <img src="{$opts['submit_button_img_src']}" alt="" /></span>
EOF;
												}
												?>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Logging (for debugging purposes only!)</th>
											<td>
													<label for="digishop_logging">
														<input type="checkbox" id="digishop_logging" name="<?php echo $settings_key; ?>[logging_enabled]" value="1"
															<?php echo empty($opts['logging_enabled']) ? '' : 'checked="checked"'; ?> /> Enable Logging</label>

													<br/> Log Directory: <?php echo $orbisius_digishop_obj->get('plugin_data_dir'); ?>
													<?php echo is_writable($orbisius_digishop_obj->get('plugin_data_dir'))
																? '<br/>'
																: $orbisius_digishop_obj->msg('Folder not writable!'); ?>
													All the transaction info will be recorded including customer info sent from PayPal.
													We recommend that you connect using FTP client (e.g. FileZilla) and delete the log files.
													<br/>Note: To see logged transactions enable logging and come back to advanced options.
													The logs will be listed here.

													<?php
													// Let's load the log files ONLY when the logging is enabled.
													if (!empty($opts['logging_enabled'])) {
														$files = glob($orbisius_digishop_obj->get('plugin_data_dir') . '/log.*');

														if (!empty($files)) {
															echo "<div><br/>File(s): " . count($files);
															echo "<ul>";

															foreach ($files as $full_file) {
																$file = basename($full_file);
																$size = filesize($full_file);
																$size_fmt = Orbisius_CyberStoreUtil::format_file_size($size);

																if ($size > 500 * 1024) {
																	$buff = $orbisius_digishop_obj->msg("The log file is larger than 500KB. Please use FTP client to download its contents.");
																} else {
																	$buff = file_get_contents($full_file);
																	$buff = "<br/><textarea class='widefat' readonly='readonly' rows='3'>" . $buff . '</textarea>';
																}

																echo "\t<li>$file, $size_fmt $buff</li>\n";
															}

															echo "</ul>";
															echo "</div>";
														}
													}
													
													?>
											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Secure HOP URL</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[secure_hop_url]" value="<?php echo $opts['secure_hop_url']; ?>" class="input_field" />
												<br/>Example: https://secure.yoursite.com/proxy.php
												<br/>
												The main idea of the Secure HOP URL is to redirect to another URL. It must redirect to an address passed by the "r" parameter.
												Having this kind of redirect is very useful because when your visitors are about to return to your site PayPal checks and if
												the returning URL is a non-ssl link then it puts a prompt. <br/>
												
												<a href="<?php echo $orbisius_digishop_obj->get('plugin_url');?>/images/example_paypal_non_ssl_site_warning.png" target="_blank"><img
														style="border:2px dashed red;width: 50%;" src="<?php echo $orbisius_digishop_obj->get('plugin_url');?>/images/example_paypal_non_ssl_site_warning.png" alt="example_paypal_non_ssl_site_warning" /></a>

												<div><strong>Sample redirect script</strong>. Right click and copy it and install it on your secure area.</div>
												<textarea class="input_field widefat" rows="6" readonly="readonly" onclick="this.select();">&lt;?php
					// WordPress Orbisius_CyberStore
					if (empty($_REQUEST['r'])) {
						die('It Works!');
					}

					$loc = empty($_REQUEST['r']) ? '/' : $_REQUEST['r'];
					header('Location: ' . $loc);
					die;
					?&gt;</textarea>

											</td>
										</tr>
										<tr valign="top">
											<th scope="row">Post Transaction Callback URL</th>
											<td><input type="text" name="<?php echo $settings_key; ?>[callback_url]" value="<?php echo $opts['callback_url']; ?>" class="input_field" />
												<br/>Example: http://yourdomain.com/another_ipn.php
												<br/>
												This is useful if you want to do execute operations after a transaction. <br/>
												This could be creating user accounts, calling external APIs e.g. mailchimp to subscribe the person to a mailing list.<br/>
												Your script will receive all the info sent from PayPal plus a variable called <strong>digishop_paypal_status</strong>
													which can be: VERIFIED, INVALID, or NOT_AVAILABLE which will reflect the status of the transaction.
											</td>
										</tr>
									</table>
									
									<p class="submit">
										<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
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
