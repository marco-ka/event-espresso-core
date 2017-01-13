<?php
namespace EventEspresso\core\services\shortcodes;

defined('EVENT_ESPRESSO_VERSION') || exit;



interface ShortcodeInterface
{

    /**
     * the actual shortcode tag that gets registered with WordPress
     *
     * @return string
     */
    public function getTag();

    /**
     * a place for adding any initialization code that needs to run prior to wp_header().
     * this may be required for shortcodes that utilize a corresponding module,
     * and need to enqueue assets for that module
     *
     * @return void
     */
    public function initialize();

    /**
     * callback that runs when the shortcode is encountered in post content.
     * IMPORTANT !!!
     * remember that shortcode content should be RETURNED and NOT echoed out
     *
     * @param array $attributes
     * @return string
     */
    public function processShortcode($attributes = array());

}
// End of file ShortcodeInterface.php
// Location: EventEspresso\core\services\shortcodes/ShortcodeInterface.php