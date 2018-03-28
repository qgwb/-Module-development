<?php

define("MYSQLHOST", "localhost");
define("MYSQLPORT", "3306");
define("MYSQLUSER", "root");
define("MYSQLPASSWORD", "123456");
define("MYSQLDATABASE", "hpy");

class class_mysql
{
    function __construct(){
        $host = MYSQLHOST;
        $port = MYSQLPORT;
        $user = MYSQLUSER;
        $pwd =  MYSQLPASSWORD;
        $dbname = MYSQLDATABASE;
        $link = @mysql_connect("{$host}:{$port}", $user, $pwd, true);
        mysql_query("SET NAMES 'UTF8'");
        mysql_select_db($dbname, $link);
    }


    //执行SQL
    function query($sql)
    {
        if (!($query = mysql_query($sql))){
            return $query;
        }
        return $query;
    }

    //返回数组
    function query_array($sql){
        $result = mysql_query($sql);
        if(!$result)return false;
        $arr = array();
        while ($row = mysql_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

?>