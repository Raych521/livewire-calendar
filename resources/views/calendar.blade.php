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

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">
                <div class="grid grid-cols-7"> <!-- Dividir en 7 columnas para los días de la semana -->
                    @foreach($monthGrid->first() as $day)
                        <div class="text-center p-2"> <!-- Estilo para cada celda del día -->
                            {{ $day->format('d') }} <!-- Mostrar solo el día del mes -->
                        </div>
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="grid grid-cols-7"> <!-- Dividir en 7 columnas para los días de la semana -->
                        @foreach($week as $day)
                            <div class="text-center p-2 {{ $day->isToday() ? 'bg-blue-200' : '' }}"> <!-- Estilo para cada celda del día, cambiar el fondo si es el día actual -->
                                {{ $day->format('d') }} <!-- Mostrar solo el día del mes -->
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
