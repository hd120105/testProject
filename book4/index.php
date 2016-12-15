<?php
include('tushu_classify.php');
include('page.php');
error_reporting(E_ALL || ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>西北大学图书馆数据分析</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="西北大学图书馆数据分析">
    <meta name="author" content="yangkang, hedan">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
</head>
<body>

<!-- 导航 -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="font-family: '微软雅黑', sans-serif; margin-left: 20px;">西北大学图书馆</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">数据简介</a></li>
                    <li><a href="#book-classify">书籍分类</a></li>
                    <li><a href="#book-rank">借阅排行</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">数据分析 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">图书借阅量</a></li>
                            <li><a href="#">各专业借阅量</a></li>
                            <li><a href="#">男女借阅量</a></li>
                            <li><a href="#">各时段借阅量</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<section id="book-api-abstract">
    <!-- 接口简介 -->
    <div class="jumbotron">
        <h2 class="text-center">西北大学图书数据</h2>
        <p class="lead">
            始建于1902年的陕西大学堂藏书楼，是西北大学图书馆的源起，也是我国最早的现代新型图书馆之一。经过几代人艰苦卓绝的奋斗和不断发展，西北大学图书馆现已形成了以文史、经济、地质、物理、化学、生命科学为重点的多学科藏书体系。
        </p>
        <p class="lead">
            该系统主要用于将图书馆的图书数据、学生的借阅数据统一起来。通过一系列的推荐算法。为大家提供一个更为智能，更有个性化的图书数据平台。图书馆的工作人员可以通过实时更新图书分类来了解馆藏信息;学生可以通过登录自己的账号，实时查看个性的图书推荐;各个二级学院可以通过查看数据分析,了解该学院学生的借书情况。
        </p>
    </div>
    <!-- /#book-api-abstract -->
</section>
<!-- /container -->

<!-- 图书分类 -->
<section id="book-classify">

    <div class="container">
        <h2 class="title"><img src="./images/svg/sort.svg" alt="" style="width: 30px; margin-top: -10px">&nbsp;图书分类</h2>
        <p class="alert alert-success">西北大学图书馆馆藏图书共<?php $num = count($arr_QuanCheng, 1);
            echo "&nbsp" . $num . "&nbsp"; ?>册，图书共分为<?php echo "&nbsp" . count($arr, 0) . "&nbsp"; ?>大类，
            <!--计算共有多少类书-->
            <?php
            $a = "array";
            foreach ($nkey as $value) {
                $a = $a . $value;
                $c += count($a);
            }
            echo $c;
            reset($nkey);
            ?>小类，分别为：</p>
        <div class="row">
            <!-- 图表 -->
            <div class="col-md-6 hidden-xs">
                <div id="canvas-holder" class="canvas-holder-phone">
                    <canvas id="chart-area"></canvas>
                    <?php
                    foreach ($arr_QuanCheng as $key => $value) {
                        ?>
                        <span id="<?php echo current($nkey);
                        next($nkey); ?>" value="<?php $a = count($arr_QuanCheng[$key]);
                        $b = $num;
                        $c = $a / $b;
                        $d = floor($c * 10000) / 10000 * 100;
                        echo $d; ?>"></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- 分类条目 -->
            <div class="col-md-6">
                <p class="">
                    <?php
                    $numSort = [];
                    foreach ($arr_QuanCheng as $key => $value) {
                        $numSort[$key] = count($arr_QuanCheng[$key]);
                    }//每类书的本数放在数组numSort中
                    arsort($numSort);
                    foreach ($numSort as $key => $value) {
                        ?>
                        <span class="book-classify-item">&nbsp;
                            <?php echo $key; ?><i
                                class="btn btn-sm"><?php echo "&nbsp" . $numSort[$key] . "&nbsp本"; ?></i></span>
                        <?php
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- /#book-classify -->

<!-- 借阅排行 -->
<section id="book-rank">
    <div class="container">
        <h2 class="title"><img src="./images/svg/rank.svg" alt="" style="width: 50px; margin-top: -10px">&nbsp;借阅排行</h2>
        <div class="alert alert-success text-success">
            <?php echo date("Y");?>年<?php echo date("m");?>月借阅排行榜：
        </div>

        <!-- 选择栏 -->
        <select name="fenlei" id="selected" class="form-control" >

		<?php
		  $sql_Department="select distinct DEPARTMENT,DEP_JC from bookScore_allDepartment";//获取院系信息
		  $result_Department=mysql_query($sql_Department);
		?>
		<option value="total">全部图书排行</option>
		<?php

		  while($row_Department=mysql_fetch_array($result_Department))
		  {
		?>
            <option value="<?php echo $row_Department['DEP_JC'] ?>"><?php echo $row_Department['DEPARTMENT'] ?></option>
		<?php }?>
        </select>
        <div id="page-show"></div>
        <!-- 分类 -->
        <div class="book-rank-wrapper">
            <ul class="list-group">
                <div id="pagetxt">
                    <!--获取图书推荐信息-->
          <?php
					if(!$row_Department['DEP_JC'] ||$value)
					{

						$instead = "where 1";
					}else
					{
						$instead = "where DEP_JC={$row_Department['DEP_JC']}";
					}
                    $sql_XuLie = mysql_query("set @rowno=0"); //设置第一页的起始序号
                    $sql_TuiJian = "select (@rowno:=@rowno+1) as id,t.TSMC,t.AUTHOR,t.ISBN,t.PUB_COM,t.PUB_YEAR,cast(t.SCORE as DOUBLE(10,3)) as SCORE from  bookScore_allDepartment t $instead  order by t.score desc limit 10";
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
                                <span class=" tuijian" style="display:block"><i class="fa fa-thermometer-full"
                                                                                aria-hidden="true">
                                        &nbsp;热度：</i><?php echo $row_TuiJian['SCORE'] . "&nbsp"; ?></span>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </div>
            </ul>
        </div>
    </div>
</section>
<!-- /#book-rank -->

<section id="book-tj">
    <div class="container">
        <h2 class="title"><img src="./images/svg/tuijian.svg" alt="" style="width: 50px; margin-top: -10px">&nbsp;图书推荐</h2>

        <div class="alert alert-success text-success">
            <?php echo date("Y");?>年<?php echo date("m");?>月我们向您推荐借阅：
        </div>
        <div class="form-inline">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">学号：</div>
              <input class="form-control" type="text" placeholder="请输入您的学号：" id="ipt_tj" name="usernumber" required='required' value="">
            </div>
          </div>
          <button type="button" class="btn btn-default" id="btn_tj">查询</button>
          <i style="color: #B1AFA8">初始推荐结果基于学号：2009101022</i>
<!--           <button type="button" name="button" id="btn1" class="btn btn-success">part1</button>
          <button type="button" name="button" id="btn2" class="btn btn-danger">part2</button> -->
        </div>

        <div class="book-tj-wrapper">

          <ul class="list-group">
            <div id="book-tj-hidden">
            <?php
                    
                    $sql_XuLie = mysql_query("set @rowno=0"); //设置第一页的起始序号
                    $result    = mysql_query("select (@rowno:=@rowno+1) as id,t.stu_xh,t.ts_mc,t.ts_isbn,t.ts_zuozhe,ts_pub_com,ts_pub_year from TU_RECOMMEND t where t.stu_xh='2009101022'");
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
                    ?>
          </div>
          </ul>
        </div>

        <!-- 方案二 -->
        <div class="book-tj-wrapper" id="part2" style="display: none">
          <div class="row" style="margin: 0;">
              <div class="book-tj-simple col-md-4">
                <div class="" style="margin-bottom: 10px;">
                  <span class="badge pull-left">1</span>
                  <p class="" style="margin-left: 7px;display: inline-block">微观经济学</p>
                </div>
                <div class="">罗伯特·S. 平狄克(Robert S. Pindyck)，丹尼尔·L. 鲁宾费尔德(Daniel L. Rubinfeld)著；李彬，高远等译 / 2013 / 中国人民大学出版社 / 978-7-300-17133-3</div>
              </div>

              <div class="book-tj-simple col-md-4">
                <div class="" style="margin-bottom: 10px;">
                  <span class="badge pull-left">1</span>
                  <p class="" style="margin-left: 7px;display: inline-block">微观经济学</p>
                </div>

                <div class="">罗伯特·S. 平狄克(Robert S. Pindyck)，丹尼尔·L. 鲁宾费尔德(Daniel L. Rubinfeld)著；李彬，高远等译 / 2013 / 中国人民大学出版社 / 978-7-300-17133-3</div>
              </div>

              <div class="book-tj-simple col-md-3">
                <div class="" style="margin-bottom: 10px;">
                  <span class="badge pull-left">1</span>
                  <p class="" style="margin-left: 7px;display: inline-block">微观经济学</p>
                </div>

                <div class="">罗伯特·S. 平狄克(Robert S. Pindyck)，出版社 / 978-7-300-17133-3</div>
              </div>

              <div class="book-tj-simple col-md-4">
                <div class="" style="margin-bottom: 10px;">
                  <span class="badge pull-left">1</span>
                  <p class="" style="margin-left: 7px;display: inline-block">微观经济学</p>
                </div>
                <p class="">罗伯特·S. 平狄克(Robert S. Pindyck)，丹尼尔·L. 鲁宾费尔德(Daniel L. Rubinfeld)著；李彬，高远等译 / 2013 / 中国人民大学出版社 / 978-7-300-17133-3</p>
              </div>
              <div class="book-tj-simple col-md-4">
                <div class="" style="margin-bottom: 10px;">
                  <span class="badge pull-left">1</span>
                  <p class="" style="margin-left: 7px;display: inline-block">微观经济学</p>
                </div>

                <div class="">罗伯特·S. 平狄克(Robert S. Pindyck)，丹尼尔·L. 鲁宾费尔德(Daniel L. Rubinfeld)著；李彬，高远等译 / 2013 / 中国人民大学出版社 / 978-7-300-17133-3</div>
              </div>
              <div class="book-tj-simple col-md-3">
                <span class="badge pull-left">2</span>
                <div class="">title</div>
                <div class="">内容</div>
              </div>
          </div>
        </div>
    </div>
</section>

<!-- 数据分析 -->
<section id="book-analysis">

    <div class="container book-analysis-wrapper">
        <h2 class="title"><img src="./images/svg/data.svg" alt="" style="width: 45px; margin-top: -10px">&nbsp;数据分析</h2>

        <div class="row">
            <!-- 性别 -->
            <div class="col-md-6 col-xs-12">
                <div id="container">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
            <!-- 专业 -->
            <div class="col-md-6 col-xs-12">
                <div>
                    <canvas id="canvas-line"></canvas>
                </div>
            </div>
        </div>

        <!-- 借阅量数据 -->

        <div class="col-md-6 col-xs-12">
            <div id="canvas-holder1">
                <canvas id="chart-roder-area"></canvas>
            </div>
        </div>

        <!-- 专业 -->
        <div class="col-md-6 col-xs-12">
            <div>
                <canvas id="canvas-zhuanye"></canvas>
                <progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>
            </div>
        </div>
    </div>

</section>
<!-- /#book-analysis -->

<footer id="footer" class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="./images/yczn_white.PNG" alt="" style="display: inline; width:20%;">
                <a href="" style=" margin-left: 1.2em">
                    <i class="fa fa-copyright"></i>
                    &nbsp;<span style="color: #ff3333;">NSAS & 云城智能</span>
                    <?php
                    $date = Date("Y");
                    echo " " . $date . "-" . ($date + 1) . " ";
                    ?>保留所有权利.</a>
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <!--<li><a href="{$site['suffix']}/">首页</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<!-- 加载script -->
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.paginate.js"></script>

<!-- 分页 ajax 传值 -->
<script type="text/javascript">

    $(function () {
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
                $("#pagetxt").load("page.php?id=" + page);
                console.log(page);
            }
        });
        $("#pagetxt").ajaxSend(function (event, request, settings) {
            $(this).html("<img src='loading.gif' /> 正在读取...");
        });
    });
</script>

<!-- 分类 ajax 传值 -->
<script>
    $(function () {
        $("#selected").change(function () {
            var url        = "ajax_classify.php";
            var id_FL      = $(this).val();
            console.log(id_FL);
            var dataString = 'id_FL=' + id_FL;
            console.log(dataString);
            $.ajax({
                type    : "post",
                url     : url,
                data    : dataString,
                success : function (msg) {
                    $("#pagetxt").html(msg);
                }
            });
        });
    })
</script>

<!-- 调用推荐结果 -->
<script type="text/javascript">
    $(function () {
      $("#btn_tj").click( () => {
        var params = $("input#ipt_tj").val();
        if (!params) {
          $('#book-tj-hidden').html('<i class=\'alert alert-danger\'>您的输入为空，请输入您的学号<i>');
          return ''; //return 返回，禁止函数继续执行。避免ajax继续交互
        }
        var paramsString = 'user_number=' + params;
        var url = 'book_tj.php';
        $.ajax ({
          type: 'post',
          data: paramsString,
          url: url,
          success: msg => {
            $('#book-tj-hidden').html(msg);
          }
        })
      })
    })
</script>


<!-- 切换两种推荐 -->

<!-- <script type="text/javascript">
  $("button#btn2").click(function() {
    $('#part2').slideToggle('fast');
  });
  $("button#btn1").click(function() {
    $('#book-tj-hidden').slideToggle('fast');
  });
</script> -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="./js/Chart.bundle.min.js"></script>
<script src="./js/Chart.min.js"></script>
<script src="./js/utils.js"></script>
<script src="./js/chart/book-classify.js"></script>

</body>
</html>
