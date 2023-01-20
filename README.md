# Passage of Time

Passage of Time is an implementation of the [Passage of Time Event](https://verraes.net/2019/05/patterns-for-decoupling-distsys-passage-of-time-event/)
idea, originally presented by [Mathias Verraes](https://github.com/mathiasverraes).

It defines the following events to attach business logic to:

* `MinuteHasPassed` - signals the end of a minute
* `HourHasPassed` - signals the end of an hour
* `DayHasPassed` - signals the end of a day
* `WeekHasPassed` - signals the end of a week
* `MonthHasPassed` - signals the end of a month
* `QuarterHasPassed` - signals the end of a quarter
* `YearHasPassed` - signals the end of a year
