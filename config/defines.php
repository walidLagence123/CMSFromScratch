<?php
/**
 * @author    PKandré <pululuandre@gmail.com>
 * @copyright 2019-2020 PKandré
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

 /* Debug only */
if (!defined('_PS_MODE_DEV_')) {
    define('_PS_MODE_DEV_', true);
}
if (_PS_MODE_DEV_ === true) {
    @ini_set('display_errors', 'on');
    @error_reporting(E_ALL | E_STRICT);
    define('_PS_DEBUG_SQL_', true);
} else {
    @ini_set('display_errors', 'off');
    define('_PS_DEBUG_SQL_', false);
}