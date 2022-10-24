<?php
// ส่งค่า สถานะเอกสาร
function checkDocStat($AppStat){
							          switch ($AppStat) {
										  	case 0:
														$AppStat= "เอกสารสร้างใหม่ รอส่งตรวจ";
												break;
											case 1:
														$AppStat= "ไม่อนุมัติให้พิมพ์เสนอ";
												break;
											case 2:
														$AppStat="อนุมัติให้พิมพ์เสนอได้";
												break;
											case 3:
														$AppStat="อยู่ระหว่างตรวจสอบ";
												break;
											case 4:
														$AppStat= "ส่งกลับ - แก้ไข";
												break;
										}
return $AppStat;
}
// ส่งค่า สถานะเมนู     
function checkSubMenuStat($SubMenuStat){
							          switch ($SubMenuStat) {
										  	case 10:
														$SubMenuStat= "อนุมัติแล้ว";
												break;
											case 11:
														$SubMenuStat= "ไม่อนุมัติ";
												break;
											case 12:
														$SubMenuStat="ส่งคืนแก้ไข";
												break;
											case 13:
														$SubMenuStat="รอดำเนินการ";
												break;
											case 14:
														$SubMenuStat= "ค้างรับ";
												break;
											case 15:
														$SubMenuStat= "เก็บเข้าแฟ้มดำเนินการเสร็จ";
												break;
										}
return $SubMenuStat;
}

// ส่งค่า ความเร่งด่วน
function check_piority($piority){
							          switch ($piority) {
											case 1:
														$strPiority= "ปกติ";
												break;
											case 2:
														$strPiority="ด่วน";
												break;
											case 3:
														$strPiority="ด่วนมาก";
												break;
											case 4:
														$strPiority= "ด่วนที่สุด";
												break;
										}
return $strPiority;
}
// ส่งค่า ชั้นความลับ
function check_identify($identify){
							          switch ($identify) {
											case 0:
														$strIdentify= "ไม่กำหนดชั้นความลับ";
                                               break;
											case 1:
														$strIdentify= "ลับ";
												break;
											case 2:
														$strIdentify="ลับมาก";
												break;
											case 3:
														$strIdentify="ลับที่สุด";
												break;
										}
return $strIdentify;
}

//แปลงจากตัวเลขเป็นจำนวนเงิน
function intToMoney($num){
$num=intval($num);
$ed=strlen($num)%3;
$str=substr($num,0,$ed); 
for($i=$ed;$i<strlen($num);$i+=3)
$str=$str.",".substr($num,$i,3);
if($ed==0)
$str=substr($str,1,strlen($str));
return $str;
}
//วันที่ของปี
function dayofyear($date){
$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);
$m=array();
$m['01']=0;$m['02']=31;$m['03']=59;$m['04']=90;$m['05']=120;$m['06']=151;
$m['07']=181;$m['08']=212;$m['09']=243;$m['10']=273;$m['11']=304;$m['12']=334;
$day=$m[$mm];
if(($yy%4==0)&&($mm>"02"))
$dayofyear=$day+$dd+1;
else
$dayofyear=$day+$dd;
return $dayofyear;
}
 //หาจำนวนวันเริ่มจากวันที่เริมต้นถึงวันที่สิ้นสุด
function numDay($st_date,$ed_date){
$st_y=substr($st_date,0,4);
$ed_y=substr($ed_date,0,4);
$st_dofy=dayofyear($st_date);
$ed_dofy=dayofyear($ed_date);
if($st_y<>$ed_y){
for($i=$st_y;$i<=$ed_y;$i++){		
		if($i%4==0)
		$day=366;
		else 
		$day=365;
		if($i==$st_y)
		$day=$day-$st_dofy;
		if($i==$ed_y)
		$day=$ed_dofy;
		$num=$num+$day;
}
}else{
$num=$ed_dofy-$st_dofy;
}return $num;
}
//ฟังก์ชั่น วันที่
function dateThai($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม.","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤษจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".substr($yy,2,2)." ".$time;
	return $dateT;
	}

//ฟังก์ชั่น วันที่ ไม่เอาเวลา
function shortDateThai($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".substr($yy,2,2);
	return $dateT;
	}

	//ฟังก์ชั่น วันที่แบบสั้น
function shortMonthYear($date){
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$shortMonthYear="<br>".$mm."/".substr($yy,2,2);
	return $shortMonthYear;
	}

		//ฟังก์ชั่น วันที่แบบ 590125
function shortYearMonth($date){
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$shortYearMonth=substr($yy,2,2).$mm;
	return $shortYearMonth;
	}

	//ฟังก์ชั่น รูปแบบที่ของเอกสารฝึกป้องกันท่า
function newsNoFormat($strNewsNo){
	$Nlength =strlen($strNewsNo)-10;
	$Nright10=substr($strNewsNo, -10); 
    $NleftUser=substr($strNewsNo,0,$Nlength); 
	$newsNoFormat=$NleftUser."-".$Nright10;
	return $newsNoFormat;
	}
	//ฟังก์ชั่น หมู่วันที่เวลาราชนาวี  ex. 031145 เม.ย.56
function dateNavyDoc($date){
	$timeNow = date("Hi");
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateNavyDoc=$dd.$timeNow." ".$_month_name[$mm].substr($yy,2,2);
	return $dateNavyDoc;
	}
//ฟังก์ชั่น  ฟอร์แมตรหัสอ้างอิงเอกสาร ใช้ในตาราง
function formatNumRef($refId){
	$yymm=substr($refId,0,4);
	$unit=substr($refId,4,2);
	$num=substr($refId,6,3);
	$formatNumRef1 =$yymm."-".$unit."-".$num;
    $formatNumRef="<p class='bg-danger'>$formatNumRef1</>";
	return $formatNumRef;
	}

	function formatNumRefColor($refId,$color=''){
	$yymm=substr($refId,0,4);
	$unit=substr($refId,4,2);
	$num=substr($refId,6,3);
	$formatNumRef1 =$yymm."-".$unit."-".$num;
    $formatNumRef="<p class='bg-$color'>$formatNumRef1</>";
	return $formatNumRef;
	}

//ฟังก์ชั่น  ฟอร์แมตรหัสอ้างอิงเอกสาร ใช้ใน Input
function formatNumRefInput($refId){
	$yymm=substr($refId,0,4);
	$unit=substr($refId,4,2);
	$num=substr($refId,6,3);
	$formatNumRef =$yymm."-".$unit."-".$num;
	return $formatNumRef;
	}
// ส่งค่า Label แสดงสี อนุมัติ / ไม่อนุมัติ    
function showLabelColor($approveValue){
							          switch ($approveValue) {
										    case 10:
														$labelColor= "<span class='label label-success  '>อนุมัติ</span>" ;
                                               break;
											case 11:
														$labelColor= "<span class='label label-danger '>ไม่อนุมัติ</span>" ;
												break;
											case 12:
														$labelColor="<span class='label label-warning '>ส่งคืนแก้ไข</span>" ;
												break;
										}
return $labelColor;
}

?>