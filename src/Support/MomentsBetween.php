<?php

namespace Scitotec\PassageOfTime\Support;

use DateTimeImmutable;
use Generator;

interface MomentsBetween
{
    public function __invoke(DateTimeImmutable $start, DateTimeImmutable $end): Generator;
}
