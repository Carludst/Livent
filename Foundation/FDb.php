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
            $arrayBind=array(":$fields[0]"=>$values[0]);
            $valStr=":$fields[0]";
            $fieldStr=$fields[0];
            for($i=1;$i<count($values);$i++){
                $arrayBind[":$fields[$i]"]=$values[$i];
                $valStr=$valStr.",".":$fields[$i]";
                $fieldStr=$fieldStr.",".$fields[$i];
            }
            $query = "INSERT INTO " . $table ."(".$fieldStr.")". "  VALUES  " ."(".$valStr.")";
            $stmt=self::$pdoV->prepare($query);
            $stmt->execute($arrayBind);
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
    public static function delate(String $table , Array $where):?bool{
        try{
            if(self::exist(self::load($table,$where))){
                self::$pdoV->beginTransaction();
                $query = "DELETE FROM " . $table .$where["where"];
                $stmt = self::$pdoV->prepare($query);
                $stmt->execute($where["bind"]);
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
    public static function update(String $table,Array $where,Array $fieldValue):?bool
    {
        try {
            if(self::exist(self::load($table,$where))){
                self::$pdoV->beginTransaction();
                $arrayBind=$where["bind"];
                $fields=array_keys($fieldValue);
                $values=array_values($fieldValue);
                $arrayBind[":field0"]=$values[0];
                $clouse=$fields[0]."=".":field0";
                for($i=1;$i<count($fields);$i++){
                    $arrayBind[":field$i"]=$values[$i];
                    $clouse=$clouse.",".$fields[$i]."=".":field$i";
                }
                $query = "UPDATE " . $table . " SET " . $clouse.$where["where"] ;
                $stmt = self::$pdoV->prepare($query);
                $stmt->execute($arrayBind);
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
    public static function exInterrogation(Array $query,String|Array $orderBy="",bool|Array $ascending=true):?array{
        try{
            self::$pdoV->beginTransaction();
            if($orderBy!="")$q=$query["query"]." ".self::OrderBy($orderBy,$ascending);
            else $q=$query["query"];
            $stmt=self::$pdoV->prepare($q);
            $stmt->execute($query["bind"]);

            $num = $stmt->rowCount();
            if ($num == 0) {
                $result= null;                                   //nessuna riga interessata -> return null
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
     * @param array|null $valParametres parametres not just express into the query (useful for login)
     * @return bool|null return true if the query result is not empty , null if is occurred an error
     */
    public static function exist(Array $query):?bool
    {
        try{
            self::$pdoV->beginTransaction();
            $stmt=self::$pdoV->prepare($query["query"]);
            $stmt->execute($query["bind"]);

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

    public static function storeFile(String $pathFile, String $pathDB ,String $name ,String $type,int $size){
        $file=file_get_contents($pathFile) ;
        $file=addslashes($file);

        $updated_at=date("Y-m-d H:i:s");
        $created_at=date("Y-m-d H:i:s");
        self::store('file',array('path'=>$pathDB,'nome'=>$name,'size'=>$size,'type'=>$type,'file'=>$file , 'updated_at'=>$updated_at , 'created_at'=>$created_at));
    }



    /**
     * -Method : create the clause where whit only one condition
     * @param String $field frist term of the condition (an attribute of the table)
     * @param String $value second term of the condition (value or interrogation)
     * @param String $operation operation of the condition ("=","<",">","!=")("Op all","Op any","in","exist")
     * @return String clause where
     */
    public static function where(String $field, $value , String $operation="="):Array
    {
       return  array("where"=>" WHERE " . $field .$operation .":value0","bind"=>array(":value0"=>$value));
    }

    /**
     * -Method : create the clause where whit more than one condition
     * @param array $fieldValue array with attribute as key and value as element of the array
     * @param array|String $logicOp logic operetion between conditions
     * @param array|String $operation operetion between terms of the conditions
     * @return String clause where
     * @throws Exception paramatres invalid
     */
    public static function multiWhere(Array $field,Array $value , String $logicOp="AND",Array|String $operation="="):Array
    {
        if((is_array($operation) && count($field)!=count($value) && count($field)!=count($operation) ))throw new Exception("parametres multiWhere invalid");
        if(is_string($operation)){
            $result=" WHERE ".$field[0].$operation.":value0";
            $arrayBind=array(":value0"=>$value[0]);
            for($i=1;$i<count($field);$i++){
                $result=$result." ".$logicOp." ".$field[$i].$operation.":value$i";
                $arrayBind[":value$i"]=$value[$i];
            }
        }
        else{
            if(is_string($value[0])) $value[0]="'".$value[0]."'";
            $result=" WHERE ".$field[0].$operation[0].":value0";
            $arrayBind=array(":value0"=>$value[0]);
            for($i=1;$i<count($field);$i++) {
                if(is_string($value[$i])) $value[0]="'".$value[0]."'";
                $result = $result . " " . $logicOp . " " . $field[$i] . $operation[$i] .":value$i";
                $arrayBind[":value$i"]=$value[$i];
            }
        }

        return array("where"=>$result,"bind"=>$arrayBind);

    }

    /**
     * -Method : create load condition
     * @param String $table work table
     * @param String $where where clause
     * @return string query
     */
    public static function load(String $table ,?Array $where=Null, String|Array $select="*"):Array{
        if(is_null($where))$where=array('where'=>"",'bind'=>array());
        if (is_string($select)){
            $query = "SELECT ".$select." FROM " . $table .$where["where"];
        }
        else{
            $strSelect=$select[0];
            for ($i=1;$i<count($select);$i++){
                $strSelect=' , '.$select[$i];
            }
            $query = "SELECT ".$strSelect." FROM " . $table .$where["where"];
        }
        return array("query"=>$query,"bind"=>$where["bind"]);
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
    public static function opGroupCount(String $table ,?Array $where=NULL,String|Array$groupByfield="",String $countField="*",String $countOperation=""):Array{
        if(is_null($where))$where=array("where"=>"","bind"=>array());
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
        $query=$select." FROM ".$table.$where["where"].$groupBy;
        return array("query"=>$query,"bind"=>$where["bind"]);
    }

    /**
     * -Method : to calculate a query whit max field
     * @param String $table work table
     * @param String $maxField attribute to calculate the max value
     * @param String|null $where where clause
     * @param String|array $groupByfield attributes to group by
     * @return String query
     */
    public static function opGroupMax(String $table ,String $maxField,?Array $where=NULL,String|Array$groupByfield=""):Array{
        if(is_null($where))$where=array("where"=>"","bind"=>array());
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
        $query=$select." FROM ".$table.$where["where"].$groupBy;
        return array("query"=>$query,"bind"=>$where["bind"]);
    }

    /**
     * -Method : to calculate a query whit min field
     * @param String $table work table
     * @param String $minField  attribute to calculate the min value
     * @param String|null $where where clause
     * @param String|array $groupByfield attributes to group by
     * @return string query
     */
    public static function opGroupMin(String $table ,String $minField,?Array $where=NULL,String|Array$groupByfield=""):Array{
        if(is_null($where))$where=array("where"=>"","bind"=>array());
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
        $query=$select." FROM ".$table.$where["where"].$groupBy;
        return array("query"=>$query,"bind"=>$where["bind"]);
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
    public static function opGroupAvg(String $table ,String $avgField,?Array $where=NULL,String|Array$groupByfield="",String $avgOperation=""):Array{
        if(is_null($where))$where=array("where"=>"","bind"=>array());
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
        $query=$select." FROM ".$table.$where["where"].$groupBy;
        return array("query"=>$query,"bind"=>$where["bind"]);
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
    public static function opGroupSum(String $table ,String $sumField,?Array $where=NULL,String|Array$groupByfield="",String $sumOperation=""):Array{
        if(is_null($where))$where=array("where"=>"","bind"=>array());
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
        $query=$select." FROM ".$table.$where["where"].$groupBy;
        return array("query"=>$query,"bind"=>$where["bind"]);
    }
}
