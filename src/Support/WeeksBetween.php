<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\WeekHasPassed;

class WeeksBetween implements MomentsBetween
{
    private static array $isoDaysOfWeek = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
    ];
    private readonly string $firstDayOfWeek;

    public function __construct(int|string $firstDayOfWeek = 'monday')
    {
        if (is_numeric($firstDayOfWeek)) {
            $day = $this->isoDaysOfWeek[$firstDayOfWeek - 1] ?? null;
            assert($day !== null, 'bad day of week');
            $this->firstDayOfWeek = self::$isoDaysOfWeek[$firstDayOfWeek];
        } else {
            assert(in_array($firstDayOfWeek, self::$isoDaysOfWeek), 'bad day of week');
            $this->firstDayOfWeek = $firstDayOfWeek;
        }
    }

    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator
    {
        assert($start <= $end, "start must be before end");
        $moment = $start->modify("next $this->firstDayOfWeek midnight");
        while ($moment <= $end) {
            yield WeekHasPassed::of($moment);
            $moment = $moment->modify('+1 week');
        }
    }
}
