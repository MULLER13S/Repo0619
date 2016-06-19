<?php
/**
 * 连接数据库
 * @return resource
 */
function connect(){
    global $link;
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库连接失败Error:".
        mysqli_connect_errno().":".mysqli_connect_error());
    mysqli_query($link, "set names utf8");
    //mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}

/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
    global $link;
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
//    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
//    mysqli_query($link, "set names utf8");
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}
//update imooc_admin set username='king' where id=1
/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null){
    global $link;
    foreach($array as $key=>$val){

        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
//    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
//    mysqli_query($link, "set names utf8");
    $result=mysqli_query($link,$sql);
    //var_dump($result);
    //var_dump(mysql_affected_rows());exit;
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null){
    global $link;
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
//    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}

/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    global $link;
//    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
//    mysqli_query($link,"set names utf8");
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}


/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    global $link;
//    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
//    mysqli_query($link,"set names utf8");
    $result=mysqli_query($link,$sql);
    $rows=null;
    while(@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){
    global $link;
    //$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
    $result=mysqli_query($link,$sql);
    return mysqli_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
    global $link;
    //$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
   // mysqli_query($link,"set names utf8");
    return mysqli_insert_id($link);
}

