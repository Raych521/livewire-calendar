<?php

namespace Raych521\LivewireCalendar\Tests;


use Raych521\LivewireCalendar\LivewireCalendar;
use Livewire\Livewire;

class LivewireCalendarTest extends TestCase
{
    private function createComponent($parameters = [])
    {
        return Livewire::test(LivewireCalendar::class, $parameters);
    }

    /** @test */
    public function can_build_component()
    {
        // Act
        $component = $this->createComponent();

        // Assert
        $component->assertNotNull();
    }

    /** @test */
    public function can_navigate_to_next_month()
    {
        // Act
        $component = $this->createComponent();
        $component->call('goToNextMonth');

        // Assert
        $component->assertSet('startsAt', today()->startOfMonth()->addMonthNoOverflow());
        $component->assertSet('endsAt', today()->endOfMonth()->startOfDay()->addMonthNoOverflow());
    }

    /** @test */
    public function can_navigate_to_previous_month()
    {
        // Act
        $component = $this->createComponent();
        $component->call('goToPreviousMonth');

        // Assert
        $component->assertSet('startsAt', today()->startOfMonth()->subMonthNoOverflow());
        $component->assertSet('endsAt', today()->endOfMonth()->startOfDay()->subMonthNoOverflow());
    }

    /** @test */
    public function can_navigate_to_current_month()
    {
        // Act
        $component = $this->createComponent();
        $component->call('goToPreviousMonth');
        $component->call('goToPreviousMonth');
        $component->call('goToPreviousMonth');
        $component->call('goToCurrentMonth');

        // Assert
        $component->assertSet('startsAt', today()->startOfMonth());
        $component->assertSet('endsAt', today()->endOfMonth()->startOfDay());
    }
}
