<?php
if (!current_user_can('manage_options')) {
    wp_die('What?', 'Hi');
}

$del_status = 0;
$cmd = empty($_REQUEST['do']) ? '' : $_REQUEST['do'];

if ($cmd == 'delete' && is_admin()) {
    $del_status = $orbisius_digishop_obj->delete_product($_REQUEST['id']);
}

$options = $orbisius_digishop_obj->get_options();
$data = $orbisius_digishop_obj->get_products();

$delete_url = $orbisius_digishop_obj->get('delete_product_url');
$edit_url = $orbisius_digishop_obj->get('edit_product_url');

$adm_prefix = $orbisius_digishop_obj->get('plugin_url');
$plugin_uploads_dir = $orbisius_digishop_obj->get('plugin_uploads_dir');

$inactive_product = " <img src='$adm_prefix/images/product_inactive.png' title='' alt='' /> " . $orbisius_digishop_obj->m('Inactive');
$active_product = " <img src='$adm_prefix/images/product_active.png' title='' alt='' /> " . $orbisius_digishop_obj->m('Active', 1);
?>

<div class="orbisius_cyberstore">
    <div class="wrap">
        <h2>Products <a class="add-new-h2" href="<?php echo $orbisius_digishop_obj->get('plugin_admin_url_prefix') . '/menu.product.add.php'; ?>">Add Product</a></h2>
        
        <p>The list of products you currently have. Copy the short code into the post where you'd like the buy now button to appear.</p>

        <div class="wrap" id="app-partners-container">
            <table class="widefat fixed app_table_half0 wp-list-table widefat fixed posts">
                <thead>
                    <tr>
                        <th scope="col">Short Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price (<?php echo $options['currency']; ?>)</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) : ?>
                        <tr>
                            <td colspan="3">No records found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($data as $idx => $rec) : ?>
                            <tr>
                                <td><?php echo "[" . $orbisius_digishop_obj->get('plugin_id_str') . " id=\"{$rec['id']}\"]" ?>

                                    <?php if (!empty($rec['file']) && !empty($rec['hash'])) : ?>
                                        <small>
                                            <a href="javascript:void(0);" onclick="jQuery('#download_link_container_<?php echo $rec['id']; ?>').toggle();">show/hide download link</a>
                                            <div id="download_link_container_<?php echo $rec['id']; ?>" class="download_link app_hide widefat">
                                                <input type="text" value="<?php
                                                echo
                                                Orbisius_CyberStoreUtil::add_url_params($orbisius_digishop_obj->get('site_url'), array($orbisius_digishop_obj->get('download_key') => $rec['hash']));
                                                ?>" onclick="this.select();" />
                                                <br/>click to select it and then right click and copy it.
                                            </div>
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="app_edit_button" title="Edit Product"
                                       href="<?php echo Orbisius_CyberStoreUtil::add_url_params($edit_url, array('id' => $rec['id'])); ?>"><?php echo $rec['label']; ?></a>

                                    <?php
                                    if (!empty($rec['file'])) {
                                        if (Orbisius_CyberStoreUtil::validate_url($rec['file']) || file_exists($plugin_uploads_dir . $rec['file'])) {
                                            echo " <img src='$adm_prefix/images/attach.png' title='The product has a file linked to it.' alt='' />";
                                        } else {
                                            echo " <img src='$adm_prefix/images/error.png' title='The product has a file linked to it but the file cannot be found.' alt='' />";
                                        }
                                    }
                                    ?></td>
                                <td><?php if ($orbisius_digishop_obj->is_variable($rec)) {
                                            echo 'Multiple Prices (Variable Product)';
                                        } else {
                                            echo empty($rec['price']) ? 'Free' : $rec['price'];
                                        }
                                    ?></td>
                                <td>
                                    <a class="app_edit_button" href="<?php echo Orbisius_CyberStoreUtil::add_url_params($edit_url, array('id' => $rec['id'])); ?>">Edit</a>
                                    |
                                    <a class="app_delete_button" onclick="return confirm('Are you sure?');"
                                       href="<?php echo Orbisius_CyberStoreUtil::add_url_params($delete_url, array('id' => $rec['id'])); ?>">Delete</a>
                                </td>
                                <td><?php echo empty($rec['active']) ? $inactive_product : $active_product; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>


            <p>Note: If a product is inactive its Buy now button will not be shown and it won't be allowed for download even with the correct download link.</p>
        </div>
    </div>
</div>
