<?php
$strAccessToken = "23xebjdkk2okjNebbUtX4Lcpt1luZG62SqgmC5mXGpVCGLE6Ph9D0UZlqV4r4CAV3SExo817HCl08T3KmBstz3/9G2zWU8+GxhSU+rWcJ2EoSNQsuUbJk0eo6iRc72RZokDiI07Xyvf9qPUiOvksFQdB04t89/1O/w1cDnyilFU=";
$hostname_condb="localhost";
$username_condb="kitsadac";
$password_conndb="55zc56sCHd";
$db_name="kitsadac_checkid";
$conndb=mysqli_connect($hostname_condb,$username_condb,$password_conndb,$db_name);
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$strexp = isset($_REQUEST['strexp']) ? $_REQUEST['strexp'] : '';
$strexp = $arrJson['events'][0]['message']['text'];
      //$strexp = "#1229900480178,FT-2536 fds5g45df4g5";
$strchk = str_split($strexp);
    /*$show = substr($strexp,0,1);
    $space = iconv("tis-620", "utf-8", substr($strexp,1,1) );
    $idcard = substr($strexp,1,13);
    $detail = substr($strexp,15);
    $arrstr  = explode( "," , $strexp );
    if(substr($strexp,14,1)==","){
      print_r($arrstr);
      echo substr($strexp,14,1);
    echo $idcard." - ".substr($strexp,14,1)."-".$detail;
    }*/
  //echo $strchk[0];
$arrayloop = array();
if($strchk[0]=="#"){
  $arrstr  = explode( "#" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
    $arrstrdetail  = explode( "," , $arrstr[$k] );
    
    if($arrstrdetail[0]!=""&&$arrstrdetail[1]!=""){
      $sql_insert = "insert into tbl_linechkfight(lcf_cardid,lcf_detail,lcf_datetime)values('".$arrstrdetail[0]."','".$arrstrdetail[1]."','".date('Y-m-d H:i:s')."')";
      $query_insert = mysqli_query($conndb,$sql_insert);
    }
    $strchk = "#".$arrstr[$k];
    $show = substr($strchk,0,1);
    $space = iconv("tis-620", "utf-8", substr($strchk,1,1) );
    $idcard = substr($strchk,1);
      if($space!=""){
        if($idcard!=""){
          $countid = strlen($idcard);
          $chkid = substr($idcard,0,13);
            if(is_numeric($chkid)){
              $countid = strlen($chkid);
              if($countid == "13"){
                $idcard = $chkid;
              }
            }
            if(is_numeric($idcard)){
              $countid = strlen($idcard);
              if($countid == "13"){
                $request = "operation=Add&a_cardid=".$idcard;
				
		$urlWithoutProtocol = "http://vpn.idms.pw/id_pdc/run_pdc.php?uid=" . $idcard;
        $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        //$json_a = json_decode($productivity, true);
        $arrbn_id = explode("$", $productivity);
				
                  //$urlWithoutProtocol = "pdc.police.go.th/arrest/check_arrest.php?".$request ;
                 /*  $isRequestHeader = FALSE;
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  $productivity = curl_exec($ch);
                  curl_close($ch);
                  $json_a = json_decode($productivity, true);
                  $a_cardid = "";
                  $a_fullname = "";
                  $a_charged = "";
                  $a_link = "";
                  $police = "";
                  $phone = "";
                  $status = "";
                  $output = array(); 
                  $count_a = 0;
                  foreach($json_a as $key) { 
                    foreach ($key as $key_b => $value) {
                      if($key_b=="name"){
                        $a_fullname = $value;
                        $count_a++;
                      }
                      if($key_b=="idcard"){
                        $a_cardid = $value;
                      }
                              if($key_b=="offence"){
                                if($value!=""){
                                  $a_charged = "ข้อหา : ".$value;
                                }else{
                                  $a_charged = "";
                                }
                              }
                              if($key_b=="file"){
                                if($value!=""){
                                  $a_link = "http://pdc.police.go.th/arrest/data/pdf/".$value;
                                }else{
                                  $a_link = "";
                                }
                              }
                              if($key_b=="policestation"){
                                if($value!=""){
                                  $police = "หน่วย : ".$value;
                                }else{
                                  $police = "";
                                }
                              }
                              if($key_b=="phone"){
                                if($value!=""){
                                  $phone = "เบอร์ : "."0".$value;
                                }else{
                                  $phone = "";
                                }
                              }
                              if($key_b=="status"){
                                if($value!=""){
                                  if($value=="0"){
                                    $status = "ยังไม่ถูกจับกุม";
                                  }else{
                                    $status = "จับกุมแล้ว";
                                  }
                                }else{
                                  $status = "";
                                }
                              }
                              array_push($output,$a_charged.chr(10).$a_link.chr(10).$police.chr(10).$phone.chr(10).$status);
                    }
                  } */
			      //$txt = "บุคคลดังกล่าวมีหมายจับ".chr(10)."เลขบัตร  : ".$a_cardid.chr(10)."ชื่อ-นามสกุล : ".$a_fullname;
				  $Real_Service = $productivity;
				  //$Real_Service_Amount = str_replace(array("\r\n", "\r", "\n"), '', $Real_Service_Amount);
				  
				  //$text_line = "Poll number 1, 1500, 250, 150, 100, 1000";
                  $Real_Service = explode("\n",$Real_Service);
				  
                  $numLine = count(explode("\n",$productivity));
				  $Real_Service_Amount = "";
                  for ($start=0; $start < count($Real_Service); $start++) {
                  if($Real_Service[$start]!="" and $start < ($numLine-2)){
	              $Real_Service_Amount = $Real_Service_Amount.$Real_Service[$start].chr(10);
                  }elseif($start == ($numLine-2)){
					  $Real_Service_Amount = $Real_Service_Amount.$Real_Service[$start];
				  }     
                  }  
				  
				     //$Real_Service_Amount = $productivity;
                 $txt = "เลขที่บัตร : ". $idcard . "\r\n"
		        .$Real_Service_Amount;
				
				
                  if($Real_Service_Amount!=""){
                    /*    $msg = "";
                       $cardid = "";
                       $name = "";
                       $tb_status = ""; */
                        //$input = 'http://vpn.idms.pw:9898/polis/imagebyte?id='.$a_cardid;
                        //$dirimg = 'pic/';            // directory in which the image will be saved
                        //$localfile = $dirimg. $a_cardid.'.jpg';         // set image name the same as the file name of the source
                        // create the file with the image on the server
                      //$r = file_put_contents($localfile, getContentUrl($input));
                        //"https://www.detectivepolice1.com/pic/".$a_cardid.".jpg";
						
						
				/* 	   $r = file_get_contents('http://vpn.idms.pw/id_pdc/index_image.php?uid='.$idcard);
                        //echo $content;
					   
						
                        $status = "1";
                        //$txt = "";
                      if($r == '1'){
						 $rr = file_get_contents('http://www.kitsada.com/index_image.php?uid='.$idcard);
                        $status = "1";
                      }else{
                        $status = "2";
                      } */
						
						 //$r = file_get_contents('http://vpn.idms.pw/id_pdc/index_image.php?uid='.$idcard);
                        //echo $content;
					   //$rr = file_get_contents('http://www.kitsada.com/index_image.php?uid='.$idcard);
						
                     /*  $status = "";
                        $num = 2;
                        $coutarr = count( $output );
                        $txt .= chr(10).$output[$coutarr-1];
                        $count = $count_a-1;
                      if($r == '1'){
                        $status = "1";
                      }else{
                        $status = "2";
                      } */
					  
                  $arrPostData = array();
                  $arrPostData["idcard"] = $idcard;
                  $arrPostData["detail"] = $txt;
                  $arrPostData["status"] = $status;
                  //print_r($arrPostData);
                  array_push($arrayloop,$arrPostData);
                  }else{
                    $txt = "ไม่พบหมายจับของบุคคลดังกล่าว ".$idcard;
                  $arrPostData = array();
                  $arrPostData["idcard"] = $a_cardid;
                  $arrPostData["detail"] = $txt;
                  $arrPostData["status"] = "0";
                  array_push($arrayloop,$arrPostData);
                  }
              }else{
                  $arrPostData = array();
                  $arrPostData["idcard"] = $idcard;
                  $arrPostData["detail"] = "เลขบัตรประชาชนไม่ถูกต้อง : ".$idcard;
                  $arrPostData["status"] = "0";
                  array_push($arrayloop,$arrPostData);
              }
            } else{
              //$idcard = str_replace(' ', '_', $idcard);
              //$idcard = str_replace(' ', '', $idcard);
			  //$idcard = urlencode($idcard)
			      $request = "";
                  $request = urlencode($idcard);
				  
                  //$urlWithoutProtocol = "pdc.police.go.th/arrest/check_arrest.php?".$request ;
				  
		$urlWithoutProtocol = "http://vpn.idms.pw/id_pdc/run_pdc.php?uid=" . $request;
        $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        //$json_a = json_decode($productivity, true);
        $arrbn_id = explode("$", $productivity);
				  
                 /*  $isRequestHeader = FALSE;
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  $productivity = curl_exec($ch);
                  curl_close($ch);
                  $json_b = json_decode($productivity, true);
                  
                  $a_cardid = "";
                  $a_fullname = "";
                  $a_charged = "";
                  $a_link = "";
                  $police = "";
                  $phone = "";
                  $status = "";
                  $output = array(); 
                  $count_a = 0;
                  foreach($json_b as $key) { 
                    foreach ($key as $key_b => $value) {
                      if($key_b=="name"){
                        $a_fullname = $value;
                        $count_a++;
                      }
                      if($key_b=="idcard"){
                        $a_cardid = $value;
                      }
                              if($key_b=="offence"){
                                if($value!=""){
                                  $a_charged = "ข้อหา : ".$value;
                                }else{
                                  $a_charged = "";
                                }
                              }
                              if($key_b=="file"){
                                if($value!=""){
                                  $a_link = "http://pdc.police.go.th/arrest/data/pdf/".$value;
                                }else{
                                  $a_link = "";
                                }
                              }
                              if($key_b=="policestation"){
                                if($value!=""){
                                  $police = "หน่วย : ".$value;
                                }else{
                                  $police = "";
                                }
                              }
                              if($key_b=="phone"){
                                if($value!=""){
                                  $phone = "เบอร์ : "."0".$value;
                                }else{
                                  $phone = "";
                                }
                              }
                              if($key_b=="status"){
                                if($value!=""){
                                  if($value=="0"){
                                    $status = "ยังไม่ถูกจับกุม";
                                  }else{
                                    $status = "จับกุมแล้ว";
                                  }
                                }else{
                                  $status = "";
                                }
                              }
                              array_push($output,$a_charged.chr(10).$a_link.chr(10).$police.chr(10).$phone.chr(10).$status);
                    }
                  } */
                   //$txt = "บุคคลดังกล่าวมีหมายจับ".chr(10)."เลขบัตร  : ".$a_cardid.chr(10)."ชื่อ-นามสกุล : ".$a_fullname;
				  $Real_Service = $productivity;
				  //$Real_Service_Amount = str_replace(array("\r\n", "\r", "\n"), '', $Real_Service_Amount);
				  
				  //$text_line = "Poll number 1, 1500, 250, 150, 100, 1000";
                  $Real_Service = explode("\n",$Real_Service);
				  
                  $numLine = count(explode("\n",$productivity));
				  $Real_Service_Amount = "";
                  for ($start=0; $start < count($Real_Service); $start++) {
                  if($Real_Service[$start]!="" and $start < ($numLine-2)){
	              $Real_Service_Amount = $Real_Service_Amount.$Real_Service[$start].chr(10);
                  }elseif($start == ($numLine-2)){
					  $Real_Service_Amount = $Real_Service_Amount.$Real_Service[$start];
				  }     
                  }  
				  
				     //$Real_Service_Amount = $productivity;
                   $txt = "ชื่อ-นามสกุล : ". $idcard . "\r\n"
		        .$Real_Service_Amount;
                  if($Real_Service_Amount!=""){
                      /*  $msg = "";
                       $cardid = "";
                       $name = "";
                       $tb_status = ""; */
                        //$input = 'http://vpn.idms.pw:9977/polis/imagebyte?id='.$a_cardid;
                        //$dirimg = 'pic/';            // directory in which the image will be saved
                        //$localfile = $dirimg. $a_cardid.'.jpg';         // set image name the same as the file name of the source
                        // create the file with the image on the server
                      //$r = file_put_contents($localfile, getContentUrl($input));
                        //"https://www.detectivepolice1.com/pic/".$a_cardid.".jpg";
						
						/*  $r = file_get_contents('http://vpn.idms.pw/id_pdc/index_image.php?uid='.$idcard);
                        //echo $content;
					   $rr = file_get_contents('http://www.kitsada.com/index_image.php?uid='.$idcard);
						
                      $status = "";
                        $num = 2;
                        $coutarr = count( $output );
                        $txt .= chr(10).$output[$coutarr-1];
                        $count = $count_a-1;
                        if($count!=0){
                          $txt .= chr(10)."หมายจับอีก ".$count;
                        }
                      if($r == 1){
                        $status = "1";
                      }else{
                        $status = "2";
                      }
					  
					          $status = "1";
                        $txt = "";
                      if($r == '1'){		   
                        $status = "1";
                      }else{
                        $status = "2";
                      } */
					  
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      array_push($arrayloop,$arrPostData);
                  }else{
                    $txt = "ไม่พบหมายจับของบุคคลดังกล่าว ".$idcard;
                      
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = "0";
                      array_push($arrayloop,$arrPostData);
                  }
            } 
        }
      }
  }  
}else if($strchk[0]=="$"){
  $arrstr  = explode( "$" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
      $strchk = "$".$arrstr[$k];
	  //$strchk = "#".$arrstr[$k];
    $show = substr($strchk,0,1);
    //$space = iconv("tis-620", "utf-8", substr($strchk,1,1) );
    $idcard = substr($strchk,1);
          $countid = strlen($idcard);
          $chkid = substr($idcard,0,13);
            	  
     //$text  = “ข้อความที่1 2 3 4 5 6”;
     $text_output= explode(" ", $idcard);
     //echo $text_output[0];
     //echo $text_output[1]; 
	 $request = urlencode($text_output[0]);
        $urlWithoutProtocol = "http://vpn.idms.pw/id_pdc/select_bank.php?uid=".$text_output[0]."&aid=".$text_output[1];
        $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        //$json_a = json_decode($productivity, true);
        $arrbn_id = explode("#", $productivity);
		
		$Real_Service_Amount = $arrbn_id[0];  //จำนวนเงิน
        $Service_Type = $arrbn_id[1]; //เครือข่าย
		
		$txt = "ธนาคาร : ". $arrbn_id[0] . "\r\n"
		."สาขา : ".$arrbn_id[1].$urlWithoutProtocol. "\r\n"
		.$text_output[0].$text_output[1];
		  if($Real_Service_Amount!=""){
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      array_push($arrayloop,$arrPostData);
                  }else{
                    $txt = "ไม่พบสาขาธนาคารดังกล่าว ".$idcard;
                      
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = "0";
                      array_push($arrayloop,$arrPostData);
                  }
  }
}else if($strchk[0]=="*"){
  $arrstr  = explode( "*" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
      $strchk = "*".$arrstr[$k];
      $idcard = substr($strchk,1);
      $chkid = substr($idcard,0,13);
            if(is_numeric($chkid)){
              $countid = strlen($chkid);
              if($countid == "13"){
                $idcard = $chkid;
              }
            }
            if(is_numeric($idcard)){
              $countid = strlen($idcard);
              if($countid == "13"){
                        //$input = 'http://vpn.idms.pw:9977/polis/imagebyte?id='.$idcard;
						//$r = 'http://vpn.idms.pw/id_pdc/index_image.php?uid='.$idcard;						
                        //$dirimg = 'pic/';            // directory in which the image will be saved
                        //$localfile = $dirimg. $idcard.'.jpg';         // set image name the same as the file name of the source
                      //echo $localfile;
                        // create the file with the image on the server
                      //$r = file_put_contents($localfile, getContentUrl($input));
                       $r = file_get_contents('http://vpn.idms.pw/id_pdc/index_image.php?uid='.$idcard);
                        //echo $content;
					  
						
                        $status = "1";
                        $txt = "";
                      if($r == '1'){
					   $rr = file_get_contents('http://www.kitsada.com/index_image.php?uid='.$idcard);
                        $status = "1";
                      }else{
                        $status = "2";
                      }
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $txt;
                      $arrPostData["status"] = $status;
                      //print_r($arrPostData);
                      array_push($arrayloop,$arrPostData);
              }
            }
  }
}else if($strchk[0]=="@"){
  $arrstr  = explode( "@" , $strexp );
  for($k=1 ; $k < count( $arrstr ) ; $k++ ){
      $strchk = "@".$arrstr[$k];
      $idcard = substr($strchk,1);
      $chkid = substr($idcard,0,13);
            if(is_numeric($chkid)){
              $countid = strlen($chkid);
              if($countid == "13"){
                $idcard = $chkid;
              }
            }
            if(is_numeric($idcard)){
              $countid = strlen($idcard);
                      
                  $request = "a_cardid=".$idcard;
                  $urlWithoutProtocol = "http://vpn.idms.pw:81/searchphone/api_chkphonenum.php?".$request ;
                  $isRequestHeader = FALSE;
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  $productivity = curl_exec($ch);
                  curl_close($ch);
                  $json_b = json_decode($productivity, true); 
                  print_r($productivity);
                  $dpn_phone = "";
                  $dpn_idcard = "";
                  foreach($json_b as $key) { 
                    foreach ($key as $key_b => $value) {
                      if($key_b=="dpn_phone"){
                        $dpn_phone .= $value." , ";
                        $count_a++;
                      }
                      if($key_b=="dpn_idcard"){
                        $dpn_idcard = $value;
                      }
                    }
                  }
                        $status = "2";
                      $arrPostData = array();
                      $arrPostData["idcard"] = $idcard;
                      $arrPostData["detail"] = $dpn_phone;
                      $arrPostData["status"] = $status;
                      //print_r($arrPostData);
                      array_push($arrayloop,$arrPostData);
              
            }
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
?>