<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Copyright (C) 2012 Kirsten Roschanski 
 * @author     Kirsten Roschanski 
 * @package    IsotopePriceImport 
 * @license    LGPL 
 * @filesource
 */


/**
 * BACK END MODULES
 */ 
 
  if (!is_array($GLOBALS['BE_MOD']['isotope']))
  {
	  array_insert($GLOBALS['BE_MOD'], 1, array('isotope' => array()));
  }
  $GLOBALS['BE_MOD']['isotope']['iso_prices_import'] = array(
	  'tables'		  => array('tl_iso_prices_import'),
	  'icon'			  => 'system/modules/isotope_prices_import/html/isotope_prices_import.png',
  );
  
/**
 * Form fields
 */
$GLOBALS['BE_FFL']['upload']  = 'UploadField';

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('IsotopePricesImport', 'hookOutputBackendTemplate');

/**
 * Hack: Fix ajax load import source tree.
 */
if (($_GET['do'] == 'tl_iso_prices_import') && ($_GET['isAjax'] || $_POST['isAjax']))
{
	unset($_GET['do']);
}
  
?>
