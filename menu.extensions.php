<div class="orbisius_cyberstore">
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
                   echo "The following extensions have been found.<br/>";
                   echo "<ul>\n";
                   do_action('orb_cyber_store_render_extension_list');
                   echo "</ul>\n";
               }
               ?>
            </p>
		</div>

        <?php Orbisius_CyberStoreUtil::output_orb_widget(); ?>
    </div>
</div>
