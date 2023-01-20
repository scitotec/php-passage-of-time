<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\MonthHasPassed;

class MonthsBetween implements MomentsBetween
{
    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        assert($start <= $end, "start must be before end");
        $moment = $start->modify('first day of next month midnight');
        while ($moment <= $end) {
            yield MonthHasPassed::of($moment);
            $moment = $moment->modify('next month');
        }
    }
}
