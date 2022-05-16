<?php

require_once "Entity/EUser.php";
require_once "FDb.php";

class FComment
{
    private static string $table = "comment";

    private static function getArrayByObject(EComment $comment): array
    {
        $dateTime=new DateTime();

        $user = $comment->getUser()->getEmail();
        $text = $comment->getText();
        $updated_at = $dateTime->format("y-m-d h-i-s");

        $fieldValue = array(
            'emailorganizer' => $user,
            'text' => $text,
            'updated_at' => $updated_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $comment):EComment
    {
        $id=(int)$comment['idcomment'];
        $user=FUser::loadOne($comment['emailorganizer']);
        $text=$comment['text'];
        return new EComment($user,$text,$id);

    }


    //resturn where clause for take a tuple by primarykey
    private static function whereKey(int $valueKey): string
    {
        return FDb::where("idcomment",(String) $valueKey);
    }

    /**
     * -Method : store into database the data of EUser object
     * @param EComment $comment EUser object to store data
     * @return void
     */
    public static function store(EComment $comment): void
    {
        $dateTime=new DateTime();
        $fieldValue = self::getArrayByObject($comment);
        $fieldValue['created_at']=$dateTime->format("y-m-d h-i-s");
        FDb::store(self::$table, $fieldValue);
    }

    /**
     * -Method : return the frist object of the result of the query
     * @param int $key key of the table
     * @return EComment|null null if not found
     * @throws Exception FDb exInterrogation exception
     */
    public static function loadOne(int $key): ?EComment
    {
        $query = FDb::load(self::$table, self::whereKey($key));
        $result = FDb::exInterrogation($query);
        if (count($result) == 0) return null;
        $arrayObject = $result[0];
        return self::getObjectByArray($arrayObject);
    }

    /**
     * -Method : return an array of object according with the query result
     * @param String $where where clouse
     * @param String|array $orderBy attribute to sort by
     * @param bool|array $ascending order type (ascending/decreasing)
     * @return array array of object
     * @throws Exception FDb exInterrogation exception
     */
    public static function load(string $where, string|array $orderBy = "", bool|array $ascending = true): array
    {
        $query = FDb::load(self::$table[0], $where);
        $resultQ = FDb::exInterrogation($query, $orderBy, $ascending);
        $result = array();
        foreach ($resultQ as $c => $v) {
            $result[$c] = self::getObjectByArray($v);
        }
        return $result;
    }

    /**
     * -Method : search in database by primarykey
     * @param int $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception
     */
    public static function existOne(int $key): ?bool
    {
        return FDb::exist(FDb::load(self::$table, self::whereKey($key)));
    }

    /**
     * -Method : delate by primarykey
     * @param int $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function deleteOne(int $key): ?bool
    {
        return FDb::delate(self::$table, self::whereKey($key));
    }

    /**
     * -Method : update EAthlete data by primarykey saved into object passed
     * @param EComment $comment EAthlete data to update
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function updateOne(EComment $comment): ?bool
    {
        return FDb::update(self::$table, self::whereKey($comment->getUser()->getEmail()), self::getArrayByObject($comment));
    }

    public static function getDateTime(EComment $comment):?DateTime
    {
        $query = FDb::load(self::$table, self::whereKey($comment->getId()));
        $result = FDb::exInterrogation($query);
        if (count($result) == 0) return null;
        $arrayObject = $result[0];
        return new DateTime($arrayObject['updated_at']);
    }


}