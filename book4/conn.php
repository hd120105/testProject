<?php
/**
 * @author: yangkang & hedan
 * 连接数据库类
 */
class ConnectionMysql {
//数据库配置参数
	
    //主机
	private $hostname  = "219.245.12.129";
	//数据库的username
	private $username  = "root";
	//数据库的password
	private $password  = "cetccetc";
	//数据库名称
	private $database  = "xida";
	//编码形式
	private $charset   = "utf-8";

    /**
     * 架构函数 读取数据库配置信息
     * @access public
     * @param array $config 数据库配置数组
     */
    public function __construct(){
		$this->charset = $charset;
        $this->connect();
    }
    
    /**
     * 连接函数，连接mysql数据库
     * @param  array  $config [description]
     * @return [type]         [description]
     */
    public function connect () {
		$link = mysql_connect($this->hostname ,$this->username ,$this->password) or die("无法连接数据库：" . mysql_error());
        mysql_select_db($this->database, $link) or die("没该数据库：".$this->database);
        mysql_query("SET NAMES utf8");
    }
}
?>