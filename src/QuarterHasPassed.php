<?php

namespace Scitotec\PassageOfTime;

use DateTimeImmutable;
use DateTimeInterface;

class QuarterHasPassed
{
    public function __construct(
        private readonly DateTimeImmutable $date,
        private readonly Quarter           $quarter,
    ) {
    }

    public static function of(DateTimeInterface $date, Quarter $quarter): self
    {
        return new self(DateTimeImmutable::createFromInterface($date), $quarter);
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getQuarter(): Quarter
    {
        return $this->quarter;
    }

    public function toIsoString(): string
    {
        return $this->date->format('Y');
    }
}
