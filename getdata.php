<?php 
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
  $sql = "Select companyID,IFNull(comName,'') as comName,IFNull(taxID,'') as taxID,IFNull(contactPerson,'') as contactPerson,IFNull(phoneNumber,'') as phoneNumber,IFNull(faxNumber,'') as faxNumber,IFNull(logoIcon,'') as logoIcon,IFNull(logoImage,'') as logoImage from company where IFNULL(isActive,1) = 1"; 
  $result = query($sql);
  $results = array();
  $company = array();
  $com = 0 ;
  $comID  = 0;
  	while ($rs = mysql_fetch_array($result)){
			$com++;
			$columns = mysql_num_fields($result); 
			for($i = 0; $i < $columns; $i++) { 
				$fieldName = mysql_field_name($result,$i);
				if ($fieldName == "companyID"){
					  $comID=$rs[$fieldName] ;
				}
				if ($fieldName == "logoIcon" && $rs[$fieldName] != ""){
					$company[$fieldName] =  getFullURL($comID,1,"Icon",$rs[$fieldName]);
				}else if ($fieldName == "logoImage" && $rs[$fieldName] != ""){
					$company[$fieldName] =  getFullURL($comID,1,"Image",$rs[$fieldName]);
				}else{
					$company[$fieldName] =  $rs[$fieldName];
				}
			}
      
			$catSql = "Select catID,IFNull(catName,'') as catName,IFNull(catIcon,'') as catIcon,IFNull(catImage,'') as catImage  from categories where isDeleted=0 and companyID=".  $rs["companyID"];
			$resultCat = query($catSql);
			$cats = array();
			$allcat = array();
			$nCat = mysql_num_rows($resultCat);
			while ($rs1 = mysql_fetch_array($resultCat)){
			  $columns = mysql_num_fields($resultCat); 
			  for($i = 0; $i < $columns; $i++) { 
					$fieldName = mysql_field_name($resultCat,$i);
					if ($fieldName == "catIcon" && $rs1[$fieldName] != ""){
						$cats[$fieldName] =  getFullURL($comID,1,"Icon",$rs1[$fieldName]);
					}else if ($fieldName == "catImage" && $rs1[$fieldName] != ""){
						$cats[$fieldName] =  getFullURL($comID,1,"Image",$rs1[$fieldName]);
					}else{
						$cats[$fieldName] =  $rs1[$fieldName];
					}
			  }

				$grpSql = "Select grpID,catID,IFNull(grpName,'') as grpName,IFNull(grpIcon,'') as grpIcon,IFNull(grpImage,'') as grpImage  from product_group where isDeleted=0 and isActive=1 and catID=".  $rs1["catID"];
//				echo $grpSql ."\n\r";
				$resultGrp = query($grpSql);
				$grps = array();
				$allgrps = array();
				while ($rs2 = mysql_fetch_array($resultGrp)){
					$columns = mysql_num_fields($resultGrp); 
					for($i = 0; $i < $columns; $i++) { 
						$fieldName = mysql_field_name($resultGrp,$i);
						if ($fieldName == "grpIcon" && $rs2[$fieldName] != ""){
							$grps[$fieldName] =  getFullURL($comID,1,"Icon",$rs2[$fieldName]);
						}else if ($fieldName == "grpImage" && $rs2[$fieldName] != ""){
							$grps[$fieldName] =  getFullURL($comID,1,"Image",$rs2[$fieldName]);
						}else{
							$grps[$fieldName] =  $rs2[$fieldName];
						}
					}
	
					$prodSql = "Select prodID,grpID,IFNull(prodName,'') as prodName,IFNull(prodLongName,'') as prodLongName,IFNull(prodShortDesc,'') as prodShortDesc,IFNull(prodDesc,'') as prodDesc,IFNull(rating,0) as rating,IFNull(prodIcon,'') as prodIcon,IFNull(qrData,'') as qrData,isActive,IFNull(maker,'') as maker,IFNull(model,'') as model from products where isDeleted=0 and isActive=1 and grpID=".  $rs2["grpID"];
					$resultProd= query($prodSql);
					$prods = array();
					$allprods = array();
					while ($rs3 = mysql_fetch_array($resultProd)){
						$columns = mysql_num_fields($resultProd); 
						for($i = 0; $i < $columns; $i++) { 
							$fieldName = mysql_field_name($resultProd,$i);
							if ($fieldName == "prodIcon" && $rs3[$fieldName] != ""){
								$prods[$fieldName] =  getFullURL($comID,1,"Icon",$rs3[$fieldName]);
							}else{
								$prods[$fieldName] =  $rs3[$fieldName];
							}
						}
					
						$mediaSql = "Select mediaID,prodID,IFNull(mediaType,0) as mediaType,IFNull(mediaURL,'') as mediaURL ,IFNull(fileSize,0) as fileSize,IFNull(shortDesc,'') as shortDesc,IFNull(longDesc,'') as longDesc  from product_media where isDeleted=0 and isActive=1 and prodID=".  $rs3["prodID"];
						$resultMedia= query($mediaSql);
						$medias = array();
						$allmedias = array();
						$MeTypeID=0;
						while ($rs4 = mysql_fetch_array($resultMedia)){
							$columns = mysql_num_fields($resultMedia); 
							for($i = 0; $i < $columns; $i++) { 
								$fieldName = mysql_field_name($resultMedia,$i);
								if($fieldName == "mediaType"){
									$MeTypeID =$rs4[$fieldName];
								}
								if ($fieldName == "mediaURL" && $rs4[$fieldName] != ""){
									$medias[$fieldName] =  getFullURL($comID,$MeTypeID,"Media",$rs4[$fieldName]);
								}else{
									$medias[$fieldName] =  $rs4[$fieldName];
								}
							}
								$allmedias[] = $medias;
						}
						$prods["MediaList"] =$allmedias;
						$allprods[] =$prods;
					}
					$grps["ProductList"] =$allprods;
					$allgrps[] = $grps;
				}
				$cats["GroupList"] =$allgrps;
				$allcat [] = $cats;
			}
			$company["CatagoryList"] =$allcat;
			$results[]= $company;
	}
SuccessProcess($results);
function SuccessProcess($data){
		$params[] =array(
			"status"=>"1",
			"msg"=>"Return all data http://mobile.bgnsolutions.com",
			"data"=> $data
			);	
		echo json_encode($params);
}
function getFullURL($comID,$Type,$GrpID,$Name){
	$pathURL ="http://mobile.bgnsolutions.com/contents/C". substr("000000".$comID, -6, 6);
	$conPath ="";
	if ($Type == 1){
		if($GrpID=="Icon"){
			$conPath = "/icon/".$Name;
		}else if ($GrpID=="Image"){
			$conPath = "/image/".$Name;
		}else if($GrpID=="Media"){
			$conPath = "/media/image/".$Name;
		}
	}else if($Type ==2){
		$conPath = "/media/audio/".$Name;
	}else if($Type ==3){
		$conPath = "/media/video/".$Name;
	}
	return $pathURL .$conPath ;
}
?>