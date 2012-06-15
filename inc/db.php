<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

$dbname = 'test';

try 
{
    mysql_connect($hostname, $username, $password);
    mysql_select_db($dbname);
} 
catch (Exception $e) 
{
    // normally we would log this error
    echo $e->getMessage();    
}   

function db_select_list($query)
{
    $q = mysql_query($query);
    if (!$q) return null;
    $ret = array();
    while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
        array_push($ret, $row);
    }
    mysql_free_result($q);
    return $ret;
} 

function db_select_single($query)
{
    $q = mysql_query($query);
    if (!$q) return null;
    $res = mysql_fetch_array($q, MYSQL_ASSOC);
    mysql_free_result($q);
    return $res;
}