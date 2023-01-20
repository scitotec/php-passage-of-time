<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\MinuteHasPassed;

class MinutesBetween implements MomentsBetween
{
    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        assert($start <= $end, "start must be before end");
        $moment = $this->startOfNextMinute($start);
        while ($moment <= $end) {
            yield MinuteHasPassed::of($moment);
            $moment = $moment->modify('+1 minute');
        }
    }

    private function startOfNextMinute(DateTimeImmutable $dateTime): false|DateTimeImmutable
    {
        $nextMinute = $dateTime->modify('+1 minute');
        return $nextMinute->setTime($nextMinute->format('H'), $nextMinute->format('i'));
    }
}
