<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 06.04.18
 * Time: 0:25
 */

class NumbersGenerator
{
    private $aValue;
    private $cValue;
    private $mValue;
    private $startValue;
    private $nextValue;

    public function __construct(int $aValue, int $cValue, int $mValue, int $startValue)
    {
        $this->aValue = $aValue;
        $this->cValue = $cValue;
        $this->mValue = $mValue;
        $this->startValue = $startValue;
    }

    public function getValue()
    {
        if (isset($this->nextValue)){
            $this->nextValue = bcmod(bcadd(bcmul($this->aValue, $this->nextValue), $this->cValue), $this->mValue);
        } else {
            $this->nextValue = $this->startValue;
        }
        return $this->nextValue;
    }
}