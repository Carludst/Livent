<?php
class ETime
{
    private float $value;

    function __construct(float|String $value){
        if(gettype($value)=="double"){
            if($value<0)throw new Exception("time can't be negative");
            $this->value=$value;
        }
        else $this->value=$this->stringToFloat($value);
    }



    private function stringToFloat(String $stringValue):float{
        str_replace(",",".",$stringValue);
        $arrayValue=explode(":",$stringValue);
        if(count($arrayValue)>3)throw new Exception('time is expressible with at most three terms separeted by ":" ');
        $seconds=0;
        foreach ($arrayValue as $c=>$v){
            if(is_numeric($v)==false||(str_contains($v,".")&&$c!=count($arrayValue)-1))throw new Exception('minutes and hours must be int and seconds must bea number');
            $seconds=($seconds*60)+$v;
        }
        return $seconds;
    }



    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }





    /**
     * @param float $value
     */
    public function setValue(float|string $value): void
    {
        if(gettype($value)=="double"){
            if($value<0)throw new Exception("time can't be negative");
            $this->value=$value;
        }
        else $this->value=$this->stringToFloat($value);
    }

    public function toString(){
        $minutes=intdiv($this->value,60);
        $seconds=number_format($this->value%60,2);
        $hours=intdiv($minutes,60);
        $minutes=$minutes%60;
        $result=$seconds;

        if ($minutes>0){
            if($seconds<10)$result="0".$result;
            if($minutes<10) $result="0".$minutes.":".$result;
            else $result=$minutes.":".$result;
        }
        if($hours>0){
            if($hours<10) $result="0".$hours.":".$result;
            else $result=$hours.":".$result;;
        }

        return $result;
    }


}