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

                <div class="w-full flex flex-row">
                    @foreach ($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-4">
                    @foreach ($monthGrid as $week)
                        
                            @foreach ($week as $day)
                                <div class="border p-4 text-center">
                                    <span class="block font-bold">{{ $day->format('j') }}</span>
                                    @include($dayView, [
                                        'componentId' => $componentId,
                                        'day' => $day,
                                        'dayInMonth' => $day->isSameMonth($startsAt),
                                        'isToday' => $day->isToday(),
                                        'events' => $getEventsForDay($day, $events),
                                    ])
                                </div>
                            @endforeach
                      
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
