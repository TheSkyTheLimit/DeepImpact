<?php
$conn = mysql_connect("localhost","bgnsolut_impact","D33pImp@ct") or die("Database Connection fail");
mysql_select_db("bgnsolut_impact",$conn);
mysql_query("SET NAMES UTF8");

function query($sql)
{
        global $conn;
        
        $result = mysql_query($sql,$conn);

	if (!$result) {
		echo $sql;
		die('Invalid query : ' . mysql_error());
	}
        
        //mysql_close($conn);

        return  $result;	
}

function insert($table,$dataArr)
{       
        $dataArr = array_addslashes($dataArr);
        
        $sql = "INSERT INTO $table (".implode(",",array_keys($dataArr)).")
                VALUES ('".implode("','",array_values($dataArr))."')";
                
        query($sql);
}

function update($table, $values, $where, $limit = FALSE)
{
        foreach($values as $key => $val)
        {
                $valstr[] = "$key = '$val'";
        }
        
        $limit = ( ! $limit) ? '' : ' LIMIT '.$limit;
        
        $orderby = (count($orderby) >= 1)?' ORDER BY '.implode(", ", $orderby):'';

        $sql = "UPDATE ".$table." SET ".implode(', ', $valstr);

        $sql .= ($where != '') ? " WHERE $where " : '';

        $sql .= $limit;
        
        query($sql);
}

// --------------------------------------------------------------------

/**
 * Truncate statement
 *
 * Generates a platform-specific truncate string from the supplied data
 * If the database does not support the truncate() command
 * This function maps to "DELETE FROM table"
 *
 * @access	public
 * @param	string	the table name
 * @return	string
 */	
function _truncate($table)
{
        return "TRUNCATE ".$table;
}

// --------------------------------------------------------------------

/**
 * Delete statement
 *
 * Generates a platform-specific delete string from the supplied data
 *
 * @access	public
 * @param	string	the table name
 * @param	array	the where clause
 * @param	string	the limit clause
 * @return	string
 */	
function _delete($table, $where = array(), $like = array(), $limit = FALSE)
{
        $conditions = '';

        if (count($where) > 0 OR count($like) > 0)
        {
                $conditions = "\nWHERE ";
                $conditions .= implode("\n", $this->ar_where);

                if (count($where) > 0 && count($like) > 0)
                {
                        $conditions .= " AND ";
                }
                $conditions .= implode("\n", $like);
        }

        $limit = ( ! $limit) ? '' : ' LIMIT '.$limit;

        return "DELETE FROM ".$table.$conditions.$limit;
}

function array_addslashes($arr)
{
        $tmpArr = array();
        foreach ($arr as $key => $value) {
                $tmpArr[$key] = addslashes($value);
        }
        return $tmpArr;
}

?>
