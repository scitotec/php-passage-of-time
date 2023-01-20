<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;

class DelegatingMomentsBetween implements MomentsBetween
{
    public function __construct(private readonly array $moments)
    {
    }


    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        foreach ($this->moments as $delegate) {
            yield from $delegate($start, $end);
        }
    }
}
