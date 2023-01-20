<?php

namespace Scitotec\PassageOfTime\Scheduling;

use DateInterval;
use DateTimeImmutable;
use Generator;
use Scitotec\PassageOfTime\Support\MomentsBetween;

class Scheduler
{
    private ?DateTimeImmutable $endOfRun;

    public function __construct(
        private readonly MomentsBetween $momentsBetween,
        private readonly float          $intervalSeconds = 15.0,
        private readonly DateInterval   $maxRuntime = new DateInterval('PT10M'),
        private ?DateTimeImmutable      $lastRun = null,
    ) {
    }

    public function events(): Generator
    {
        $this->endOfRun = ($this->now())->add($this->maxRuntime);
        $this->lastRun = $this->lastRun ?? $this->now();

        while (true) {
            $now = $this->now();
            if ($this->shouldStop($now)) {
                break;
            }
            yield from $this->momentsBetween->__invoke($this->lastRun, $now);

            $this->lastRun = $now;
            $this->pause();
        }
    }

    protected function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }

    protected function pause(): void
    {
        $intervalMicroseconds = (int)($this->intervalSeconds * 1_000_000);
        usleep($intervalMicroseconds);
    }

    protected function shouldStop(DateTimeImmutable $now): bool
    {
        return $this->endOfRun < $now;
    }
}
