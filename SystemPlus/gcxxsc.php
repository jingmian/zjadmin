<?php
	//引入连接数据库文件
		require("../conn.php");
		$gcid1=$_POST["gcid1"];
$sql11 = "select * from 我的工程 where id = '".$gcid1."'";
	$resultM = $conn->query($sql11);
	$rowM = $resultM->fetch_assoc();
	
	//删除我的工程
	if($resultM->num_rows > 0){
		$sql = "delete from 我的工程  where id = '".$gcid1."'";
		if ($conn->query($sql) === TRUE) {
	    	//echo "删除成功";
	    	$myProject="mpDeleteSuccess";
		} else {
	    	//echo "Error: " . $sql . "<br>" . $conn->error;
	    	$myProject="error";
		}
	}
	
	//删除危险源
	if($resultM->num_rows > 0){
		$sql1W = "select * from 建筑工程 where 工程id = '".$gcid1."'";
		$resultW = $conn->query($sql1W);	
		if($resultW->num_rows > 0){
			$sql1 = "delete from 建筑工程  where 工程id = '".$gcid1."'";
			if ($conn->query($sql1) === TRUE) {
		    	//echo "删除成功";
		    	$dangerousSource="dsDeleteSuccess";
			} else {
		    	//echo "Error: " . $sql . "<br>" . $conn->error;
		    	$dangerousSource="error";
			}
		}else{
			$dangerousSource="NOsave";
		}
	}
	
	//删除设备管理
	if($resultM->num_rows > 0){
		$sql1S = "select * from 实测实量 where 工程id = '".$gcid1."'";
		$resultS = $conn->query($sql1S);	
		if($resultS->num_rows > 0){
			$sql2 = "delete from 实测实量  where 工程id = '".$gcid1."'";
			if ($conn->query($sql2) === TRUE) {
		    	//echo "删除成功";
		    	$deviece="dDeleteSuccess";
			} else {
		    	//echo "Error: " . $sql . "<br>" . $conn->error;
		    	$deviece="error";
			}
		}else{
			$deviece="NOsave";
		}
	}
	
	//删除通知单
	if($resultM->num_rows > 0){
		$sql1T = "select * from 通知单 where 工程id = '".$gcid1."'";
		$resultT = $conn->query($sql1T);	
		if($resultT->num_rows > 0){
			$sql3 = "delete from 通知单  where 工程id = '".$gcid1."'";
			if ($conn->query($sql3) === TRUE) {
		    	//echo "删除成功";
		    	$requisition="rDeleteSuccess";
			} else {
		    	//echo "Error: " . $sql . "<br>" . $conn->error;
		    	$requisition="error";
			}
		}else{
			$requisition="NOsave";
		}
	}
	
	//删除处罚条目
	if($resultM->num_rows > 0){
		$sql1C = "select * from 质量检查 where 工程id = '".$gcid1."'";
		$resultC = $conn->query($sql1C);	
		if($resultC->num_rows > 0){
			$sql4 = "delete from 质量检查  where 工程id = '".$gcid1."'";
			if ($conn->query($sql4) === TRUE) {
		    	//echo "删除成功";
		    	$punishEntries="peDeleteSuccess";
			} else {
		    	//echo "Error: " . $sql . "<br>" . $conn->error;
		    	$punishEntries="error";
			}
		}else{
			$punishEntries="NOsave";
		}
	}
	
	//删除图片附件
	if($resultM->num_rows > 0){
		$sql1Tp = "select * from 装饰工程 where 工程id = '".$gcid1."'";
		$resultTp = $conn->query($sql1Tp);	
		if($resultTp->num_rows > 0){
			$sql5 = "delete from 装饰工程  where 工程id = '".$gcid1."'";
			if ($conn->query($sql5) === TRUE) {
		    	//echo "删除成功";
		    	$picture="piDeleteSuccess";
			} else {
		    	//echo "Error: " . $sql . "<br>" . $conn->error;
		    	$picture="error";
			}
		}else{
			$picture="NOsave";
		}
	}
	
	
	
	//删除工程管理人员	
//	if($resultM->num_rows > 0){
//		$sql12 = "select * from 工程管理人员 where 工程时间戳 = '".$rowM["时间戳"]."'";
//		$resultG = $conn->query($sql12);
//		$rowG = $resultG->fetch_assoc();	
//		if($resultG->num_rows > 0){
//			$sql13 = "delete from 工程管理人员  where 工程时间戳 = '".$rowM["时间戳"]."'";
//			if ($conn->query($sql13) === TRUE) {
//		    	//echo "删除成功";
//		    	$projectpeople="propDeleteSuccess";
//			} else {
//		    	//echo "Error: " . $sql . "<br>" . $conn->error;
//		    	$projectpeople="error";
//			}
//		}else{
//			$projectpeople="NOsave";
//		}
//	}
	
	//删除工程动态添加手机	
//	if($resultM->num_rows > 0){
//		$sql14 = "select * from 工程动态添加手机 where 时间戳 = '".$rowM["时间戳"]."'";
//		$resultGm = $conn->query($sql14);
//		$rowGm = $resultGm->fetch_assoc();	
//		if($resultGm->num_rows > 0){
//			$sql15 = "delete from 工程动态添加手机  where 时间戳 = '".$rowM["时间戳"]."'";
//			if ($conn->query($sql15) === TRUE) {
//		    	//echo "删除成功";
//		    	$projectAddMobile="pmobileDeleteSuccess";
//			} else {
//		    	//echo "Error: " . $sql . "<br>" . $conn->error;
//		    	$projectAddMobile="error";
//			}
//		}else{
//			$projectAddMobile="NOsave";
//		}
//	}
//	
	
	
	
	$sqldate="";
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"myProject":"'.$myProject.'",
				"dangerousSource":"'.$dangerousSource.'",
				"deviece":"'.$deviece.'",
				"requisition":"'.$requisition.'",
				"punishEntries":"'.$punishEntries.'",
				"picture":"'.$picture.'",
				"previewDatetable":"'.$previewDatetable.'",
				"previewDatetableNobreak":"'.$previewDatetableNobreak.'",
				"peopleSignin":"'.$peopleSignin.'",
				"projectPeopleImages":"'.$projectPeopleImages.'",
				"projectImages":"'.$projectImages.'",
				"projectpeople":"'.$projectpeople.'",
				"projectAddMobile":"'.$projectAddMobile.'"
			}';	
	$json = '['.$sqldate.$otherdate.']';
	
	echo $json;
	$conn->close();		
?>