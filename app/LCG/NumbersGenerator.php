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
    private $nextValue = 0;

    public function __construct(int $aValue, int $cValue, int $mValue, int $startValue)
    {
        $this->aValue = $aValue;
        $this->cValue = $cValue;
        $this->mValue = $mValue;
        $this->nextValue = $startValue;
    }

    public function getValue()
    {
        $this->nextValue = bcmod(bcadd(bcmul($this->aValue, $this->nextValue), $this->cValue), $this->mValue);
        return $this->nextValue;
    }
}