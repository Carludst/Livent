<?php

class FDbH {

    /** Method : save an object of Entity class into db
     * @param $obj
     */
    public static function store(EAthlete|EUser|EComment|EEvent|ECompetition|EContact $obj , ?int $idEvent=Null) {
        $Eclass = get_class($obj);
        $Fclass = "F".substr($Eclass,1);
        if(is_null($idEvent))$Fclass::store($obj);
        else $Fclass::store($obj,$idEvent);
    }




    /**
     * Method : return the object with the key passed like parameter
     * @param $key
     * @param String $Eclass
     * @return EAthlete|EUser|EComment|ECompetition|EContact|EEvent
     */
    public static function loadOne( $key,String $Eclass):NULL|EAthlete|EUser|EComment|ECompetition|EContact|EEvent {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::loadOne($key);
    }

    /**
     * Method : return the last object stored
     * @param String $Eclass
     * @return EAthlete|EUser|EComment|ECompetition|EContact|EEvent|NULL
     */
    public static function loadLastStore(String $Eclass):NULL|EAthlete|EUser|EComment|ECompetition|EContact|EEvent {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::loadLastStore();
    }

    /** -Method : return an array of object according with the query result
     * @param $where
     * @param $orderBy
     * @param $ascending
     * @param $Fclass
     * @return mixed
     */
    public static function load(String $Eclass,String $fieldWhere, String $valueWhere,String $opWhere="=",String|Array $orderBy="",bool|Array $ascending=true):Array {

        $Fclass = "F".substr($Eclass,1);
        return $Fclass::load($fieldWhere,$valueWhere,$opWhere, $orderBy, $ascending);
    }

    /** -Method : delate by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function deleteOne(int $key, String $Eclass):?bool {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::deleteOne($key);
    }

    public static function deleteReference(int $key,String $Eclass):bool
    {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::deleteReference($key);
    }

    /**  Method : search in database by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function existOne(int $key, String $Eclass):?bool {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::existOne($key);
    }


    /**
     * -Method : update Entity class data by primarykey saved into object passed
     * @param EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj
     * @return bool|null
     */
    public static function updateOne(EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj):?bool
    {
        $Eclass = get_class($obj);
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::updateOne($obj);
    }



    /**
     * @param EAthlete $obj
     * @param String $name
     * @param String $path
     * @param String $type
     * @param int $size
     * @return void
     */
    public static function storeFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath, String $name , String $pathFile , String $type,bool $upload=false){
        if($upload){
            move_uploaded_file($pathFile,$GLOBALS['defaultPath'].DIRECTORY_SEPARATOR.'file.'.$type);
            $pathFile=$GLOBALS['defaultPath'].DIRECTORY_SEPARATOR.'file.'.$type;
        }
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $blobFile=file_get_contents($pathFile) ;
        if($upload)unlink($pathFile);
        $blobFile=addslashes($blobFile);
        $updated_at=date("Y-m-d H:i:s");
        $created_at=date("Y-m-d H:i:s");
        FDb::store('file',array('path'=>$pathDB,'name'=>$name,'type'=>$type,'file'=>$blobFile , 'updated_at'=>$updated_at , 'created_at'=>$created_at));
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath
     * @param String $name
     * @param String $pathFile
     * @param String $type
     * @param int $size
     * @param float|null $resize
     * @return void
     * @throws Exception
     */
    public static function updateFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath, String $name , String $pathFile , String $type , bool $upload=false):bool
    {
        if($upload){
            move_uploaded_file($pathFile,$GLOBALS['defaultPath'].DIRECTORY_SEPARATOR.'file.'.$type);
            $path=$GLOBALS['defaultPath'].DIRECTORY_SEPARATOR.'file.'.$type;
        }
        else $path=$pathFile;
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $blobFile=file_get_contents($path) ;
        if($upload)unlink($path);
        $blobFile=addslashes($blobFile);
        $updated_at=date("Y-m-d H:i:s");
        return FDb::update('file',FDb::multiWhere(array('path','name'),array($pathDB,$name)),array('path'=>$pathDB,'name'=>$name,'type'=>$type,'file'=>$blobFile , 'updated_at'=>$updated_at));
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @param String $name
     * @return String
     * @throws Exception
     */
    public static function loadFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name , ?float $resize=NULL ,bool $base64=true):String|Array
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $array=FDb::exInterrogation(FDb::load('file',FDb::multiWhere(array("path","name"),array($pathDB,$name)),array('file','type')));
        if(!count($array)>0) throw new Exception("don't exist file with this path");
        $array=$array[0];

        if(count($array)>0&&!is_null($resize)&& $resize<1){
            $pathFile='../img.'.$array['type'];


            $file=fopen($pathFile,'w');
            fwrite($file,stripslashes($array['file']));
            fclose($file);

            $currentSize=getimagesize($pathFile);
            $width=$currentSize[0]*$resize;
            $height=$currentSize[1]*$resize;

            $img=imagecreatefromjpeg($pathFile);
            if($img==false)$img=imagecreatefrompng($pathFile);
            if($img==false)throw new Exception('file format not supported');
            $imgResized=imagecreatetruecolor($width,$height);
            imagecopyresampled($imgResized,$img,0,0,0,0,$width,$height,$currentSize[0],$currentSize[1]);
            if($imgResized==false)throw new Exception('resized not succes');

            if(!imagejpeg($imgResized,'../imgresized.jpg')){
                if(!imagepng($imgResized,'../imgresized.jpg'))throw new Exception('file format not supported');
            }
            $blob=file_get_contents('../imgresized.jpg') ;

            unlink('../imgresized.jpg');
            unlink($pathFile);
            imagedestroy($img);
            imagedestroy($imgResized);
        }
        else $blob=stripslashes($array['file']);
        if($base64)return 'data:image/'.$array['type'].';base64,'.base64_encode($blob);
        else return array('blob'=>$blob,'type'=>$array['type']);
    }

    /**
     * @param String|array|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath
     * @param array|String $name
     * @param String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent|NULL $objDefaultPath
     * @param String|NULL $defaultName
     * @param float|null $resize
     * @param bool $base64
     * @return array
     * @throws Exception
     */
    public static function loadMultiFile(String|Array|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , Array|String $name ,NULL|String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objDefaultPath=NULL , NULL|String $defaultName=NULL ,?float $resize=NULL ,bool $base64=true):Array|String
    {
        if(is_array($objPath)&&is_array($name))throw new Exception('you have to fixed at least one parameters between name or directory');
        $default='';
        if(is_array($objPath)){
            $result=array();
            foreach ($objPath as $element){
                if(FDbH::existFile($element, $name)) $result[]=FDbH::loadFile($element, $name, $resize,$base64);
                elseif(!empty($default))$result[]=$default;
                elseif(!is_null($objDefaultPath) && !is_null($defaultName) && FDbH::existFile($objDefaultPath, $name)){
                    $default=FDbH::loadFile($objDefaultPath, $name, $resize,$base64);
                    $result[]=$default;
                }
                else $result[]=$default;
            }
        }
        elseif(is_array($name)){
            $result=array();
            foreach ($name as $element){
                if(FDbH::existFile($objPath, $element)) $result[]=FDbH::loadFile($objPath, $element, $resize , $base64);
                elseif(!empty($default))$result[]=$default;
                elseif(!is_null($objDefaultPath) && !is_null($defaultName) && FDbH::existFile($objDefaultPath, $defaultName)){
                    $default=FDbH::loadFile($objDefaultPath, $defaultName, $resize,$base64);
                    $result[]=$default;
                }
                else $result[]=$default;
            }
        }
        else{
            $result='';
            if(FDbH::existFile($objPath, $name))$result=FDbH::loadFile($objPath, $name, $resize , $base64);
            elseif(!is_null($objDefaultPath) && !is_null($defaultName) && FDbH::existFile($objDefaultPath, $defaultName)){
                $result=FDbH::loadFile($objDefaultPath, $defaultName, $resize,$base64);
            }
        }
        return $result;
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @param String $name
     * @return bool|null
     * @throws Exception
     */
    public static function deleteFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name): bool
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        return FDb::delate('file',FDb::multiWhere(array("path","name"),array($pathDB,$name)));
    }

    public static function existFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name):bool
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        return FDb::exist(FDb::load('file',FDb::multiWhere(array("path","name"),array($pathDB,$name))));
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @return array
     * @throws Exception
     */
    public static function loadDirectory(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath){
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $resultQ=FDb::exInterrogation(FDb::load('file',FDb::where('path',$pathDB),'name'));
        $result=array();
        foreach ($resultQ as $key=>$value){
            $result[]=$value['name'];
        }
        return $result;
    }


    /**
     * Method : for login of an user
     * @param String $email
     * @param String $password
     * @return bool|null
     */
    public static function login(String $email, String $password) :?bool{
        return FUser::login($email, $password );
    }

    /**
     * @param EComment $comment
     * @return DateTime
     */
    public static function getDateTimeComment(EComment $comment):DateTime
    {
        return FComment::getDateTime($comment);
    }



    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @param ETime $time
     * @return bool|null
     */
    public static function addResultCompetition(ECompetition $competition,EAthlete $athlete, ETime $time):?bool{
        return FCompetition::addResult($competition, $athlete, $time);
    }

    /** -Method
     * @param $competition
     * @param $athlete
     * @param $EUser
     * @return mixed
     */
    public static function addRegistrationCompetition(ECompetition $competition,EAthlete $athlete, EUser $user):?bool{
        return FCompetition::addRegistration($competition, $athlete, $user);
    }

    /** -Method
     * @param $competition
     * @param $athlete
     * @return mixed
     */
    public static function deleteRegistration(ECompetition $competition, EAthlete $athlete):bool {
        return FCompetition::deleteRegistration($competition,$athlete);
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return bool
     */
    public static function deleteResult(ECompetition $competition, EAthlete $athlete):bool {
        return FCompetition::deleteResult($competition,$athlete);
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return bool
     */
    public static function existRegistration(ECompetition $competition, EAthlete $athlete):bool{
        return FCompetition::existRegistration($competition,$athlete);
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return EUser
     */
    public static function RegisteredBy(ECompetition $competition, EAthlete $athlete):EUser{
        return FCompetition::RegisteredBy($competition,$athlete);
    }

    /** -Method
     * @param ECompetition $competition
     * @return mixed
     */
    public static function getClassificationCompetition(ECompetition $competition):Array{
        return FCompetition::getClassification($competition);
    }

    /**
     * @param ECompetition $competition
     * @return array
     */
    public static function getRegistrationsCompetition(ECompetition $competition):Array{
        return FCompetition::getRegistrations($competition);
    }

    /**
     * -Method : return an array (name copetition key) of array (idevent , time) with the result order by time
     * @param EAthlete $athlete
     * @return array|null
     * @throws Exception
     */
    public static function getResultsAthlete( EAthlete $athlete):Array{
        return FAthlete::getResults($athlete);
    }


    public static function getRegistrationUser(EUser $user ):Array
    {
        return FUser::getRegistration($user);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getCompetitions(EEvent $event):Array
    {
        return FEvent::getCompetitions($event);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getContacts(EEvent $event):Array
    {
        return FEvent::getContacts($event);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getComments(EEvent $event):Array
    {
        return FEvent::getComments($event);
    }

    /**
     * @param ECompetition $competition
     * @return EEvent
     */
    public static function loadEventByCompetition(Array|ECompetition $competition):array|EEvent
    {
        if(is_array($competition)){
            $events=array();
            foreach ($competition as $v){
                $events[]=FEvent::loadByCompetition($v);
            }
            return $events;
        }
        else return FEvent::loadByCompetition($competition);
    }

    /**
     * @param String|null $name
     * @param EUser|null $organizer
     * @param String $place
     * @return array
     */
    public static function searchEvent(?bool $public=NULL ,?String $name=NULL , ?EUser $organizer=NULL ,?String $place=NULL  , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL , ?String $sport=NULL , bool $running=false){
        return FEvent::search($public,$name,$organizer,$place,$startDateFrom,$startDateTo,$sport,$running);
    }

    /**
     * @param String|Null $name
     * @param String|Null $surname
     * @param DateTime|Null $birthdateFrom
     * @param DateTime|Null $birthdateTo
     * @param bool|null $famale
     * @param String|Null $team
     * @param String|Null $sport
     * @return array
     */
    public static function searchAthlete(String|Null $name=NULL , String|Null $surname=NULL , DateTime|Null $birthdateFrom=NULL , DateTime|Null $birthdateTo=NULL , ?bool $famale=NULL , String|Null $team=NULL , String|Null $sport=NULL ){
        return FAthlete::search($name,$surname,$birthdateFrom,$birthdateTo,$famale,$team,$sport);
    }

    /**
     * @param String|Null $containText
     * @param EUser|NULL $user
     * @return array
     */
    public static function searchComment(String|Null $containText=NULL , EUser|NULL $user=NULL){
        return FComment::search($containText,$user);
    }

    /**
     * @param String|Null $name
     * @param String|Null $email
     * @param String|Null $number
     * @param EEvent|Null $event
     * @return array
     */
    public static function searchContact(String|Null $name=NULL , String|Null $email=NULL , String|Null $number=NULL , EEvent|Null $event=NULL){
        return FContact::search($name,$email,$number,$event);
    }

    /**
     * @param String|Null $username
     * @return array
     */
    public static function searchUser(String|Null $username=NULL, String|Null $email=NULL ,String|Null $type=NULL , String|Null $exceptType=Null ){
        return FUser::search($username,$email, $type , $exceptType);
    }

    /**
     * @param EEvent|NULL $event
     * @param String|NULL $name
     * @param String|null $gender
     * @param String|null $sport
     * @param DateTime|Null $dateFrom
     * @param DateTime|Null $dateTo
     * @param EDistance|null $distanceFrom
     * @param EDistance|null $distanceTo
     * @return array
     */
    public static function searchCompetition(EEvent|NULL $event=NULL,String $name=NULL,?String $gender=NULL ,?String $sport=NULL ,DateTime|Null $dateFrom=NULL , DateTime|Null $dateTo=NULL,?EDistance $distanceFrom=NULL ,?EDistance $distanceTo=NULL){
        return FCompetition::search($event,$name,$gender,$sport,$dateFrom,$dateTo,$distanceFrom,$distanceTo);
    }

    /**
     * @param Exception $exception
     * @return void
     */
    public static function storeError(Exception $exception)
    {
        FFile::append("\n\n".$exception->getMessage()."\n".$exception->getTraceAsString());
    }


    /**
     * @return String
     */
    public static function readErrors():String
    {
        return FFile::read();
    }

    /**
     * @return void
     */
    public static function deleteErrors()
    {
        FFile::delete();
    }

    /**
     * @return String
     */
    public static function returnErrorPathFile(bool $webReference=true)
    {
        $path=FFile::getPath();
        if($webReference)$path=str_replace($GLOBALS['defaultPath'],$GLOBALS['webReference'],$path);
        return $path;

    }


}
