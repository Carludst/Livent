<?php
require_once "DbDefoultConfiguration.php";

class FDb{

    private static PDO $pdoV;


    public function __construct(String $host,String $database,String $username , String $password)
    {
        try {
            self::$pdoV = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        } catch (PDOException $e) {
            echo "!ERRORE!" . $e->getMessage();
            die;
        }
    }

    public static function getPdo():PDO
    {
      return self::$pdoV;
    }

    public static function closeConnection(){
        self::$pdoV->commit();
    }

    /**
     * -Method : insert into a database table an element
     * @param String $table database table where insert the values
     * @param array $fieldValue array with field  as key and value as element of the array
     * @return bool return false if is occurred an error
     */
    public static function store(String $table,Array $fieldValue):bool
    {
        try{
            self::$pdoV->beginTransaction();
            $fields=array_keys($fieldValue);
            $values=array_values($fieldValue);
            $valStr=$values[0];
            $fieldStr=$fields[0];
            for($i=1;$i<count($values);$i++){
                $valStr=$valStr.",".$values[$i];
                $fieldStr=$fieldStr.",".$fields[$i];
            }
            $query = "INSERT INTO " . $table ."(".$fieldStr.")". "  VALUES  " ."(".$valStr.")";
            $stmt=self::$pdoV->prepare($query);
            $stmt->execute();
            self::closeConnection();
            return true;
        }
        catch (PDOException $e)
        {
            echo "!ERRORE!" . $e->getMessage();
            self::$pdoV->rollBack();
            return false;
        }

    }

    /**
     * -Method : delate an element of the database
     * @param String $table work table
     * @param String $where where clause
     * @return bool|null true if the operation completed successfuly
     */
    public static function delate(String $table , String $where):?bool{
        try{
            if(self::exist(self::load($table,$where))){
                self::$pdoV->beginTransaction();
                $query = "DELETE FROM " . $table .$where;
                $stmt = self::$pdoV->prepare($query);
                $stmt->execute();
                self::closeConnection();
                return true;
            }
            else return false;
        }
        catch (PDOException $e){
            echo "!ERRORE!" . $e->getMessage();
            self::$pdoV->rollBack();
            return null;
        }

    }

    /**
     * @param String $table work table
     * @param String $where where clause
     * @param String $fieldValue array with field to change as key and new value as element of the array
     * @return bool|null true if the operation completed successfuly
     */
    public static function update(String $table,String $where,Array $fieldValue):?bool
    {
        try {
            if(self::exist(self::load($table,$where))){
                self::$pdoV->beginTransaction();
                $fields=array_keys($fieldValue);
                $values=array_values($fieldValue);
                $clouse=$fields[0]."=".$values[0];
                for($i=1;$i<count($fields);$i++){
                    $clouse=$clouse.",".$fields[$i]."=".$values[$i];

                }
                $query = "UPDATE " . $table . " SET " . $clouse.$where ;
                $stmt = self::$pdoV->prepare($query);
                $stmt->execute();
                self::closeConnection();
                return true;
            }
            else return false;
        }
        catch (PDOException $e){
            echo "!ERRORE!" . $e->getMessage();
            self::$pdoV->rollBack();
            return null;
        }

    }

    /**
     * -Method  : allows to execute a generic query  (used for interrogation)
     * @param String $query interrogation to execute
     * @param String|array $orderBy attribute to sort by
     * @param bool|array $ascending order type (ascending/decreasing)
     * @return array|null result of the query (null can be also due by an error)
     * @throws Exception see the orderBy method exception
     */
    public static function exInterrogation(String $query,String|Array $orderBy="",bool|Array $ascending=true):?array{
        try{
            self::$pdoV->beginTransaction();
            if($orderBy!="")$query=$query.self::OrderBy($orderBy,$ascending);
            $stmt=self::$pdoV->prepare($query);
            $stmt->execute();

            $num = $stmt->rowCount();
            if ($num == 0) {
                $result= null;                                   //nessuna riga interessata -> return null
            }
            elseif ($num ==1) {                                //nel caso in cui una sola riga fosse interessata
                $result= $stmt->fetch(PDO::FETCH_ASSOC);   //ritorna una sola riga
            }
            else {
                $result = array();                                //nel caso in cui piu' righe fossero interessate
                $stmt->setFetchMode(PDO::FETCH_ASSOC);      //imposta la modalità di fetch come array associativo
                while ($row = $stmt->fetch()) {
                    $result[] = $row;                             //ritorna un array di righe
                }
            }
            self::closeConnection();
            return $result;
        }
        catch (PDOException $e) {
            echo "!ERRORE!" . $e->getMessage();
            self::$pdoV->rollBack();
            return null;
        }

    }

    /**
     * -Method : execute a query and return true if the query result is not empty
     * @param String $query query to execute
     * @param array|null $valParametres parametres not just expess into the query (useful for login)
     * @return bool|null return true if the query result is not empty , null if is occurred an error
     */
    public static function exist(String $query,?Array $valParametres=null):?bool
    {
        try{
            self::$pdoV->beginTransaction();
            $stmt=self::$pdoV->prepare($query);
            if(is_null($valParametres))$stmt->execute($valParametres);
            else $stmt->execute();

            $num = $stmt->rowCount();
            if ($num>0) {
                $result=true;                                   //nessuna riga interessata -> return null
            }
            else $result=false;
            self::closeConnection();
            return $result;
        }
        catch (PDOException $e) {
            echo "!ERRORE!" . $e->getMessage();
            self::$pdoV->rollBack();
            return null;
        }

    }



    /**
     * -Method : create the clause where whit only one condition
     * @param String $field frist term of the condition (an attribute of the table)
     * @param String $value second term of the condition (value or interrogation)
     * @param String $operation operation of the condition ("=","<",">","!=")("Op all","Op any","in","exist")
     * @return String clause where
     */
    public static function where(String $field,String $value , String $operation="="):String
    {
       return  " WHERE " . $field .$operation ."'".$value."'";
    }

    /**
     * -Method : create the clause where whit more than one condition
     * @param array $fieldValue array with attribute as key and value as element of the array
     * @param array|String $logicOp logic operetion between conditions
     * @param array|String $operation operetion between terms of the conditions
     * @return String clause where
     * @throws Exception paramatres invalid
     */
    public static function multiWhere(Array $fieldValue , Array|String $logicOp="AND",Array|String $operation="="):String
    {
        if((is_array($operation) && count($fieldValue)!=count($operation) )|| (is_array($logicOp) && count($logicOp)!=count($fieldValue)-1))throw new Exception("parametres multiWhere invalid");
        $field=array_keys($fieldValue);
        $value=array_values($fieldValue);
        if(is_string($operation)){
            $result=" WHERE ".$field[0].$operation."'".$value[0]."'";
            for($i=1;$i<count($field);$i++){
                if(is_string($logicOp))$result=$result." ".$logicOp." ".$field[$i].$operation."'".$value[$i]."'";
                else $result=$result." ".$logicOp[$i-1]." ".$field[$i].$operation."'".$value[$i]."'";
            }
        }
        else{
            $result=" WHERE ".$field[0].$operation[0]."'".$value[0]."'";
            for($i=1;$i<count($field);$i++) {
                if (is_string($logicOp)) $result = $result . " " . $logicOp . " " . $field[$i] . $operation[$i] ."'". $value[$i]."'";
                else $result = $result . " " . $logicOp[$i - 1] . " " . $field[$i] . $operation[$i] ."'".$value[$i]."'";
            }
        }

        return $result;

    }

    /**
     * -Method : create load condition
     * @param String $table work table
     * @param String $where where clause
     * @return string query
     */
    public static function load(String $table ,String $where){
        $query = "SELECT * FROM " . $table .$where;
        return $query;
    }



    private static function OrderBy(String|Array $field,bool|Array $ascending=true):String{
        if((is_string($field) && is_array($ascending))||(is_array($field) && is_string($ascending))||(is_array($field)&&count($field)!=count($ascending)))throw new Exception("array field len must be equal to array ascending len");
        if(is_string($field)&& $ascending)return "ORDER BY ".$field." asc";
        elseif(is_string($field))return "ORDER BY ".$field." desc";
        else{
            $lineQ="ORDER BY ";
            if($ascending[0])$lineQ=$lineQ.$field[0]." asc ";
            else $lineQ=$lineQ.$field[0]." desc ";

            for($i=1;$i<count($field);$i++){
                if($ascending[$i])$lineQ=$lineQ.",".$field[$i]." asc ";
                else $lineQ=$lineQ.",".$field[$i]." desc ";
            }
            return $lineQ;
        }

    }


    /**
     * -Method : to calculate a query whit count field
     * @param String $table work table
     * @param String $where where clause
     * @param String|array $groupByfield field to group by
     * @param String $countField attribute to count
     * @param String $countOperation method of count
     * @return String query
     */
    public static function opGroupCount(String $table ,String $where="",String|Array$groupByfield="",String $countField="*",String $countOperation=""):String{
        $select= "SELECT count(".$countOperation." ".$countField.") AS count";
        if(is_array($groupByfield)){
            $groupBy=" GROUP BY ".$groupByfield[0];
            $select=$select.",".$groupByfield[0];
            for($i=1;$i<count($groupByfield);$i++){
                $groupBy=$groupBy.",".$groupByfield[$i];
                $select=$select.",".$groupByfield[$i];
            }
        }
        elseif($groupByfield!="") {
            $groupBy=" GROUP BY ".$groupByfield;
            $select=$select.",".$groupByfield;
        }
        else $groupBy="";
        $query=$select." FROM ".$table.$where.$groupBy;
        return $query;
    }

    /**
     * -Method : to calculate a query whit max field
     * @param String $table work table
     * @param String $maxField attribute to calculate the max value
     * @param String|null $where where clause
     * @param String|array $groupByfield attributes to group by
     * @return String query
     */
    public static function opGroupMax(String $table ,String $maxField,?String $where="",String|Array$groupByfield=""):String{
        if(is_null($where))$where="";
        $select= "SELECT max(".$maxField.") AS max";
        if(is_array($groupByfield)){
            $groupBy=" GROUP BY ".$groupByfield[0];
            $select=$select.",".$groupByfield[0];
            for($i=1;$i<count($groupByfield);$i++){
                $groupBy=$groupBy.",".$groupByfield[$i];
                $select=$select.",".$groupByfield[$i];
            }
        }
        elseif($groupByfield!="") {
            $groupBy=" GROUP BY ".$groupByfield;
            $select=$select.",".$groupByfield;
        }
        else $groupBy="";
        $query=$select." FROM ".$table.$where.$groupBy;
        return $query;
    }

    /**
     * -Method : to calculate a query whit min field
     * @param String $table work table
     * @param String $minField  attribute to calculate the min value
     * @param String|null $where where clause
     * @param String|array $groupByfield attributes to group by
     * @return string query
     */
    public static function opGroupMin(String $table ,String $minField,?String $where="",String|Array$groupByfield=""){
        if(is_null($where))$where="";
        $select= "SELECT min(".$minField.") AS min";
        if(is_array($groupByfield)){
            $groupBy=" GROUP BY ".$groupByfield[0];
            $select=$select.",".$groupByfield[0];
            for($i=1;$i<count($groupByfield);$i++){
                $groupBy=$groupBy.",".$groupByfield[$i];
                $select=$select.",".$groupByfield[$i];
            }
        }
        elseif($groupByfield!="") {
            $groupBy=" GROUP BY ".$groupByfield;
            $select=$select.",".$groupByfield;
        }
        else $groupBy="";
        $query=$select." FROM ".$table.$where.$groupBy;
        return $query;
    }

    /**
     * -Method : to calculate a query whit avg field
     * @param String $table work table
     * @param String $avgField attribute to calculate the min value
     * @param String $where where clause
     * @param String|array $groupByfield attributes to group by
     * @param String $avgOperation method of avg calculation
     * @return string query
     */
    public static function opGroupAvg(String $table ,String $avgField,String $where="",String|Array$groupByfield="",String $avgOperation=""){
        $select= "SELECT avg(".$avgOperation." ".$avgField.") AS avg";
        if(is_array($groupByfield)){
            $groupBy=" GROUP BY ".$groupByfield[0];
            $select=$select.",".$groupByfield[0];
            for($i=1;$i<count($groupByfield);$i++){
                $groupBy=$groupBy.",".$groupByfield[$i];
                $select=$select.",".$groupByfield[$i];
            }
        }
        elseif($groupByfield!="") {
            $groupBy=" GROUP BY ".$groupByfield;
            $select=$select.",".$groupByfield;
        }
        else $groupBy="";
        $query=$select." FROM ".$table.$where.$groupBy;
        return $query;
    }

    /**
     * -Method : to calculate a query whit sum field
     * @param String $table work table
     * @param String $sumField attribute to calculate the sum
     * @param String $where where clause
     * @param String|array $groupByfield attributes to group by
     * @param String $sumOperation method of avg calculation
     * @return string query
     */
    public static function opGroupSum(String $table ,String $sumField,String $where="",String|Array$groupByfield="",String $sumOperation=""){
        $select= "SELECT sum(".$sumOperation." ".$sumField.") AS sum";
        if(is_array($groupByfield)){
            $groupBy=" GROUP BY ".$groupByfield[0];
            $select=$select.",".$groupByfield[0];
            for($i=1;$i<count($groupByfield);$i++){
                $groupBy=$groupBy.",".$groupByfield[$i];
                $select=$select.",".$groupByfield[$i];
            }
        }
        elseif($groupByfield!="") {
            $groupBy=" GROUP BY ".$groupByfield;
            $select=$select.",".$groupByfield;
        }
        else $groupBy="";
        $query=$select." FROM ".$table.$where.$groupBy;
        return $query;
    }
}
