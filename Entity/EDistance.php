<?php
class EDistance
{
    private float $value;

    /**
     * @param float|String $value
     * @throws Exception return an exception when it is passed a negative parameter
     */
    function __construct(float|String $value){
        if(is_numeric($value)){
            if($value<0)throw new Exception("distance can't be negative");
            $this->value=$value;
        }
        else $this->value=$this->stringToFloat($value);
    }


    private function stringToFloat(String $stringValue):float{
        if(str_ends_with($stringValue,"km")){
            $sValue=substr($stringValue,0,-2);
            $conversion=1;
        }
        elseif(str_ends_with($stringValue,"mi")){
            $sValue=substr($stringValue,0,-2);
            $conversion=1000/1609.34;
        }
        elseif(str_ends_with($stringValue,"cm")){
            $sValue=substr($stringValue,0,-2);
            $conversion=1000/0.01;
        }
        elseif(str_ends_with($stringValue,"m")){
            $sValue=substr($stringValue,0,-1);
            $conversion=1000;
        }
        else throw new Exception("the string passed is not a distance or not have a valid unit of measure");
        if(is_numeric($sValue)==false)throw new Exception("the string passed is not a distance");
        return $sValue*$conversion;
    }

    /**
     * @return float
     */
    public function getValue(?int $precision=3): float
    {
        if(is_null($precision))return $this->value;
        else return round($this->value,$precision);
    }

    /**
     * @param float|String $value
     */
    public function setValue(float|string $value): void
    {
        if(gettype($value)=="double"){
            if($value<0)throw new Exception("distance can't be negative");
            $this->value=$value;
        }
        else $this->value=$this->stringToFloat($value);
    }

    /**
     * @param String|null $unit unit of the distance
     * @param int|null $precision number of digits after comma
     * @return String
     * @throws Exception return an expetion if the unit passed is invalid
     */
    public function toString(?String $unit=null,?int $precision=null):String
    {
        if(is_null($unit)){
            if($this->value<1){
                $uValue=$this->value*1000;
                $sUnit="m";
            }
            else{
                $uValue=$this->value;
                $sUnit="km";
            }
        }
        elseif($unit=="cm"||$unit=="m"||$unit=="km"||$unit=="mi"){
            $sUnit=$unit;
            if($unit=="km")$uValue=$this->value;
            elseif($unit=="mi")$uValue=$this->value*(1000/1609.34);
            elseif ($unit=="cm")$uValue=$this->value*(1000/0.01);
            else $uValue=$this->value*1000;
        }
        else throw new Exception("invalid unit");

        if(is_null($precision)==false)$uValue=round($uValue,$precision);
        else{
            if($sUnit=="m"||$sUnit=="cm")$uValue=round($uValue,0);
            else $uValue=round($uValue,1);
        }
        return $uValue.$sUnit;

    }
}