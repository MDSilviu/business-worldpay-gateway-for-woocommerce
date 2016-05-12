<?php

/**
 * Provide a admin area view for the plugin
 *
 *
 * @link       http://www.mdsdev.eu
 * @since      1.0.0
 *
 * @package    MDS_Worldpay_Woocommerce
 * @subpackage MDS_Worldpay_Woocommerce/admin/partials
 */
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $this->is_valid_for_use() ): ?>
    <h3><?php echo $this->method_title; ?></h3>

    <?php echo ( ! empty( $this->method_description ) ) ? wpautop( $this->method_description ) : ''; ?>

    <table class="form-table">
        <?php $this->generate_settings_html(); ?>
    </table>
    
<?php
else:  ?>
    <div class="inline error">
        <p>
            <strong><?php _e( 'Payment gateway is disabled', 'mds-worldpay-woocommerce' ); ?></strong>:
            <?php _e( 'Business WorldPay does not support your store currency.', 'mds-worldpay-woocommerce' ); ?>
        </p>
    </div>
<?php endif;
