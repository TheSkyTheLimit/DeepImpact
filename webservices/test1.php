<?php 
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
  $sql = "Select companyID,comName,taxID,contactPerson,phoneNumber,faxNumber,logoIcon,logoImage from company where IFNULL(isActive,1) = 1"; 
  $result = query($sql);
  $results = array();
  $company = array();
  $com = 0 ;
  	while ($rs = mysql_fetch_array($result)){
			$com++;
			$columns = mysql_num_fields($result); 
			for($i = 0; $i < $columns; $i++) { 
				$fieldName = mysql_field_name($result,$i);
				$company[$fieldName] =  $rs[$fieldName];
			}
      
			$catSql = "Select catID,catName,catIcon,catImage from categories where isDeleted=0 and companyID=".  $rs["companyID"];
			$resultCat = query($catSql);
			$cats = array();
			$allcat = array();
			$nCat = mysql_num_rows($resultCat);
			while ($rs1 = mysql_fetch_array($resultCat)){
			  $columns = mysql_num_fields($resultCat); 
			  for($i = 0; $i < $columns; $i++) { 
				  $fieldName = mysql_field_name($resultCat,$i);
				  $cats[$fieldName] =  $rs1[$fieldName];
			  }

				$grpSql = "Select grpID,catID,grpName,grpIcon,grpImage from product_group where isDeleted=0 and isActive=1 and catID=".  $rs1["catID"];
//				echo $grpSql ."\n\r";
				$resultGrp = query($grpSql);
				$grps = array();
				$allgrps = array();
				while ($rs2 = mysql_fetch_array($resultGrp)){
					$columns = mysql_num_fields($resultGrp); 
					for($i = 0; $i < $columns; $i++) { 
						$fieldName = mysql_field_name($resultGrp,$i);
						$grps[$fieldName] =  $rs2[$fieldName];
					}
	
					$prodSql = "Select prodID,grpID,prodName,prodLongName,prodShortDesc,prodDesc,rating,prodIcon,qrData,isActive,maker,model from products where isDeleted=0 and isActive=1 and grpID=".  $rs2["grpID"];
					$resultProd= query($prodSql);
					$prods = array();
					$allprods = array();
					while ($rs3 = mysql_fetch_array($resultProd)){
						$columns = mysql_num_fields($resultProd); 
						for($i = 0; $i < $columns; $i++) { 
							$fieldName = mysql_field_name($resultProd,$i);
							$prods[$fieldName] =  $rs3[$fieldName];
						}
						$prods["MediaList"] = array();
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
			"msg"=>"Return all data",
			"data"=> $data
			);	
		echo json_encode($params);
}
?>