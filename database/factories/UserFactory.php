<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'admin',
            'password' => '$2a$10$VJ19U93eqQcSH1WF/NSxDur5dNpHZWSTT.5acHRF51609sZKJZmPG', //admin
            'user_number' => 777,
            'phone_number' => 62877,
            'address' => 'home',
            'role' => 'Pustakawan',
        ];
    }
    
    public function configure()
    {
        return $this->state(function (array $attributes) {
            return [
                'username' => 'admin',
                'password' => '$2a$10$VJ19U93eqQcSH1WF/NSxDur5dNpHZWSTT.5acHRF51609sZKJZmPG', //admin
                'user_number' => 777,
                'phone_number' => 62877,
                'address' => 'home',
                'role' => 'Pustakawan',
            ];
        })->state(function ( array $attributes) {
            return [
                'username' => 'Zidane',
                'password' => '$2a$10$HIJYZAaUT8VGks3MDmuaYONKsQgbTr.nybta3I6fFzw5PfGNo6VG.', //member
                'user_number' => 111,
                'phone_number' => 628777,
                'address' => 'home',
                'role' => 'Member',
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
