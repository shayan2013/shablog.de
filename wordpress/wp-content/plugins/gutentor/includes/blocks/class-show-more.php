<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gutentor_Show_More' ) ) {

	/**
	 * Functions related to About Block
	 *
	 * @package Gutentor
	 * @since 1.1.5
	 */

	class Gutentor_Show_More extends Gutentor_Block_Base {

		/**
		 * Name of the block.
		 *
		 * @access protected
		 * @since 1.1.5
		 * @var string
		 */
		protected $block_name = 'show-more';

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @since 1.1.5
		 * @return object
		 */
		public static function get_instance() {

			// Store the instance locally to avoid private static replication
			static $instance = null;

			// Only run these methods if they haven't been ran previously
			if ( null === $instance ) {
				$instance = new self();
			}

			// Always return the instance
			return $instance;

		}
	}
}
Gutentor_Show_More::get_instance()->run();
