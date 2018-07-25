<?php
    date_default_timezone_set('Asia/Calcutta');
    function executeUpdate($qry)
    {
        $con = mysql_connect("localhost","root","root");
        if(!$con)
        {
            echo "<br/>Cannot Able To Connect";
            die();
        }
        $db = mysql_select_db("library",$con);
        if(!$db)
        {
            echo "<br/>Cannot Select Database";
            die();
        }
        mysql_query($qry);
        $n=mysql_affected_rows();
        return $n;
    }
    
    function executeQuery($qry)
    {
        $con = mysql_connect("localhost","root","root");
        if(!$con)
        {
            echo "<br/>Cannot Able To Connect";
            die();
        }
        $db = mysql_select_db("library",$con);
        if(!$db)
        {
            echo "<br/>Cannot Select Database";
            die();
        }
        $rs=mysql_query($qry);
        return $rs;
    }
    
    function getNextMid()
    {
        $rs=executeQuery("select * from member");
        $n=mysql_num_rows($rs);
        return $n+101+101*($n);
    }
    
    function getNextBid()
    {
        $rs=executeQuery("select * from book");
        $n=mysql_num_rows($rs);
        return $n+201+201*($n);
    }
    
    function getNextTid()
    {
        $rs=executeQuery("select * from transaction");
        $n=mysql_num_rows($rs);
        return $n+51+107*($n);
    }
    
    function getNextNid($id)
    {
        $rs=executeQuery("select * from notification where mid='$id'");
        $n=mysql_num_rows($rs);
        return $n;
    }