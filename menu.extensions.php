<div class="webweb_wp_plugin">
    <div class="wrap">
        <h2>Extensions</h2>

		<div class="updated">
            <p>
               Extensions allow you to do some cool things.
            </p>
		</div>

        <div>
            <p>

               <?php
               if (!has_action('orb_cyber_store_render_extension_list')) {
                   echo "No extensions have been installed.";
               } else {
                   echo "The following extensions have been found.<br/><ul>";
                   do_action('orb_cyber_store_render_extension_list');
                   echo "</ul>";
               }
               ?>
            </p>
		</div>

        <p>
			<iframe style="width:100%;min-height:300px;height: auto;" width="640"
                    height="480" src="http://club.orbisius.com/wpu/content/wp/orbisius-cyberstore/" frameborder="0" allowfullscreen></iframe>
		</p>
    </div>
</div>
