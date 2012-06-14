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
 * Table tl_iso_prices_import
 */
$GLOBALS['TL_DCA']['tl_iso_prices_import'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'      => 'Memory',
		'closed'             => true,
		'onload_callback'    => array
		(
			array('tl_iso_prices_import', 'onload_callback')
		),
		'onsubmit_callback'  => array
		(
			array('tl_iso_prices_import', 'onsubmit_callback')
		),
    'dcMemory_showAll_callback' => array
    (
      array('tl_iso_prices_import', 'show_all')
    )
  ),
  
	// Palettes
	'palettes' => array
	(
		'default'           => '{import_legend},source,upload;{import_option},config_id,member_group,tax_class,run;{format_legend},delimiter,enclosure,columns,overwrite,force,invisible,clear;{publish_legend},start,stop'
	),

  // Fields
	'fields' => array
	(
	  'source' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['source'],
			'inputType'       => 'fileTree',
			'eval'            => array('fieldType'=>'checkbox', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'csv')
		),
		'upload' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['upload'],
			'inputType'       => 'upload'
		),
		'tax_class' => array
		(
			'label'					  => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['tax_class'],
			'inputType'				=> 'select',
			'default'				  => &$GLOBALS['TL_DCA']['tl_iso_products']['fields']['tax_class']['default'],
			'foreignKey'			=> 'tl_iso_tax_class.name',
			'eval'					  => array('includeBlankOption'=>true, 'tl_class'=>'clr'),
		),
		'config_id' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['config_id'],
			'inputType'       => 'select',
			'foreignKey'			=> 'tl_iso_config.name',
			'eval'					  => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
		),
		'member_group' => array
		(
			'label'					  => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['member_group'],
			'inputType'				=> 'select',
			'foreignKey'			=> 'tl_member_group.name',
			'eval'					  => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		),
		'delimiter' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['delimiter'],
			'inputType'       => 'select',
			'options'         => array('comma', 'semicolon', 'tabulator', 'linebreak'),
			'reference'       => &$GLOBALS['TL_LANG']['tl_iso_prices_import'],
			'eval'            => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'enclosure' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['enclosure'],
			'inputType'       => 'select',
			'options'         => array('double', 'single'),
			'reference'       => &$GLOBALS['TL_LANG']['tl_iso_prices_import'],
			'eval'            => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'columns' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['columns'],
			'inputType'       => 'multiColumnWizard',
			'eval'            => array
			                     (
			                       'columnsCallback' => array
			                       (
			                         'tl_iso_prices_import', 'createFieldSelectorArray'
			                       ), 
			                       'tl_class'       =>'clr',
			                       'mandatory'    	=> true
			                     )
		),
		'overwrite' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['overwrite'],
			'inputType'       => 'checkbox',
			'eval'            => array('tl_class'=>'w50 m12')
		),
		'force' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['force'],
			'inputType'       => 'checkbox',
			'eval'            => array('tl_class'=>'w50 m12')
		),
		'run' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['run'],
			'inputType'       => 'checkbox',
			'eval'            => array('tl_class'=>'w50 m12')
		),
		'invisible' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['invisible'],
			'inputType'       => 'checkbox',
			'eval'            => array('tl_class'=>'w50 m12')
		),
		'clear' => array
		(
			'label'           => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['clear'],
			'inputType'       => 'checkbox',
			'eval'            => array('tl_class'=>'w50 m12')
		),
		'start' => array
		(
			'label'					  => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['start'],
			'inputType'				=> 'text',
			'eval'					  => array
			                     (
			                      'rgxp'=>'date', 
			                      'datepicker'=>(
			                        method_exists($this,'getDatePickerString') ? 
			                        $this->getDatePickerString() : 
			                        true
			                     ), 
			                     'tl_class'=>'w50 wizard'),
		),
		'stop' => array
		(
			'label'					  => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['stop'],
			'inputType'				=> 'text',
			'eval'					  => array
			                     (
			                      'rgxp'=>'date', 
			                      'datepicker'=>(
			                        method_exists($this,'getDatePickerString') ? 
			                        $this->getDatePickerString() : 
			                        true
			                     ), 
			                     'tl_class'=>'w50 wizard'),
		)
	)
);


/**
 * Class tl_iso_prices_import
 *
 * Helper class for tl_iso_prices_import dca.
 * 
 * @copyright  Copyright (C) 2012 Kirsten Roschanski 
 * @author     Kirsten Roschanski 
 * @package    IsotopePriceImport 
 */
class tl_iso_prices_import extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('Database');
		$this->import('BackendUser', 'User');
		$this->loadLanguageFile('tl_iso_prices_import');
	}
	

	/**
	 * Load the data.
	 * 
	 * @param DataContainer $dc
	 */
	public function onload_callback(DataContainer $dc)
	{
		$varData = $this->Session->get('ISO_PRICES_IMPORT');

		if ($varData && is_array($varData))
		{
			foreach ($varData as $k=>$v)
			{
				$dc->setData($k, $v);
			}
		}	
	}

	
	/**
	 * Do the import.
	 * 
	 * @param DataContainer $dc
	 */
	public function onsubmit_callback(DataContainer $dc)
	{	 	
		$arrSource = $dc->getData('source');
		$arrUpload = $dc->getData('upload');

		// Get delimiter
		switch ($dc->getData('delimiter'))
		{
			case 'semicolon':
				$strDelimiter = ';';
				break;

			case 'tabulator':
				$strDelimiter = "\t";
				break;

			case 'linebreak':
				$strDelimiter = "\n";
				break;

			default:
				$strDelimiter = ',';
				break;
		}
		
		// Get enclosure
		switch ($dc->getData('enclosure'))
		{
			case 'single':
				$strEnclosure = '\'';
				break;

			default:
				$strEnclosure = '"';
				break;
		}
		
		$this->Session->set('ISO_PRICES_IMPORT', array
			(
			  'tax_class'    => $dc->getData('tax_class'),
	        'config_id'    => $dc->getData('config_id'),
	        'member_group' => $dc->getData('member_group'),
	        'delimiter'    => $dc->getData('delimiter'),
	        'enclosure'    => $dc->getData('enclosure'),
	        'columns'      => $dc->getData('columns'),
	        'force'        => $dc->getData('force'),
	        'run'          => $dc->getData('run'),
	        'invisible'    => $dc->getData('invisible'),
	        'clear'        => $dc->getData('clear'),
	        'overwrite'    => $dc->getData('overwrite'), 
	        'start'        => $dc->getData('start'), 
	        'stop'         => $dc->getData('stop'), 
	      )
		);
		
		$arrColumns        = deserialize($dc->getData('columns'));		
		$blnOverwrite      = $dc->getData('overwrite') ? true : false;
		$blnForce          = $dc->getData('force') ? true : false;
		$blnRun            = $dc->getData('run') ? true : false;
		$blnInvisible      = $dc->getData('invisible') ? true : false;
		$blnClear          = $dc->getData('clear') ? true : false;
		$intTaxClass       = (int)$dc->getData('tax_class');
		$intConfigID       = (int)$dc->getData('config_id');
		$intMemberGroup    = (int)$dc->getData('member_group');
		$intStart          = (int)$dc->getData('start') > 0 ? (int)$dc->getData('start') : '';
		$intStop           = (int)$dc->getData('stop') > 0 ? (int)$dc->getData('stop') : '';
		$time              = time();
		$intTotal          = 0;
		$intOverwrite      = 0;
		$intSkipped        = 0;
		$intForce          = 0;
		$intRun            = 0;
		$intInvisible      = 0;
		$intClear          = 0;

		
	   #-- dann wollen wir mal
		# Datei aus dem Filesystem
	   if (is_array($arrSource))
		{	
			foreach ($arrSource as $strCsvFile)
			{
				$objFile = new File($strCsvFile);
				
				if ($objFile->extension != 'csv')
				{
					$_SESSION['TL_ERROR'][] = sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension);
					continue;
				}
				
				$this->importRecipients($objFile->handle, $strDelimiter, $strEnclosure, $arrColumns, $blnOverwrite, $blnForce, $intTaxClass, $intConfigID, $intMemberGroup, $intStart, $intStop, $time, $intTotal, $intOverwrite, $intSkipped, $intForce, $blnRun, $intRun, $blnInvisible, $intInvisible, $blnClear, $intClear );
				$objFile->close();
			}
		}
		
		# Datei aus dem Upload
		if ($arrUpload)
		{	
			$resFile = fopen($arrUpload['tmp_name'], 'r');
			
			$this->importRecipients($resFile, $strDelimiter, $strEnclosure, $arrColumns, $blnOverwrite, $blnForce, $intTaxClass, $intConfigID, $intMemberGroup, $intStart, $intStop, $time, $intTotal, $intOverwrite, $intSkipped, $intForce, $blnRun, $intRun, $blnInvisible, $intInvisible, $blnClear, $intClear);
			
			fclose($resFile);
		}

		if ($intTotal > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['confirmed'], $intTotal
			);
		}
		
		if ($intOverwrite > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['overwritten'], $intOverwrite
			);
		}
		
		if ($intSkipped > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['skipped'], $intSkipped
			);
		}
		
		if ($intForce > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['forced'], $intForce
			);
		}
		
		if ($intRun > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['run_imported'], $intRun
			);
		}
		
		if ($intInvisible > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['set_invisible'], $intInvisible
			);
		}    
		
		if ($intClear > 0)
		{
			$_SESSION['TL_CONFIRM'][] = sprintf
			(
			  $GLOBALS['TL_LANG']['tl_iso_prices_import']['cleared'], $intClear
			);
		} 		
		setcookie('BE_PAGE_OFFSET', 0, 0, '/');

		$this->reload();	
  }
  
	/**
	 * Create the columns definition array.
	 * 
	 * @return array
	 */
	public function createFieldSelectorArray()
	{
	  # Attribute für Cup-Größe (7) und Deckel-Größe (57)
	  $objAttributes = $this->Database->execute("SELECT options FROM tl_iso_attributes WHERE id=7 OR id=57")->fetchAllAssoc();
	  
	  $col_attribute[] = '-';
	  foreach ($objAttributes as $objAttribute)
		{
	    $arrOptions = deserialize($objAttribute['options']);

      foreach ($arrOptions as $option)
		  {
		    $col_attribute[$option['value']] = $option['label'];
      }	  
	  }
	  # Produkttype
	  $col_type[] = $GLOBALS['TL_LANG']['tl_iso_prices_import']['first_col_type'];

	  $objTypes = $this->Database->execute("SELECT id, name FROM tl_iso_producttypes ORDER BY id");
	  while ($objTypes->next())
		{
      $col_type[$objTypes->id] = $objTypes->name;      
    }
    
    # Auswahl-Array (3-spaltig)  
		$arr = array
		(
			'colnum' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['colnum'],
				'inputType' => 'select',
				'options'   => array(0=>1,1=>2,2=>3,3=>4,4=>5,5=>6,6=>7,7=>8,8=>9,9=>10,10=>11,11=>12,12=>13,13=>14,14=>15,15=>16,16=>17,17=>18,18=>19,19=>20),
				'eval'      => array('style'=>'width:100px')
			),
			'type' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['type'],
				'inputType' => 'select',
				'options'   => $col_type,
				'eval'      => array('style'=>'width:300px')
			),
			'attribute' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_iso_prices_import']['attribute'],
				'inputType' => 'select',
				'options'   => $col_attribute,
				'eval'      => array('style'=>'width:150px')
			)
		);

		return $arr;
	} 

  /**
   * Change active mode to edit
   *
   * @return string
   */
  public function show_all($dc, $strReturn)
  {
      return $strReturn . $dc->edit();
  }
  
  
	/**
	 * Read a csv file and import the data.
	 * 
	 * @param handle $resFile
	 * @param string $strDelimiter
	 * @param string $strEnclosure
	 * @param int $time
	 * @param int $intTotal
	 * @param int 
	 */
	protected function importRecipients($resFile, $strDelimiter, $strEnclosure, $arrColumns, $blnOverwrite, $blnForce, &$intTaxClass, &$intConfigID, &$intMemberGroup, &$intStart, &$intStop, $time, &$intTotal, &$intOverwrite, &$intSkipped, &$intForce, $blnRun, &$intRun, $blnInvisible, &$intInvisible, $blnClear, &$intClear)
	{		
    // Modul deaktivieren
#	  $this->import('Config');
#	  $arrInactiveModules = deserialize($GLOBALS['TL_CONFIG']['inactiveModules']);
#	  $arrInactiveModules[] = 'isotope';
#    $this->Config->update("\$GLOBALS['TL_CONFIG']['inactiveModules']", serialize($arrInactiveModules));

		$arrRecipients        = array();
		$arrRun               = array();
		$attribute_update_ids = array();
		
		// Auflagen Spalte suchen!
		foreach ($arrColumns as $intColnum=>$strField)
		{
		    $strField = deserialize($strField);
		    $colnum   = floatval($strField['colnum']) - 1;
		    
		    if ( $strField['type'] == '0' )
		    {
		    	$run_col = $colnum;
		    }	
		}		
   
      // Daten aus CVS holen
		while(($arrRow = @fgetcsv($resFile, null, $strDelimiter, $strEnclosure)) !== false)
		{
		  // Auflage einlesen
	     if ( is_numeric($arrRow[$run_col]) )
	     {
		  	 $arrRun[] = array( 
		  	 					'value' => $arrRow[$run_col], 
		  	 					'label' => substr_replace($arrRow[$run_col], '.', -3, 0) 
		  	 				 );		    
		  }						
					 
		  foreach ($arrColumns as $intColnum=>$strField)
		  {
		    $strField             = deserialize($strField);
		    $colnum               = floatval($strField['colnum']) - 1;    
		    
		    if ( $strField['type'] != '0' && is_numeric($arrRow[$colnum])) 
		    {		    
		      $arrRecipients[] = array 
		      (
		        'type'      => (int)$strField['type'],
		        'attribute' => $strField['attribute'],
		        'price'     => (float)$arrRow[$colnum],
		        'run'       => (int)$arrRow[$run_col] 
		      );
		      // Deckel gefunden
				if((int)$strField['type'] == 11) 
				{
					$attribute_update_ids[58] = 'id=58';
				}
				else 
				{
					$attribute_update_ids[6] = 'id=6';		      
				}		      
		      
		     }
	        elseif ($strField['type'] == '0' && !is_numeric($arrRow[$colnum])) 
	        { 
	          ++$intSkipped;  
	        }			
	      }
			unset($arrRow);
		}
		
		if( $blnRun ) {
			$where = implode(" OR ", $attribute_update_ids);		
			$this->Database->prepare("UPDATE tl_iso_attributes SET options=? WHERE $where")
      	               ->execute(serialize($arrRun));
		}		
		
		// alle Hauptprodukt-IDs holen
		$arrProducts =  $this->Database->execute("SELECT id, type FROM tl_iso_products WHERE pid=0");
      while ($arrProducts->next())
		{
		  $p_product_id[$arrProducts->type] = $arrProducts->id;
		}

      // DB eintragen/updaten/...		
		foreach ($arrRecipients as $arrRecipient)
		{
		  $type   = $arrRecipient['type'];
		  $run    = $arrRecipient['run'];
		  $cuptyp = $arrRecipient['attribute'];
		  $price  = $arrRecipient['price'];
		  			
		  $col_run = $type == 11 ? 'lidrun' : 'cuprun';
		  $col_typ = $cuptyp == 0 ? 'lidsize' : 'cuptyp';	
		  	
		  // Check whether the exists
		  $objExistingRecipient = $this->Database->prepare
		  ("
	        SELECT id, published
	        FROM tl_iso_products     
	        WHERE type=?
	          AND ".$col_run."=?
	          AND ".$col_typ."=?   
	      ")->limit(1)->execute($type,$run,$cuptyp);

      	$products_id     = $objExistingRecipient->id;
         $published       = $objExistingRecipient->published;     
         
         if( isset($products_id) ) 
         {
	         $objExistingRecipient = $this->Database->prepare
			   ("
		        SELECT id
		        FROM tl_iso_prices     
		        WHERE tax_class=?
		          AND config_id=?
		          AND member_group=?
		          AND pid=?
		          AND start=?
		          AND stop=?   
		      ")
		      ->limit(1)
		      ->execute($intTaxClass,$intConfigID,$intMemberGroup,$products_id,$intStart,$intStop);
		      
	         $prices_id       = $objExistingRecipient->id;
	         $price_tiers_pid = $objExistingRecipient->id;
			}                  
			    
	      // soll aktiviert werden
	      if ($blnForce && isset($products_id) && $published != 1  && !$blnInvisible && !$blnClear)
			{ 			
	      	$this->Database->prepare("UPDATE tl_iso_products SET published=1 WHERE id=?")
	      	               ->execute($products_id);	  	               		
				++$intForce;			
			}
	      // soll deaktiviert werden
	      else if ( isset($products_id) && $published = 1  && $blnInvisible && !$blnClear)
			{ 			
	      	$this->Database->prepare("UPDATE tl_iso_products SET published=0 WHERE id=?")
	      	               ->execute($products_id);	  	               		
				++$intInvisible;
				continue;			
			}
	      // soll gelöscht werden
	      else if ( isset($products_id) && $blnClear)
			{ 			
	      	$this->Database->prepare("DELETE FROM tl_iso_products WHERE id=?")
	      	               ->execute($products_id);
	      	$this->Database->prepare("DELETE FROM tl_iso_prices WHERE id=?")
	      	               ->execute($prices_id);     
	      	$this->Database->prepare("DELETE FROM tl_iso_price_tiers WHERE pid=?")
	      	               ->execute($price_tiers_pid);             	  	               		
				++$intClear;	
				continue;		
			}
	
			// soll aktualisiert werden
			if (!$blnOverwrite && isset($prices_id) )
			{
				++$intSkipped;
				continue;
			}
				
			if (!isset($products_id))
			{
	
			  $this->Database->prepare("INSERT INTO tl_iso_products  
			                            (tstamp, pid, type, published, ".$col_run.", ".$col_typ.", dateAdded)
			                            VALUES (?,?,?,?,?,?,?)")
							     ->execute($time, $p_product_id[$type], $type, 1, $run, $cuptyp, $time);
				  
			  $this->Database->prepare("INSERT INTO tl_iso_prices  
			                            (tstamp, pid, tax_class, config_id, member_group, start, stop) 
			                            VALUES (?,LAST_INSERT_ID(),?,?,?,?,?)")
							     ->execute($time, $intTaxClass, $intConfigID, $intMemberGroup, $intStart, $intStop);
										     
			  $this->Database->prepare("INSERT INTO tl_iso_price_tiers 
				                          (pid,tstamp,min,price) 
				                          VALUES (LAST_INSERT_ID(), ?, 1, ?)")
				              ->execute($time,$price);
	
			  ++$intTotal;
			}
			else if( isset($products_id) && !isset($prices_id)) 
			{
			  $this->Database->prepare("INSERT INTO tl_iso_prices  
			                            (tstamp, pid, tax_class, config_id, member_group, start, stop) 
			                            VALUES (?,?,?,?,?,?,?)")
							     ->execute($time, $products_id, $intTaxClass, $intConfigID, $intMemberGroup, $intStart, $intStop);
										     
			  $this->Database->prepare("INSERT INTO tl_iso_price_tiers 
				                          (pid,tstamp,min,price) 
				                          VALUES (LAST_INSERT_ID(), ?, 1, ?)")
				              ->execute($time,$price);	
			  ++$intTotal;
			}			
			else
			{
			  $this->Database->prepare("UPDATE tl_iso_price_tiers SET tstamp=?, price=? WHERE pid=? AND min=1")
			                 ->execute($time, $price, $price_tiers_pid);               
			  ++$intOverwrite;
			}
		}				
	}	 	
}

