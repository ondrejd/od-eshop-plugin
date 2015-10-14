<?php
/*
Plugin Name: ondrejd's E-shop Plugin
Plugin URI: https://github.com/ondrejd/od-eshop-plugin/
Description: WordPress plug-in that allow to manage files that you want to offer to visitors of your pages for download. Allow to use either sidebar widget or whole dowload page.
Version: 0.1
Author: Ondřej Doněk
Author URI: http://ondrejdonek.blogspot.cz/
*/

/*  ***** BEGIN LICENSE BLOCK *****
    Version: MPL 1.1

    The contents of this file are subject to the Mozilla Public License Version
    1.1 (the "License"); you may not use this file except in compliance with
    the License. You may obtain a copy of the License at
    http://www.mozilla.org/MPL/

    Software distributed under the License is distributed on an "AS IS" basis,
    WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
    for the specific language governing rights and limitations under the
    License.

    The Original Code is WordPress Photogallery Plugin.

    The Initial Developer of the Original Code is
    Ondrej Donek.
    Portions created by the Initial Developer are Copyright (C) 2009
    the Initial Developer. All Rights Reserved.

    Contributor(s):

    ***** END LICENSE BLOCK ***** */

// TODO Add test if autoload exists! Otherwise show message to the user.
require_once dirname(__FILE__) . '/vendor/autoload.php';

/**
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @since 0.1
 */
class odWpEshopPlugin extends \odwp\SimplePlugin
{
	protected $id = 'od-eshop-plugin';
	protected $version = '0.1';
	protected $textdomain = 'od-eshop-plugin';
    protected $enable_default_options_page = true;

	/**
	 * Constructor.
	 *
     * @since 0.1
	 * @return void
	 */
	public function __construct() {
		$this->init_locales();

		$this->options = array();
		$this->options[] = new \odwp\PluginOption(
			'main_eshop_dir',
			__('E-shop folder', $this->get_textdomain()),
			\odwp\PluginOption::TYPE_STRING,
			'wp-content/eshop/',
			__('Relative path (from WordPress root) where will be storred e-shop files.', $this->get_textdomain())
		);

		parent::__construct();
	}

    /**
     * Returns title of the plug-in.
     *
     * @since 0.1
     * @param string $suffix (Optional.)
     * @param string $sep (Optional.)
     * @return string
     */
    public function get_title($suffix = '', $sep = ' - ') {
		if (empty($suffix)) {
			return __('E-shop', $this->get_textdomain());
		}

		return sprintf(
			__('E-shop%s%s', $this->get_textdomain()),
			$sep,
			$suffix
		);
	}
} // End of odWpEshopPlugin

// ===========================================================================
// Plugin initialization

global $od_eshop_plugin;

$od_eshop_plugin = new odWpEshopPlugin();
