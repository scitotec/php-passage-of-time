<?php

namespace Scitotec\PassageOfTime;

use DateTimeImmutable;
use DateTimeInterface;

class WeekHasPassed
{
    public function __construct(
        private readonly DateTimeImmutable $date,
    ) {
    }

    public static function of(DateTimeInterface $date): self
    {
        return new self(DateTimeImmutable::createFromInterface($date));
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function toIsoString(): string
    {
        return $this->date->format('W');
    }
}
