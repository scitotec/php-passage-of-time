<?php

namespace Scitotec\PassageOfTime;

enum Quarter
{
    case Q1;
    case Q2;
    case Q3;
    case Q4;

    public function next(): Quarter
    {
        return match ($this) {
            self::Q1 => self::Q2,
            self::Q2 => self::Q3,
            self::Q3 => self::Q4,
            self::Q4 => self::Q1,
        };
    }
}
