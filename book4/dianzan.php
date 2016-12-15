<?php 
  include ("conn.php");
   error_reporting(E_ALL || ~E_NOTICE);
   $link  = new ConnectionMysql;
   $link->connect();
  $ip       = $_POST['ip'];
  $id       = $_POST['id'];
  $state    = $_POST['state'];

  if(!isset($id) || empty($id)) exit();//判断id是否存在
  
  if($state==1)
  {
	  $sql_in  = "insert into DianZan (stu_xh,ip,state) values ('$id','$ip','$state') ";//将该点赞数据插入到数据表中
	  mysql_query($sql_in);
 ?>
    <span>
	 <a href="JavaScript:void(0)" class="fa fa-thumbs-up fa-2x" style="text-decoration:none;color:red"></a>
	 <a href="JavaScript:void(0)" class="fa fa-thumbs-down fa-2x" style="text-decoration:none;color:gray"></a>
	</span>
 <?php
  }else if($state==2)
  {
	$sql_in_Cai  = "insert into DianZan (stu_xh,ip,state) values ('$id','$ip','$state') ";//将该踩的数据插入到数据表中
	 mysql_query($sql_in_Cai);
?>

	<span>
	 <a href="JavaScript:void(0)" class="fa fa-thumbs-up fa-2x" style="text-decoration:none;color:gray"></a>
	 <a href="JavaScript:void(0)" class="fa fa-thumbs-down fa-2x" style="text-decoration:none;color:black"></a>
	</span>


 <?php
 }
  function get_client_ip()
  {
	  if(getenv("HTTP_CLIENT_IP") && srtcasecmp(getenvv("HTTP_CLIENT_IP"),"unknown"))
	  {
		  $ip  = getenv("HTTP_CLIENT_IP");
	  } 
	  else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip =getenv("REMOTE_ADDR");
				else
					$ip = "unknown";
	return ($ip);
  }
?>
<!--
<script>
	/* @author:Romey
	 * 动态点赞
	 * 此效果包含css3，部分浏览器不兼容（如：IE10以下的版本）
	*/
	$(function(){
		$("#btn_DZ").click(function(){
			var praise_img = $("#praise-img");
			if(praise_img.attr("src") == ("images/yizan.png")){
				$(this).html("<img src='images/zan.png' id='praise-img' style='width:30px;height:30px;' class='animation' />");
			}else{
				$(this).html("<img src='images/yizan.png' id='praise-img' style='width:30px;height:30px;' class='animation' />");
			}
		});
	})
</script>
-->