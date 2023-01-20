<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\DayHasPassed;

class DaysBetween implements MomentsBetween
{
    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        assert($start <= $end, "start must be before end");
        $moment = $this->atEndOfDay($start);
        while ($moment <= $end) {
            yield DayHasPassed::of($moment);
            $moment = $moment->modify('+1 day');
        }
    }

    private function atEndOfDay(DateTimeImmutable $start): false|DateTimeImmutable
    {
        return $start->modify('next day midnight')->modify('-1 microsecond');
    }
}
