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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_iso_prices_import']['source']       = array('Import-Quelle', 'Wählen Sie hier die Datei aus, die Sie importieren möchten.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['upload']       = array('Import-Upload', 'Laden Sie eine Datei hoch, die Sie importieren möchten.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['delimiter']    = array('Feldtrenner', 'Wählen Sie hier das Zeichen aus, nach dem die einzelnen Felder getrennt sind.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['enclosure']    = array('Texttrenner', 'Wählen Sie hier das Zeichen aus, nach dem der Text getrennt ist.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['columns']      = array('Spaltenzuordnung', 'Wählen Sie hier, wie die Spalten zugeordnet werden sollen.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['overwrite']    = array('Bestehende Einträge überschreiben', 'Wählen Sie diese Option, um bestehende Einträge zu überschreiben/aktualisieren.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['force']        = array('Alle aktivieren', 'Warnung: Nutzen Sie diese Option mit Bedacht und nur dann, wenn Sie wissen was Sie tun! Es werden alle Produktvariationen als Veröffentlicht angezeigt.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['run']          = array('Auflage aktualisieren', 'Warnung: Nutzen Sie diese Option mit Bedacht und nur dann, wenn Sie wissen was Sie tun! Es werden die neuen Auflagen als Produktvariationen neu erzeugt!');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['invisible']    = array('Alle deaktivieren', 'Warnung: Nutzen Sie diese Option mit Bedacht und nur dann, wenn Sie wissen was Sie tun! Es werden alle Produktvariationen als Unsichtbar angezeigt.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['clear']        = array('Alle löschen', 'Warnung: Nutzen Sie diese Option mit Bedacht und nur dann, wenn Sie wissen was Sie tun! Werden alle Produktvariationen gelöscht.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['tax_class']    = array('Steuerklasse', 'Bitte wählen Sie eine Steuerklasse für diesen Preis.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['config_id']    = array('Shop-Konfiguration', 'Wählen Sie eine Shop-Konfiguration für diesen Preis.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['member_group'] = array('Preisgruppe', 'Wählen Sie eine Preisgruppe (Mitgliedergruppe) für diesen Preis.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['start']        = array('Startdatum', 'Nutze den Preis nicht vor diesem Tag.');
$GLOBALS['TL_LANG']['tl_iso_prices_import']['stop']         = array('Stopdatum', 'Nutze den Preis nicht nach diesem Tag.');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_iso_prices_import']['double']          = 'Doppelte Anführungszeichen "';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['single']          = 'Einfache Anführungszeichen \'';

$GLOBALS['TL_LANG']['tl_iso_prices_import']['comma']           = 'Komma ,';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['semicolon']       = 'Semikolon ;';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['tabulator']       = 'Tabulator \t';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['linebreak']       = 'Zeilenumbruch \n';

$GLOBALS['TL_LANG']['tl_iso_prices_import']['colnum']          = 'Spaltennummer';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['type']            = 'Produkttyp';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['attribute']       = 'Attribut';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['confirmed']       = '%s neue Produktpreise wurden importiert.';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['overwritten']     = '%s Produktpreise wurden aktualisiert.';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['skipped']         = '%s Einträge wurden übersprungen.';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['invalid']         = '%s ungültige Einträge wurden übersprungen.';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['forced']          = '%s Einträge wurden aktiviert.'; 
$GLOBALS['TL_LANG']['tl_iso_prices_import']['run_imported']    = '%s Attribute wurden importiert.'; 
$GLOBALS['TL_LANG']['tl_iso_prices_import']['set_invisible']   = '%s Einträge wurden unsichtbar geschaltet.'; 
$GLOBALS['TL_LANG']['tl_iso_prices_import']['cleared']         = '%s Einträge wurden gelöscht.'; 
$GLOBALS['TL_LANG']['tl_iso_prices_import']['edit']            = 'CSV-Import';

$GLOBALS['TL_LANG']['tl_iso_prices_import']['first_col_type']  = 'Auflage';

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_iso_prices_import']['import_legend']    = 'Import';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['format_legend']    = 'CSV Format';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['import_option']    = 'Import Einstellungen';
$GLOBALS['TL_LANG']['tl_iso_prices_import']['publish_legend']   = 'Veröffentlichung';


/**
 * Errors
 */
$GLOBALS['TL_LANG']['tl_iso_prices_import']['doubles']  = 'Jede Spalte und jedes Feld darf nur ein mal ausgewählt werden!';

?>
