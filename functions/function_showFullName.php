<?php
function showFullName($strDB='',$strPK=''){
			global $conntelcomm;
            $strDB=(!empty($strDB))? $strDB:"db_x_track_v2" ;
            $strPK=(!empty($strPK))? $strPK:"$strPK" ;

			mysql_select_db($strDB, $conntelcomm);
			$query_rsshowFullName = "SELECT *
			FROM t_user
			WHERE User_name = '$strPK' " ;
			$rsshowFullName = mysql_query($query_rsshowFullName, $conntelcomm) or die(mysql_error());
			$row_rsshowFullName= mysql_fetch_assoc($rsshowFullName);
			$showFullName=$row_rsshowFullName['User_Fullname'];		
			return $showFullName;
    }
?>