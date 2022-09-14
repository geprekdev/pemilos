<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $file = 'candidates/' . Str::random() . '.jpg';

        Storage::copy('candidate-no-pic.jpg', $file);

        return [
            'name' => fake()->name(),
            'label' => collect(['MPK', 'OSIS'])->random(),
            'number' => fake()->numberBetween(1, 3),
            'image' => $file,
        ];
    }
}
