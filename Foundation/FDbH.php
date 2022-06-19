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
     * Method : return the frist object of the result of the query
     * @param $key
     * @param String $Eclass
     * @return EAthlete|EUser|EComment|ECompetition|EContact|EEvent
     */
    public static function loadOne($key,String $Eclass):NULL|EAthlete|EUser|EComment|ECompetition|EContact|EEvent {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::loadOne($key);
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
    public static function deleteOne($key, String $Eclass):?bool {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::deleteOne($key);
    }

    /**  Method : search in database by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function existOne($key, String $Eclass):?bool {
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
    public static function storeFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath, String $name , String $pathFile , String $type , int $size, ?float $resize=NULL){
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $blobFile=file_get_contents($pathFile) ;
        $blobFile=addslashes($blobFile);
        $updated_at=date("Y-m-d H:i:s");
        $created_at=date("Y-m-d H:i:s");
        FDb::store('file',array('path'=>$pathDB,'name'=>$name,'size'=>$size,'type'=>$type,'file'=>$blobFile , 'updated_at'=>$updated_at , 'created_at'=>$created_at));
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @param String $name
     * @return String
     * @throws Exception
     */
    public static function loadFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name , ?float $resize=NULL ,bool $base64=true):String
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile($objPath);
        }
        $array=FDb::exInterrogation(FDb::load('file',FDb::multiWhere(array("path","name"),array($pathDB,$name))));
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

        if($base64)return base64_encode($blob);
        else return $blob;
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


    /** Method : for login of an user
     * @param $user
     * @param $password
     * @return array|EUser|null
     */
    public static function login(EUser $user) :?bool{
        return FUser::login($user);
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
     * @param $competition
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
    public static function loadEventByCompetition(ECompetition $competition):EEvent
    {
        return FEvent::loadByCompetition($competition);
    }

    /**
     * @param String|null $name
     * @param EUser|null $organizer
     * @param String $place
     * @return array
     */
    public static function searchEvent(?bool $public=NULL ,?String $name=NULL , ?EUser $organizer=NULL ,?String $place=NULL  , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL){
        return FEvent::search($public,$name,$organizer,$place,$startDateFrom,$startDateTo);
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
    public static function searchAthlete(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport ){
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
    public static function searchUser(String|Null $username=NULL ){
        return FContact::search($username);
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
        FFile::append((FFile::numberRow()+1).") ".$exception->getTraceAsString());
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
    public static function returnErrorPathFile()
    {
        return FFile::getPath();

    }


}
