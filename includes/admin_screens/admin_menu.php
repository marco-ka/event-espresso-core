<?php

function espresso_load_menu_css() {
	wp_enqueue_style('espresso_menu', EVENT_ESPRESSO_PLUGINFULLURL . 'css/admin-menu-styles.css');
}

add_action('admin_init', 'espresso_load_menu_css');

//Build the admin menu
if (!function_exists('add_event_espresso_menus')) {

	/**
	 * Event Espresso    ->event_espresso_manage_events
	 * 	menu function is in file: includes/admin_screens/event_management.php
	 *  add to menu function is in: this file
	 *
	 * Events            ->event_espresso_manage_events
	 * 	menu function is in file: includes/admin_screens/event_management.php
	 *  add to menu function is in file: this file
	 *
	 * Registrations     ->event_espresso_manage_attendees
	 * 	menu function is in file: includes/admin_screens/attendees.php
	 *  add to menu function is in file: this file
	 *
	 * Categories        ->event_espresso_categories_config_mnu
	 *  menu function is in file: includes/admin_screens/categories.php
	 *  add to menu function is in file: this file
	 *
	 * Question Groups   ->event_espresso_question_groups_config_mnu
	 *   menu function is in file: includes/admin_screens/question_groups.php
	 *  add to menu function is in file: this file
	 *
	 * Questions         ->event_espresso_questions_config_mnu
	 *   menu function is in file: includes/admin_screens/questions.php
	 *  add to menu function is in file: this file
	 *
	 * Groupon Codes     ->event_espresso_groupon_config_mnu
	 *   menu function is in file: plugins/espresso-groupon/groupons_admin_page.php
	 *  add to menu function is in file: this file
	 *
	 * Promotional Codes ->event_espresso_discount_config_mnu
	 *   menu function is in file: includes/lite-files/coupon_management.php  OR
	 *   menu function is in file: includes/admin-files/admin_screens/coupon_management.php
	 *  add to menu function is in file: this file
	 *
	 * Seating Chart     ->event_espresso_manage_seating_chart
	 *   menu function is in file: plugins/espresso-seating/controller.php
	 *  add to menu function is in file: plugins/espresso-seating/functions/admin.php
	 *
	 * Management        ->event_espresso_email_config_mnu
	 *   menu function is in file: includes/lite-files/email-manager.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/email_manager.php
	 *  add to menu function is in file: this file
	 *
	 * Emails            ->event_espresso_email_config_mnu
	 *   menu function is in file: includes/lite-files/email-manager.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/email_manager.php
	 *  add to menu function is in file: this file
	 *
	 * Staff             ->event_espresso_staff_config_mnu
	 *   menu function is in file: includes/lite-files/staff-management.php OR
	 *   menu function is in file: includes/admin-files/staff-management/index.php
	 *  add to menu function is in file: this file
	 *
	 * Venues            ->event_espresso_venue_config_mnu
	 *   menu function is in file: includes/lite-files/venue-management.php OR
	 *   menu function is in file: includes/admin-files/venue-management/index.php
	 *  add to menu function is in file: this file
	 *
	 * Settings          ->organization_config_mnu
	 *   menu function is in file: includes/admin_screens/organization_config.php
	 *  add to menu function is in file: this file
	 *
	 * General           ->organization_config_mnu
	 *   menu function is in file: includes/admin_screens/organization_config.php
	 *  add to menu function is in file: this file
	 *
	 * Calendar          ->espresso_calendar_config_mnu
	 *   menu function is in file: plugins/espresso-calendar/espresso-calendar.php
	 *  add to menu function is in file: plugins/espresso-calendar/calendar_admin.php
	 *
	 * Facebook          ->espresso_fb_settings
	 *   menu function is in file: plugins/espresso-facebook/espresso-fb.php
	 *  add to menu function is in file: plugins/espresso-facebook/fb_admin.php
	 *
	 * MailChimp         ->event_espresso_mailchimp_settings
	 *   menu function is in file: plugins/espresso-mailchimp/mailchimp.model.class.php
	 *  add to menu function is in file: plugins/espresso-mailchimp/mailchimp_admin.php
	 *
	 * Members         ->event_espresso_member_config_mnu
	 *   menu function is in file: plugins/espresso-members/user_settings_page.php
	 *  add to menu function is in file: plugins/espresso-members/members_admin.php
	 *
	 * Payments         ->event_espresso_gateways_options
	 *   menu function is in file: includes/admin_screens/payment_gateways.php
	 *  add to menu function is in file: includes/admin_screens/payment_gateways.php
	 *
	 * Social Media         ->espresso_social_config_mnu
	 *   menu function is in file: plugins/espresso-socialmedia/espresso-social.php
	 *  add to menu function is in file: plugins/espresso-socialmedia/social_admin.php
	 *
	 * SSL/HTTPS         ->espresso_https_mnu
	 *   menu function is in file: plugins/espresso-https/espresso-https.php
	 *  add to menu function is in file: plugins/espresso-https/https_admin.php
	 *
	 * Permissions         ->espresso_permissions_config_mnu
	 *   menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *  add to menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *
	 * Settings         ->espresso_permissions_config_mnu
	 *   menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *  add to menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *
	 * User Roles         ->espresso_permissions_roles_mnu
	 *   menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *  add to menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *
	 * Locales/Regions         ->event_espresso_locale_config_mnu
	 *   menu function is in file: includes/lite-files/locale_management.php OR
	 *   menu function is in file: includes/admin-files/locale-management/index.php
	 *  add to menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *
	 * Regional Managers         ->espresso_permissions_user_groups
	 *   menu function is in file: plugins/espresso-permissions-pro/espresso-permissions-pro.php
	 *  add to menu function is in file: plugins/espresso-permissions/espresso-permissions.php
	 *
	 * Templates         ->event_espresso_manage_templates
	 *   menu function is in file: includes/lite-files/template_confg.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/template_confg.php
	 *  add to menu function is in file: this file
	 *
	 * Settings         ->event_espresso_manage_templates
	 *   menu function is in file: includes/lite-files/template_confg.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/template_confg.php
	 *  add to menu function is in file: this file
	 *
	 * Maps         ->event_espresso_manage_maps
	 *   menu function is in file: includes/lite-files/template_map_confg.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/template_map_confg.php
	 *  add to menu function is in file: this file
	 *
	 * Tickets         ->espresso_ticket_config_mnu
	 *   menu function is in file: plugins/espresso-ticketing/manager/index.php
	 *  add to menu function is in file: this file
	 *
	 * Certificates         ->espresso_certificate_config_mnu
	 *   menu function is in file: plugins/espresso-certificates/manager/index.php
	 *  add to menu function is in file: this file
	 *
	 * Extras         ->event_espresso_addons_mnu
	 *   menu function is in file: includes/lite-files/admin_addons.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/admin_addons.php
	 *  add to menu function is in file: this file
	 *
	 * Marketplace         ->event_espresso_addons_mnu
	 *   menu function is in file: includes/lite-files/admin_addons.php OR
	 *   menu function is in file: includes/admin-files/admin_screens/admin_addons.php
	 *  add to menu function is in file: this file
	 *
	 * Test Drive Pro         ->event_espresso_test_drive
	 *   menu function is in file: includes/lite-files/test_drive_pro.php
	 *  add to menu function is in file: this file
	 *
	 * Help/Support         ->event_espresso_support
	 *   menu function is in file: includes/admin_screens/admin_support.php
	 *  add to menu function is in file: this file
	 *
	 */
	function add_event_espresso_menus() {
		global $org_options, $espresso_premium, $ee_admin_page;
		do_action('action_hook_espresso_log', __FILE__, __FUNCTION__, '');
		$espresso_manager = '';

		//If the permissions manager is installed, then load the $espresso_manager global
		if (function_exists('espresso_permissions_config_mnu') && $espresso_premium == true) {
			global $espresso_manager;
		} else {
			$espresso_manager = array('espresso_manager_events' => '', 'espresso_manager_categories' => '', 'espresso_manager_form_groups' => '', 'espresso_manager_form_builder' => '', 'espresso_manager_groupons' => '', 'espresso_manager_discounts' => '', 'espresso_manager_event_emails' => '', 'espresso_manager_personnel_manager' => '', 'espresso_manager_general' => '', 'espresso_manager_calendar' => '', 'espresso_manager_members' => '', 'espresso_manager_payment_gateways' => '', 'espresso_manager_social' => '', 'espresso_manager_addons' => '', 'espresso_manager_support' => '', 'espresso_manager_venue_manager' => '', 'espresso_manager_pricing' => '');
		}

// ---------------------------------------
		//Main menu tab
		add_menu_page(__('Event Espresso', 'event_espresso'),
						'<span style=" font-size:12px">' . __('Event Espresso', 'event_espresso') . '</span>',
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_events']),
						'events',
						'event_espresso_manage_events',
						EVENT_ESPRESSO_PLUGINFULLURL . 'images/events_icon_16.png');

		//Event Setup
		$ee_admin_page['events'] = add_submenu_page('events',
						__('Event Espresso - Event Overview', 'event_espresso'),
						__('Events', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_events']),
						'events_sub',
						'event_espresso_manage_events');

		//Registration Overview
		$ee_admin_page['registrations'] = add_submenu_page('events',
						__('Event Espresso - Registration Overview', 'event_espresso'),
						__('Registrations', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_events']),
						'attendees',
						'event_espresso_manage_attendees');

		// Transactions
		$ee_admin_page['transactions'] = add_submenu_page('events',
						__('Event Espresso - Transactions', 'event_espresso'),
						__('Transactions', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_events']),
						'transactions',
						'event_espresso_manage_transactions');

		//Event Categories
		$ee_admin_page['event_categories'] = add_submenu_page('events', 
						__('Event Espresso - Manage Event Categories', 'event_espresso'), 
						__('Event Categories', 'event_espresso'), 
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_categories']),
						'event_categories',
						'event_espresso_categories_config_mnu');

		//Questions Groups
		$ee_admin_page['question_groups'] = add_submenu_page('events',
						__('Event Espresso - Question Groups', 'event_espresso'),
						__('Question Groups', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_form_groups']),
						'form_groups',
						'event_espresso_question_groups_config_mnu');

		//Form Questions
		$ee_admin_page['questions'] = add_submenu_page('events',
						__('Event Espresso - Questions', 'event_espresso'),
						__('Questions', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_form_builder']),
						'form_builder',
						'event_espresso_questions_config_mnu');

		//Discounts
		$ee_admin_page['discounts'] = add_submenu_page('events',
						__('Event Espresso - Promotional Codes', 'event_espresso'),
						__('Promotional Codes', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_discounts']),
						'discounts',
						'event_espresso_discount_config_mnu');

		//Groupons
		if (function_exists('event_espresso_groupon_config_mnu') && $espresso_premium == true) {
			$ee_admin_page['groupons'] = add_submenu_page('events',
							__('Groupons', 'event_espresso'),
							__('Groupon Codes', 'event_espresso'),
							apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_groupons']),
							'groupons',
							'event_espresso_groupon_config_mnu');
		}

		do_action('action_hook_espresso_add_new_submenu_to_group_main', $espresso_manager);

// ---------------------------------------

		// Management GROUP
		if ((function_exists('event_espresso_email_config_mnu') || $org_options['use_personnel_manager'] || $org_options['use_venue_manager']) && $espresso_premium) {
			add_submenu_page('events',
							__('Event Espresso - Management', 'event_espresso'),
							'<span class="ee_menu_group"  onclick="return false;">' . __('Management', 'event_espresso') . '</span>',
							apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_event_emails']),
							'event_emails',
							'event_espresso_email_config_mnu');

			//Email Manager
			$ee_admin_page['email'] = add_submenu_page('events',
							__('Event Espresso - Email Manager', 'event_espresso'),
							__('Emails', 'event_espresso'),
							apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_event_emails']),
							'event_emails',
							'event_espresso_email_config_mnu');

			//Pricing Manager
			$ee_admin_page['pricing'] = add_submenu_page('events',
							__('Event Espresso - Pricing Manager', 'event_espresso'),
							__('Pricing', 'event_espresso'),
							apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_pricing']),
							'pricing',
							'espresso_price_manager_menu');

			//Personnel
			if ($org_options['use_personnel_manager'] && $espresso_premium == true) {
				$ee_admin_page['staff'] = add_submenu_page('events',
								__('Event Espresso - Staff Manager', 'event_espresso'),
								__('Staff', 'event_espresso'),
								apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_personnel_manager']),
								'event_staff',
								'event_espresso_staff_config_mnu');
			}

			//Venues
			if ($org_options['use_venue_manager'] && $espresso_premium == true) {
				$ee_admin_page['venues'] = add_submenu_page('events',
								__('Event Espresso - Venue Manager', 'event_espresso'),
								__('Venues', 'event_espresso'),
								apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_venue_manager']),
								'event_venues',
								'event_espresso_venue_config_mnu');
			}
		}
		do_action('action_hook_espresso_add_new_submenu_to_group_management', $espresso_manager);

		// ---------------------------------------
		
		//Settings GROUP
		add_submenu_page('events',
						__('Event Espresso - Settings', 'event_espresso'),
						'<span class="ee_menu_group"  onclick="return false;">' . __('Settings', 'event_espresso') . '</span>',
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_general']),
						'event_espresso',
						'organization_config_mnu');

		//General Settings
		$ee_admin_page['general_settings'] = add_submenu_page('events',
						__('Event Espresso - General Settings', 'event_espresso'),
						__('General', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_general']),
						'event_espresso',
						'organization_config_mnu');

		$ee_admin_page['payment_settings'] = add_submenu_page('events',
						__('Event Espresso - Payment Settings', 'event_espresso'),
						__('Payments', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_payment_gateways']),
						'payment_gateways',
						'event_espresso_gateways_options');


		do_action('action_hook_espresso_add_new_submenu_to_group_settings', $espresso_manager);

		// ---------------------------------------
		
		//Templates GROUP
		add_submenu_page('events',
						__('Event Espresso - Template Settings', 'event_espresso'),
						'<span class="ee_menu_group"  onclick="return false;">' . __('Templates', 'event_espresso') . '</span>',
						'administrator',
						'template_confg',
						'event_espresso_manage_templates');

		//Event styles & templates
		$ee_admin_page['template_settings'] = add_submenu_page('events',
						__('Event Espresso - Template Settings', 'event_espresso'),
						__('Settings', 'event_espresso'),
						'administrator',
						'template_confg',
						'event_espresso_manage_templates');

		//Event Maps
		$ee_admin_page['map_settings'] = add_submenu_page('events',
						__('Event Espresso - Map Settings', 'event_espresso'),
						__('Maps', 'event_espresso'),
						'administrator',
						'template_map_confg',
						'event_espresso_manage_maps');


		//Ticketing Settings
		if (function_exists('espresso_ticket_config_mnu') && $espresso_premium == true) {
			$ee_admin_page['ticket_settings'] = add_submenu_page('events',
							__('Event Espresso - Ticket Settings', 'event_espresso'),
							__('Tickets', 'event_espresso'),
							'administrator',
							'event_tickets',
							'espresso_ticket_config_mnu');
		}

		//Certificate Settings
		if (function_exists('espresso_certificate_config_mnu') && $espresso_premium == true) {
			$ee_admin_page['certificate_settings'] = add_submenu_page('events',
							__('Event Espresso - Certificate Templates', 'event_espresso'),
							__('Certificates', 'event_espresso'),
							'administrator',
							'event_certificates',
							'espresso_certificate_config_mnu');
		}
		do_action('action_hook_espresso_add_new_submenu_to_group_templates', $espresso_manager);

		//Extras
		add_submenu_page('events',
						__('Event Espresso - Marketplace', 'event_espresso'),
						'<span class="ee_menu_group  onclick="return false;"" onclick="return false;">' . __('Extras', 'event_espresso') . '</span>',
						'administrator',
						'admin_addons',
						'event_espresso_addons_mnu');

		//Adds any extra pages
		do_action('action_hook_espresso_extra_pages', $espresso_manager);

		//Marketplace
		$ee_admin_page['marketplace'] = add_submenu_page('events',
						__('Event Espresso - Marketplace', 'event_espresso'),
						__('Marketplace', 'event_espresso'),
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_addons']),
						'admin_addons',
						'event_espresso_addons_mnu');

		//Test Drive Pro
		if ($espresso_premium != true) {
			$ee_admin_page['test_drive'] = add_submenu_page('events',
							__('Event Espresso - Test Drive Pro', 'event_espresso'),
							__('Test Drive Pro', 'event_espresso'),
							'administrator',
							'test_drive',
							'event_espresso_test_drive');
		}
		
		//Help/Support
		$ee_admin_page['support'] = add_submenu_page('events',
						__('Event Espresso - Help/Support', 'event_espresso'),
						'<span style="color: red;">' . __('Help/Support', 'event_espresso') . '</span>',
						apply_filters('filter_hook_espresso_management_capability', 'administrator', $espresso_manager['espresso_manager_support']),
						'support',
						'event_espresso_support');
	}

//End function add_event_espresso_menus()
}//End if (!function_exists('add_event_espresso_menus'))
add_action('admin_menu', 'add_event_espresso_menus');

//Example of adding an additional menu item to the "Extras" section of the menu.
/*function espresso_custom_reports_menu() {
	add_submenu_page('events', 'Espresso Custom Reports', 'Custom Reports', 'administrator', 'espresso_custom_reports', 'espresso_custom_reports');
}
add_action( 'action_hook_espresso_extra_pages', 'espresso_custom_reports_menu');*/
