<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="overflow-x-auto w-full">
        <table class="table-auto">
            <thead>
                <tr>
                    @foreach($monthGrid->first() as $day)
                        <th class="px-4 py-2">{{ $day->format('D') }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($monthGrid as $week)
                    <tr>
                        @foreach($week as $day)
                            <td class="px-4 py-2 border">
                                <div class="text-center">
                                    {{ $day->format('j') }}
                                </div>
                                <!-- Aquí puedes agregar cualquier otra información, como eventos para este día -->
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
