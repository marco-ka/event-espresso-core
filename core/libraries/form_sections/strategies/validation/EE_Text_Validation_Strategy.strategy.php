<?php if ( ! defined('EVENT_ESPRESSO_VERSION')) { exit('No direct script access allowed'); }
/**
 * EE_Text_Validation_Strategy
 * Optionally, a regular expression can be provided that will be used for validation.
 *
 * @package			Event Espresso
 * @subpackage	Expression package is undefined on line 19, column 19 in Templates/Scripting/PHPClass.php.
 * @author				Mike Nelson
 */
class EE_Text_Validation_Strategy extends EE_Validation_Strategy_Base{

	protected $_regex = null;


	/*
	 * indicates whether or not this validation strategy is general enough that it can be applied to any/most input
	 * a validation strategy that only applies to one,or very few, input type(s) would set this value to false
	 *
	 *  @var boolean $_generally_applicable
	 */
	protected static $_generally_applicable = true;



	public function __construct( $validation_error_message = NULL, $regex = null ) {
		$this->_regex = $regex;
		parent::__construct( $validation_error_message );
	}



	/**
	 * @param mixed $normalized_value
	 * @throws \EE_Validation_Error
	 */
	public function validate($normalized_value) {
		if( $this->_regex && $normalized_value) {
			if( ! preg_match( $this->_regex, $normalized_value ) ) {
				throw new EE_Validation_Error( $this->get_validation_error_message(), 'regex' );
			}
		}
	}

	/**
	 * @return array
	 */
	function get_jquery_validation_rule_array(){
		if( $this->_regex !== null ){
			return array( 'regex'=> $this->regex_js(), 'messages' => array( 'regex' => $this->get_validation_error_message() ) );
		}else{
			return array();
		}

	}

/**
 * Translates a PHP regex into a javascript regex (eg, PHP needs separate delimiters, whereas
 * javascript does not
 * @return string
 */
	function regex_js() {
		//first character must be the delimiter
		$delimiter = $this->_regex[0];
		$last_occurrence_of_delimiter = strrpos($this->_regex, $delimiter );
		return substr( $this->_regex, 1, $last_occurrence_of_delimiter - 1 );
	}
}

// End of file EE_FUll_HTML_Validation_Strategy.strategy.php