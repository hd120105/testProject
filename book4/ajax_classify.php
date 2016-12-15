    <?php
    include("conn.php");
    if ($_POST['id_FL']) {
		$id      = $_POST['id_FL'];
		?> 
			<input type="hidden" value="<?php echo $id; ?>" /> 
		<?php
		error_reporting(E_ALL || ~E_NOTICE);
		$link     = new ConnectionMysql;
		$link->connect();
		
		if($id=="total")
		{
			$instead = "where 1";
		}else
		{
			$instead = "where t.DEP_JC='$id'";
		}
			
		$result   = mysql_query("select * from bookScore_allDepartment t $instead");
		$total    = mysql_num_rows($result);
		
		$pagesize = 10; //每页显示数
		$page     = ceil($total / $pagesize); //总页数

		if ( isset($id) ) {
			
			$sql_XuLie      = mysql_query("set @rowno=0"); 
			$sql_TuiJian    = "select (@rowno:=@rowno+1) as id,t.TSMC,t.AUTHOR,t.ISBN,t.PUB_COM,t.PUB_YEAR,cast(t.SCORE as DOUBLE(10,3)) as SCORE from  bookScore_allDepartment t $instead order by t.score desc limit 10";
			$result_TuiJian = mysql_query($sql_TuiJian);

		    while ($row_TuiJian = mysql_fetch_array($result_TuiJian)) {
		        ?>
		        <li class="list-group-item">
		            <div class="row" style="padding: 0 7px">
		                <span class="badge pull-left"><?php echo $row_TuiJian['id']; ?></span>
		                <div class="col-md-2" style="display: inline-block;">
		                    <i class="fa fa-star" style="color: red; display: <?php
		                    if ($row_TuiJian['id'] != 1) {
		                        echo 'none';
		                    };
		                    ?>"></i>
		                    <a href="#"><?php echo $row_TuiJian['TSMC']; ?></a>
		                </div>
		                <span class="col-md-8"
		                      style="margin-left: -30px"><?php echo "(&nbsp" . $row_TuiJian['AUTHOR'] . "&nbsp/&nbsp" . $row_TuiJian['PUB_YEAR'] . "&nbsp/&nbsp" . $row_TuiJian['PUB_COM'] . "&nbsp/&nbsp" . $row_TuiJian['ISBN'] . "&nbsp)" ?></span>
		                <span class=" tuijian" style="display:block"><i class="fa fa-thermometer-full" aria-hidden="true">&nbsp;热度：</i><?php echo $row_TuiJian['SCORE'] . "&nbsp"; ?></span>
		            </div>
		        </li>
		        <?php
		    }
		    ?>
		    <script type="text/javascript">
			    $(function () {
					var fenlei      = $("input:hidden").val();
					document.cookie = "num" + "=" + fenlei;
			        $("#page-show").paginate({
						count                  : <?php echo $page; ?>,
						start                  : 1,
						display                : 5,
						border                 : true,
						border_color           : '#BEF8B8',
						text_color             : '#79B5E3',
						background_color       : '#E3F2E1',
						border_hover_color     : '#68BA64',
						text_hover_color       : '#2573AF',
						background_hover_color : '#CAE6C6',
						images                 : false,
						mouse                  : 'press',						
			            onChange: function (page) {
			                $("#pagetxt").load("page_classify.php?id=" + page);
			       //          var fenlei = $("input:hidden").val();
					    	// var datafenlei = 'fenlei=' + fenlei;
			       //         	$.ajax({
				      //           type    : "get",
				      //           url     : "page1.php",
				      //           data    : datafenlei,
				      //           success : function (msg) {
				      //               console.log( msg +"success");
				      //           }
				      //       });
			            }
			        });

			});
			</script>
		    <?php
		}
	} else {
		echo "未接收到分类值";
	}
?>
