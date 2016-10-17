<?php
namespace EventEspresso\core\libraries\iframe_display;

defined( 'ABSPATH' ) || exit;



/**
 * Class EventListIframeEmbedButton
 *
 * @package       Event Espresso
 * @author        Brent Christensen
 * @since         4.9
 */
class EventListIframeEmbedButton extends IframeEmbedButton
{

    /**
     * EventListIframeEmbedButton constructor.
     */
    public function __construct()
    {
        parent::__construct(
            esc_html__( 'Event List', 'event_espresso' ),
            'event_list'
        );
    }



	public function addEmbedButton() {
		add_filter(
			'FHEE__Events_Admin_Page___events_overview_list_table__after_list_table__before_legend',
			array( $this, 'addEventListIframeEmbedButtonSection' )
		);
		add_action(
			'admin_enqueue_scripts',
			array( $this, 'embedButtonAssets' ),
			10
		);
	}



	/**
     * Adds an iframe embed code button to the Event editor.
     * return string
     */
    public function addEventListIframeEmbedButtonSection()
    {
        return $this->addIframeEmbedButtonsSection(
            array( 'event_list' => $this->embedButtonHtml() )
        );
    }



}
// End of file EventListIframeEmbedButton.php
// Location: EventEspresso\core\libraries\iframe_display/EventListIframeEmbedButton.php