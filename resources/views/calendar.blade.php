<div
    @if ($pollMillis !== null && $pollAction !== null) wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms @endif>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="grid grid-cols-7 gap-1">
                    @foreach ($monthGrid->first() as $day)
                        <div class="text-center">
                            @include($dayOfWeekView, ['day' => $day])
                        </div>
                    @endforeach
                </div>

                @foreach ($monthGrid as $week)
                    <div class="grid grid-cols-7 gap-1">
                        @foreach ($week as $day)
                        <div class="text-center">
                            @include($dayView, [
                                'componentId' => $componentId,
                                'day' => $day,
                                'dayInMonth' => $day->isSameMonth($startsAt),
                                'isToday' => $day->isToday(),
                                'events' => $getEventsForDay($day, $events),
                            ])
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
