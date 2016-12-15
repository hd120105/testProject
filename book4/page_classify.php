<?php
/**
 * @author: yangkang & hedan
 * pagination 分页 (小类)
 * @var string
 */
include ('conn.php');
error_reporting(E_ALL || ~E_NOTICE);
$link  = new ConnectionMysql;
$link->connect();
$id_FL = $_COOKIE['num'];
$id    = $_GET['id'];

/**
 * 接受test.php页面传来的分类id并进行分页
 * @var [type]
 */
 if($id_FL=="total")
{
	$instead = "where 1";
}else
{
	$instead = "where t.DEP_JC='$id_FL'";
}
$result   = mysql_query("select * from bookScore_allDepartment t $instead");
$total    = mysql_num_rows($result); //计算改分类总数
$pagesize = 10; //每页显示数
$page     = ceil($total / $pagesize); //总页数
if (isset($id)) {
	
    $startPage = ($id - 1) * $pagesize;
    $sql_XuLie = mysql_query("set @rowno=$startPage"); //设置每一页的起始序号
    $sql_TuiJian = "select (@rowno:=@rowno+1) as id,t.TSMC,t.AUTHOR,t.ISBN,t.PUB_COM,t.PUB_YEAR,cast(t.SCORE as DOUBLE(10,3)) as SCORE from  bookScore_allDepartment t $instead order by t.score desc limit $startPage, $pagesize";
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
}
?>