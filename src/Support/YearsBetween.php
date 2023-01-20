<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\YearHasPassed;

class YearsBetween implements MomentsBetween
{
    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        assert($start <= $end, "start must be before end");
        $moment = $start->modify('first day of january next year midnight');
        while ($moment <= $end) {
            yield YearHasPassed::of($moment);
            $moment = $moment->modify('next year');
        }
    }
}
