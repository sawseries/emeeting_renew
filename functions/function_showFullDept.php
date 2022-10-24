<?php
function showFullDept($strCriteria=''){
			global $conntelcomm;
			global $database_conntelcomm;
            $strCriteria=(!empty($strCriteria))? $strCriteria:"$strCriteria" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsshowFullDept = "SELECT *
			FROM t_dept
			WHERE dept_id = '$strCriteria' " ;
			$rsshowFullDept = mysql_query($query_rsshowFullDept, $conntelcomm) or die(mysql_error());
			$row_rsshowFullDept= mysql_fetch_assoc($rsshowFullDept);
			//$totalRows_rsshowFullDept = mysql_num_rows($rsshowFullDept);
			$showFullDept=$row_rsshowFullDept['dept_name'];	
			//echo "xxxx = ".$query_rsshowFullDept ;			
			//echo "<br>xxxx = ".$fullDeptName ;
			return $showFullDept;
    }

function showFullLevel($strCriteria=''){
			global $conntelcomm;
			global $database_conntelcomm;
            $strCriteria=(!empty($strCriteria))? $strCriteria:"$strCriteria" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsshowFullLevel = "SELECT *
			FROM t_level
			WHERE levelId = '$strCriteria' " ;
			$rsshowFullLevel = mysql_query($query_rsshowFullLevel, $conntelcomm) or die(mysql_error());
			$row_rsshowFullLevel= mysql_fetch_assoc($rsshowFullLevel);
			//$totalRows_rsshowFullLevel = mysql_num_rows($rsshowFullLevel);
			$showFullLevel=$row_rsshowFullLevel['level'];	
			//echo "xxxx = ".$query_rsshowFullLevel ;			
			//echo "<br>xxxx = ".$fullDeptName ;
			return $showFullLevel;
    }

?>