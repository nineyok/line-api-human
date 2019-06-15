<?php

$strAccessToken = "W5DDSiantjZm2Syp8ykhF31Qssu4ENAmV31GEqcZ+cZwGfYi/UVBXq2M9u4BGDxs9l/n24N1ZPR3/vDPeBLhbUw3A87eT5sOh0dMLFHkh2Ofj9RTJrx8xpnBuDqUFCYWkj6xgz0jDmRfWmsH4cM3gwdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$strexp = isset($_REQUEST['strexp']) ? $_REQUEST['strexp'] : '';
$strexp = $arrJson['events'][0]['message']['text'];

   $id = $arrJson['events'][0]['source']['groupId'];
   
   if ($id == "C787c1d24b791fa24457c3101e5d050d5") {

$strchk = str_split($strexp);

$arrayloop = array();

if($strchk[0]=="$"){
  $arrstr  = explode( "$" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
      $strchk = "$".$arrstr[$k];
      $idcard = substr($strchk,1);
      $chkid = substr($idcard,0,13);
	   if(is_numeric($chkid)){
              $countid = strlen($chkid);
              if($countid == "10"){
                $idcard = $chkid;
              }
            }
	  if(is_numeric($idcard)){
		  //if(checkPID($idcard)){
	     if ($idcard != "") {
     $urlWithoutProtocol = "http://vpn.idms.pw/id_pdc/select_huaman.php?uid=".$idcard;	 
     $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        //$json_a = json_decode($productivity, true);
        //$arrbn_id = explode("#", $productivity);
        //print_r($arrbn_id);
//        if (is_numeric(substr($arrbn_id[0], 0, 1))) {

//        echo $objResult["customer_name"];
//        echo "#" . $objResult["Latitude"];
//        echo "#" . $objResult["Longitude"];
//        echo "#" . $objResult["province"];
//        echo "#" . $objResult["contact_tel"];



	    //$t_text = $arrbn_id[0]; //ประวัติการจับกุม
		
		$txt = "";
		$txt = "เลขบัตร : ". $idcard . "\r\n"
                . "" . $productivity;
		//$txt = preg_replace("/\r\n|\r|\n/", ' ', $txt); 
		
		  if($productivity!="ประวัติการจับกุม 0 ครั้ง"){
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      array_push($arrayloop,$arrPostData);
                  }else{
                    $txt = "ไม่พบข้อมูลที่ค้นหา : ".$idcard;
                      
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = "0";
                      array_push($arrayloop,$arrPostData);
                  }
    }
/*   }else{
                  $arrPostData = array();
                  $arrPostData["idcard"] = $idcard;
                  $arrPostData["detail"] = "เลขบัตรประชาชนไม่ถูกต้อง : ".$idcard;
                  $arrPostData["status"] = "0";
                  array_push($arrayloop,$arrPostData);
              } */
		  }else{
	     if ($idcard != "") {
			 
		$request = urlencode($idcard);
	    //$request1 = substr($request, 0, -9);
     $urlWithoutProtocol = "http://vpn.idms.pw/id_pdc/select_huaman_name.php?uid=".$request;	 
     $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        //$json_a = json_decode($productivity, true);
        //$arrbn_id = explode("#", $productivity);
        //print_r($arrbn_id);
//        if (is_numeric(substr($arrbn_id[0], 0, 1))) {

//        echo $objResult["customer_name"];
//        echo "#" . $objResult["Latitude"];
//        echo "#" . $objResult["Longitude"];
//        echo "#" . $objResult["province"];
//        echo "#" . $objResult["contact_tel"];



	    //$t_text = $arrbn_id[0]; //ประวัติการจับกุม
		
		$txt = "";
		$txt = "คำค้น : ". $idcard . "\r\n"
                . "" . $productivity;
		//$txt = preg_replace("/\r\n|\r|\n/", ' ', $txt); 
		
		  if($productivity!="ค้นหาพบ 0 คน"){
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      array_push($arrayloop,$arrPostData);
                  }else{
                    $txt = "ไม่พบข้อมูลที่ค้นหา : ".$idcard;
                      
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = "0";
                      array_push($arrayloop,$arrPostData);
                  }
    }
              }
}
}else if($strchk[0]=="H"){
  $arrstr  = explode( "H" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
      $strchk = "H".$arrstr[$k];
             	
/* 		$txt = "";
		$txt = "'$'ตามด้วย 13 หลัก เช็คประวัติการจับกุม" . "\r\n"
					. "ถ้าจำ 13 หลักไม่ได้ให้ใส่คำค้นหลัง '$'เพื่อเอา 13 หลักมาค้น"; */
					
							$txt = "";
		$txt = "'$'ตามด้วย 13 หลัก เช็คประวัติการจับกุม" . "\r\n"
					. "ค้นหาพบ 32 คน 1) เลขบัตร : 1101800690484 ชื่อ : นายสุบรรณ วงศ์ไชย ชื่อเล่น : เดี่ยว 2) เลขบัตร : 1310200149402 ชื่อ : นายศิรชัช ดวงจิตร ชื่อเล่น : เดี่ยว 3) เลขบัตร : 1310400061908 ชื่อ : นางสาวสวัสดิ์ สาดนอก ชื่อเล่น : เดี่ยว 4) เลขบัตร : 1310400111522 ชื่อ : นายโกวิท เตียงตั้งรัมย์ ชื่อเล่น : เดี่ยว 5) เลขบัตร : 1311000146788 ชื่อ : นายวิสิทธิ์ สัวรัมย์ ชื่อเล่น : เดี่ยว 6) เลขบัตร : 1311100042496 ชื่อ : นายบุญทัน สังคพันธ์ ชื่อเล่น : เดี่ยว 7) เลขบัตร : 1311100096642 ชื่อ : นายโยธิน บรรดาสิทธิ์ ชื่อเล่น : เดี่ยว 8) เลขบัตร : 1311100190339 ชื่อ : นายสุทัศน์ โพนทอง ชื่อเล่น : เดี่ยว 9) เลขบัตร : 1311100197503 ชื่อ : นายวรวุฒิ เพ็ชรกล้า ชื่อเล่น : เดี่ยว 10) เลขบัตร : 1311100260671 ชื่อ : นายธีระวุฒิ ฉิมสันเทียะ ชื่อเล่น : เดี่ยว 11) เลขบัตร : 1311200085120 ชื่อ : นายสามารถ หาดี ชื่อเล่น : เดี่ยว 12) เลขบัตร : 1311400064983 ชื่อ : นายดำรงศักดิ์ ด่อนศรี ชื่อเล่น : เดี่ยว 13) เลขบัตร : 1319800013186 ชื่อ : นายสมพงษ์ ศรีใสแก้ว ชื่อเล่น : เดี่ยว 14) เลขบัตร : 1319900023795 ชื่อ : นายสิทธิพงษ์ เขียมรัมย์ ชื่อเล่น : เดี่ยว 15) เลขบัตร : 1319900044199 ชื่อ : นายพงษ์ลาภ เดี่ยวพานิช ชื่อเล่น : 16) เลขบัตร : 1361400002074 ชื่อ : นายธนพจน์ พาครุฑ ชื่อเล่น : เดี่ยว 17) เลขบัตร : 1860200086821 ชื่อ : นายณพเดช สีสุระ ชื่อเล่น : เดี่ยว 18) เลขบัตร : 2310101064067 ชื่อ : นายสุวิชัย รอบรู้ ชื่อเล่น : เดี่ยว 19) เลขบัตร : 312089000110 ชื่อ : นายหนึีงเดี่ยว คัชชนะ ชื่อเล่น : หนึ่ง 20) เลขบัตร : 3310401157018 ชื่อ : นายพนม บุญประกอบ ชื่อเล่น : เดี่ยว 21) เลขบัตร : 3310500242579 ชื่อ : นายสุรศักดิ์ คำเจริญ ชื่อเล่น : เดี่ยว 22) เลขบัตร : 3310600577475 ชื่อ : นายสวย กลนางรอง ชื่อเล่น : เดี่ยว 23) เลขบัตร : 3311000569359 ชื่อ : นายเดี่ยว อินทร์งาม ชื่อเล่น : เดี่ยว 24) เลขบัตร : 3311100260671 ชื่อ : นายธีระวุฒิ ฉิมสันเทียะ ชื่อเล่น : เดี่ยว 25) เลขบัตร : 3320800087382 ชื่อ : นายสรวุธ บุติมาลย์ ชื่อเล่น : เดี่ยว 26) เลขบัตร : 3670500660173 ชื่อ : นายเดี่ยว นาคราช ชื่อเล่น : เดี่ยว 27) เลขบัตร : 3849900282946 ชื่อ : นายณัฐวุฒิ ช่วยสงค์ ชื่อเล่น : เดี่ยวแคนด 28) เลขบัตร : 5310190031709 ชื่อ : นายเด็ดเดี่ยว สามีรัมย์ ชื่อเล่น : เพชร 29) เลขบัตร : 5311000114170 ชื่อ : นายอุดร พยัคฆ์กูล ชื่อเล่น : เดี่ยว 30) เลขบัตร : 5311200007270 ชื่อ : นายสมพร โฮมกระโทก ชื่อเล่น : เดี่ยว 31) เลขบัตร : 5340400064888 ชื่อ : นายตาลเดี่ยว ประดับศรี ชื่อเล่น : เดี่ยว 32) เลขบัตร : 720 ชื่อ : นายเดี่ยว ดีดวงแก้ว ชื่อเล่น :";
					
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      array_push($arrayloop,$arrPostData);
 

  }
}

$arrPostData = array();
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
$num=0;
    foreach($arrayloop as $loop){
        $idcard = "";
        $status = "";
        $detail = "";
      foreach ($loop as $key => $value) {
        if($key=="idcard"){ $idcard = $value; }
        if($key=="status"){ $status = $value; }
        if($key=="detail"){ $detail = $value; }   
      }
      if($status=="1"){
                       $arrPostData['messages'][$num]['type'] = "image";
                       $arrPostData['messages'][$num]['originalContentUrl'] = "https://www.kitsada.com/pic/".$idcard.".jpg";
                       $arrPostData['messages'][$num]['previewImageUrl'] = "https://www.kitsada.com/pic/".$idcard.".jpg";
                       $num++;
      }
      if($status=="3"){
                       $arrPostData['messages'][$num]['type'] = "image";
                       $arrPostData['messages'][$num]['originalContentUrl'] = "https://www.kitsada.com/pic/".$idcard.".jpg";
                       $arrPostData['messages'][$num]['previewImageUrl'] = "https://www.kitsada.com/pic/".$idcard.".jpg";
                       $num++;
      }
      if($detail != ""){
                       $arrPostData['messages'][$num]['type'] = "text";
                       $arrPostData['messages'][$num]['text'] = $detail;
                       $num++;
      }
    }
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
function getContentUrl($url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/21.0 (compatible; MSIE 8.01; Windows NT 5.0)');
            curl_setopt($ch, CURLOPT_TIMEOUT, 200);
            curl_setopt($ch, CURLOPT_AUTOREFERER, false);
            curl_setopt($ch, CURLOPT_REFERER, 'http://google.com');
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);    // Follows redirect responses
            // gets the file content, trigger error if false
            $file = curl_exec($ch);
            if($file === false) trigger_error(curl_error($ch));
            curl_close ($ch);
            return $file;
          } 
  }
		  
    function checkPID($pid) {
   if(strlen($pid) != 13) return false;
      for($i=0, $sum=0; $i<12;$i++)
      $sum += (int)($pid{$i})*(13-$i);
      if((11-($sum%11))%10 == (int)($pid{12}))
      return true;
   return false;
}
?>



