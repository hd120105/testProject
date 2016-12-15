<?php
  /**
   * @author: yangkang
   * 处理图书推荐信息
   */
   include ("conn.php");
   error_reporting(E_ALL || ~E_NOTICE);
   $link  = new ConnectionMysql;
   $link->connect();

  $user_number = $_POST['user_number'];
  $ip          = get_client_ip();//获取用户id;
  
  $stu_in      = mysql_query("select * from STUDATA where xh='$user_number'");//判断该学号是否存在
  $total_stu   = mysql_num_rows($stu_in);
  ?>
  <p id="demo"> </p>
  <?php
  if($total_stu != 0)
  {
  $sql_XuLie   = mysql_query("set @rowno=0"); 
  $result      = mysql_query("select (@rowno:=@rowno+1) as id,t.stu_xh,t.ts_mc,t.ts_isbn,t.ts_zuozhe from TU_RECOMMEND t where t.stu_xh='$user_number'");
  // $result = "select (@rowno:=@rowno+1) as id,t.stu_xh,t.AUTHOR,t.ts_mc,t.ts_isbn,t.ts_zuozhe from  TU_RECOMMEND t where t.stu_xh='$user_number'";
  $total       = mysql_num_rows($result); //计算改总数
  
   if ($total != 0) {
    while ($row_TuiJian = mysql_fetch_array($result)) {
      ?>
      <li class="list-group-item">
          <div class="row" style="padding: 0 7px">
              <span class="badge pull-left"><?php echo $row_TuiJian['id']; ?></span>
              <div class="col-md-2"><?php echo $row_TuiJian['ts_mc'] ?></div>
              <div class="col-md-8"><?php echo $row_TuiJian['ts_zuozhe'].' / '.$row_TuiJian['ts_isbn'].' / '.$row_TuiJian['ts_pub_com'].' / '.$row_TuiJian['ts_pub_year'] ?></div>
          </div>
      </li>
	  
    <?php
    }
  } else {
    echo '<i class=\'alert alert-danger\' style="padding-bottom:10px">按您所在的院系为您推荐</i>';
	
    $sql_XuLie      = mysql_query("set @rowno=0"); 
	$sql_TuiJian    = "select (@rowno:=@rowno+1) as id,TSMC,AUTHOR,ISBN,PUB_COM,PUB_YEAR,cast(SCORE as DOUBLE(10,3)) as SCORE from  bookScore_allDepartment  where YXDM =(select YXDM from STUDATA where xh='$user_number' ) order by score desc limit 10";
	$result_YXTJ    = mysql_query($sql_TuiJian);	
	while ($row_TuiJian = mysql_fetch_array($result_YXTJ)) {
	?>
	      <li class="list-group-item">
	          <div class="row" style="padding: 0 7px">
	              <span class="badge pull-left"><?php echo $row_TuiJian['id']; ?></span>
	              <div class="col-md-2"><?php echo $row_TuiJian['TSMC'] ?></div>
	              <div class="col-md-8"><?php echo $row_TuiJian['AUTHOR'].' / '.$row_TuiJian['ISBN'].' / '.$row_TuiJian['PUB_COM'].' / '.$row_TuiJian['PUB_YEAR'] ?></div>
	          </div>
	      </li>
		 
	    <?php
	    }
    }
  
    ?>
     <div id = "div_DZ">
	 <?php 
	  $ip_sql   = mysql_query("select state from DianZan where stu_xh='$user_number' and ip='$ip' ");//查询点赞表中是否存在对应学号和ip的点赞数据
      $row      = mysql_fetch_array($ip_sql);
	  $count    = mysql_num_rows($ip_sql);
	  if($count==1)
	  {
		  if($row['state']==1)//数据库中有赞的记录
		  {
	 ?>   <span>
		    <a href="JavaScript:void(0)" class="fa fa-thumbs-up fa-2x" style="text-decoration:none;color:red"></a>
		    <a href="JavaScript:void(0)" class="fa fa-thumbs-down fa-2x" style="text-decoration:none;color:gray"></a>
		  </span>
	<?php
		  }
	      else if($row['state']==2)//数据库中有踩的记录
	     {
	?>    <span>
		  
		   <a href="JavaScript:void(0)" class="fa fa-thumbs-up fa-2x" style="text-decoration:none;color:gray"></a>
		    <a href="JavaScript:void(0)" class="fa fa-thumbs-down fa-2x" style="text-decoration:none;color:black"></a>
		  </span>
	<?php 
		 }
	}
	else//数据库中没有记录
	{
	?>
		<span >
		 <a href="JavaScript:void(0)" id="btn_DZ"class="fa fa-thumbs-up fa-2x" style="text-decoration:none;color:gray"></a>
		  <a href="JavaScript:void(0)" id="btn_Cai" class="fa fa-thumbs-down fa-2x" style="text-decoration:none;color:gray"></a>
		 </span>
		 <div>
	<?php
	}
   }else
   {
     	echo '<i class=\'alert alert-danger\'>您所输入的学号不正确，请重新输入！<i>';
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
	return hash("sha256", $ip);
  }
 ?>
 <!--
 <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
 -->
 <!--点赞ajax传值 -->
<script type="text/javascript">
 $(function () {
      $("#btn_DZ").click(() => {
	  var string = {id:<?php echo '"'.$user_number.'"';?>,
	                ip:<?php echo '"'.$ip.'"';?>,
					state:1
	               }
	  $.ajax({
		  type    :'post',
		  url     : 'dianzan.php',
		  data    :string,
		   success: msg => {
            $('#div_DZ').html(msg);
		  }
	  });
     })
 })
</script>
<!--踩ajax传值 -->
<script type="text/javascript">
 $(function () {
      $("#btn_Cai").click(() => {
	  var string = {id:<?php echo '"'.$user_number.'"';?>,
	                ip:<?php echo '"'.$ip.'"';?>,
					state:2
	               }
	  $.ajax({
		  type    :'post',
		  url     : 'dianzan.php',
		  data    :string,
		   success: msg => {
            $('#div_DZ').html(msg);
		  }
	  });
     })
 })
</script>