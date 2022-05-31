<?php
class ETime
{
    private float $value;

    /**
     * @param float|String $value number of seconds
     */
    function __construct(float|String $value){
        $this->setValue($value);
    }


    /**
     * @param String $stringValue
     * @return float
     * @throws Exception
     */
    private function stringToFloat(String $stringValue):float{
        if(!preg_match('/^((([0-9]{1,2}:){1,2}[0-9]{1,2}(\.[0-9]*)?)|([0-9]*((\.|,)[0-9]*)?))$/',$stringValue))throw new Exception('invalid time format');
        str_replace(",",".",$stringValue);
        $arrayValue=explode(":",$stringValue);
        $seconds=0;
        foreach ($arrayValue as $v){
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
        if(is_numeric($value))$this->value=$value;
        elseif(strtoupper($value)=="DNF")$this->value=-1;
        elseif (strtoupper($value)=="DNS")$this->value=0;
        else $this->value=$this->stringToFloat($value);
    }

    /**
     * @return string
     */
    public function toString(){
        if($this->value==0)return "DNS";
        elseif ($this->value<0)return "DNF";
        $minutes=intdiv($this->value,60);
        $hours=intdiv($minutes,60);
        $minutes=$minutes-$hours*60;
        $seconds=number_format($this->value-($hours*3600)-($minutes*60),2);

        if($hours>0){
            if($minutes<10)$minutes="0".$minutes;
            if($hours<10)$hours="0".$hours;
            if($seconds<10)$seconds="0".$seconds;
            return $hours.":".$minutes.":".$seconds;
        }
        elseif ($minutes>0){
            if($minutes<10)$minutes="0".$minutes;
            if($seconds<10)$seconds="0".$seconds;
            return $minutes.":".$seconds;
        }
        else return $seconds;
    }


}