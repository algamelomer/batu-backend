<?php

namespace Database\Factories;

use App\Models\EventStaffProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventStaffProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $eventIds = \App\Models\Event::pluck('id')->toArray();
        $staffProgramIds = \App\Models\StaffPrograms::pluck('id')->toArray();
        return [
            'event_id' => $this->faker->randomElement($eventIds),
            'staff_program_id' => $this->faker->randomElement($staffProgramIds),
        ];
    }
}
