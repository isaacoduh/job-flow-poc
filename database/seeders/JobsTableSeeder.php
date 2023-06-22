<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => 'Software Developer',
            'description' => 'We are looking for a skilled software developer to join our team.',
        ]);

        Job::create([
            'title' => 'Graphic Designer',
            'description' => 'We are seeking a talented graphic designer with a creative mindset.',
        ]);

        Job::create([
            'title' => 'Marketing Manager',
            'description' => 'We are hiring a marketing manager to lead our marketing efforts.',
        ]);

        Job::create([
            'title' => 'Customer Support Representative',
            'description' => 'We are seeking a customer support representative to assist our clients.',
        ]);

        Job::create([
            'title' => 'Project Manager',
            'description' => 'We are looking for an experienced project manager to oversee our projects.',
        ]);
    }
}
