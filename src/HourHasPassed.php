<?php

namespace Scitotec\PassageOfTime;

use DateTimeImmutable;
use DateTimeInterface;

class HourHasPassed
{
    public function __construct(
        private readonly DateTimeImmutable $date,
    ) {
    }

    public static function of(DateTimeInterface $time): self
    {
        return new self(DateTimeImmutable::createFromInterface($time));
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function toIsoString(): string
    {
        return $this->date->format('H:i');
    }
}
