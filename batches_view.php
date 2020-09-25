<?php
// This script and data application were generated by AppGini 5.62
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/batches.php");
	include("$currDir/batches_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('batches');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "batches";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`batches`.`id`" => "id",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`suppliers1`.`supplier`), CONCAT_WS('',   `suppliers1`.`supplier`), '') /* Supplier */" => "supplier",
		"`batches`.`batch_no`" => "batch_no",
		"if(`batches`.`manufacturing_date`,date_format(`batches`.`manufacturing_date`,'%d/%m/%Y'),'')" => "manufacturing_date",
		"if(`batches`.`expiry_date`,date_format(`batches`.`expiry_date`,'%d/%m/%Y'),'')" => "expiry_date",
		"`batches`.`balance`" => "balance"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`batches`.`id`',
		2 => '`items1`.`item`',
		3 => '`suppliers1`.`supplier`',
		4 => 4,
		5 => '`batches`.`manufacturing_date`',
		6 => '`batches`.`expiry_date`',
		7 => '`batches`.`balance`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`batches`.`id`" => "id",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`suppliers1`.`supplier`), CONCAT_WS('',   `suppliers1`.`supplier`), '') /* Supplier */" => "supplier",
		"`batches`.`batch_no`" => "batch_no",
		"if(`batches`.`manufacturing_date`,date_format(`batches`.`manufacturing_date`,'%d/%m/%Y'),'')" => "manufacturing_date",
		"if(`batches`.`expiry_date`,date_format(`batches`.`expiry_date`,'%d/%m/%Y'),'')" => "expiry_date",
		"`batches`.`balance`" => "balance"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`batches`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "Item",
		"IF(    CHAR_LENGTH(`suppliers1`.`supplier`), CONCAT_WS('',   `suppliers1`.`supplier`), '') /* Supplier */" => "Supplier",
		"`batches`.`batch_no`" => "Batch code",
		"`batches`.`manufacturing_date`" => "Manufacturing date",
		"`batches`.`expiry_date`" => "Expiry date",
		"`batches`.`balance`" => "Balance"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`batches`.`id`" => "id",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`suppliers1`.`supplier`), CONCAT_WS('',   `suppliers1`.`supplier`), '') /* Supplier */" => "supplier",
		"`batches`.`batch_no`" => "batch_no",
		"if(`batches`.`manufacturing_date`,date_format(`batches`.`manufacturing_date`,'%d/%m/%Y'),'')" => "manufacturing_date",
		"if(`batches`.`expiry_date`,date_format(`batches`.`expiry_date`,'%d/%m/%Y'),'')" => "expiry_date",
		"`batches`.`balance`" => "balance"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'item' => 'Item', 'supplier' => 'Supplier');

	$x->QueryFrom = "`batches` LEFT JOIN `items` as items1 ON `items1`.`id`=`batches`.`item` LEFT JOIN `suppliers` as suppliers1 ON `suppliers1`.`id`=`batches`.`supplier` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "batches_view.php";
	$x->RedirectAfterInsert = "batches_view.php?SelectedID=#ID#";
	$x->TableTitle = "Batches";
	$x->TableIcon = "resources/table_icons/box_closed.png";
	$x->PrimaryKey = "`batches`.`id`";
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Item", "Supplier", "Batch code", "Manufacturing date", "Expiry date", "Balance");
	$x->ColFieldName = array('item', 'supplier', 'batch_no', 'manufacturing_date', 'expiry_date', 'balance');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7);

	// template paths below are based on the app main directory
	$x->Template = 'templates/batches_templateTV.html';
	$x->SelectedTemplate = 'templates/batches_templateTVS.html';
	$x->TemplateDV = 'templates/batches_templateDV.html';
	$x->TemplateDVP = 'templates/batches_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `batches`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='batches' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `batches`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='batches' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`batches`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: batches_init
	$render=TRUE;
	if(function_exists('batches_init')){
		$args=array();
		$render=batches_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// column sums
	if(strpos($x->HTML, '<!-- tv data below -->')){
		// if printing multi-selection TV, calculate the sum only for the selected records
		if(isset($_REQUEST['Print_x']) && is_array($_REQUEST['record_selector'])){
			$QueryWhere = '';
			foreach($_REQUEST['record_selector'] as $id){   // get selected records
				if($id != '') $QueryWhere .= "'" . makeSafe($id) . "',";
			}
			if($QueryWhere != ''){
				$QueryWhere = 'where `batches`.`id` in ('.substr($QueryWhere, 0, -1).')';
			}else{ // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		}else{
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery="select sum(`batches`.`balance`) from ".$x->QueryFrom.' '.$QueryWhere;
		$res=sql($sumQuery, $eo);
		if($row=db_fetch_row($res)){
			$sumRow ="<tr class=\"success\">";
			if(!isset($_REQUEST['Print_x'])) $sumRow.="<td class=\"text-center\"><strong>&sum;</strong></td>";
			$sumRow.="<td></td>";
			$sumRow.="<td></td>";
			$sumRow.="<td></td>";
			$sumRow.="<td></td>";
			$sumRow.="<td></td>";
			$sumRow.="<td class=\"text-right\">{$row[0]}</td>";
			$sumRow.="</tr>";

			$x->HTML=str_replace("<!-- tv data below -->", '', $x->HTML);
			$x->HTML=str_replace("<!-- tv data above -->", $sumRow, $x->HTML);
		}
	}

	// hook: batches_header
	$headerCode='';
	if(function_exists('batches_header')){
		$args=array();
		$headerCode=batches_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: batches_footer
	$footerCode='';
	if(function_exists('batches_footer')){
		$args=array();
		$footerCode=batches_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>