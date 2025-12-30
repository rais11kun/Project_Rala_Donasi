<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Data ini disamakan dengan yang ada di events.blade.php Anda
        $events = [
            [
                'id' => 1,
                'title' => 'Education Program',
                'cat' => 'FIELD WORK',
                'reg' => '12/20',
                'img' => 'event-1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Health Program',
                'cat' => 'HEALTH CARE',
                'reg' => '8/15',
                'img' => 'event-2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Awareness Program',
                'cat' => 'CAMPAIGN',
                'reg' => '5/10',
                'img' => 'event-3.jpg'
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(['id' => $event['id']], $event);
        }
    }
}
