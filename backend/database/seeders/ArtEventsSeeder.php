<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            ['id' => 1, 'name' => 'Celestial Art Expo', 'date' => '2024-01-10', 'description' => 'A cosmic fusion of modern art and astronomy, exploring the stars through artistic expressions.'],
            ['id' => 2, 'name' => 'Urban Vibes: Graffiti Festival', 'date' => '2024-02-15', 'description' => 'A celebration of street art with live graffiti painting, music, and interactive installations.'],
            ['id' => 3, 'name' => 'Mystical Forest Exhibition', 'date' => '2024-03-05', 'description' => 'Immerse yourself in an enchanted forest where nature and digital art blend seamlessly.'],
            ['id' => 4, 'name' => 'The Future of Fashion', 'date' => '2024-04-01', 'description' => 'A fashion event showcasing innovative designs incorporating technology and sustainable fabrics.'],
            ['id' => 5, 'name' => 'Renaissance Reborn', 'date' => '2024-05-20', 'description' => 'A reimagined take on Renaissance art with a contemporary twist.'],
            ['id' => 6, 'name' => 'Virtual Reality Art Odyssey', 'date' => '2024-06-10', 'description' => 'Explore stunning VR art installations that push the boundaries of imagination.'],
            ['id' => 7, 'name' => 'Surrealist Dreamscape', 'date' => '2024-07-15', 'description' => 'Dive into a world of surreal art where nothing is as it seems, featuring top surreal artists.'],
            ['id' => 8, 'name' => 'Interactive Light Festival', 'date' => '2024-08-01', 'description' => 'An interactive art festival where you can become part of the glowing masterpiece.'],
            ['id' => 9, 'name' => 'Whimsical World: Sculpture Park', 'date' => '2024-09-18', 'description' => 'A magical sculpture park that combines fantasy with reality, with sculptures of mythical creatures.'],
            ['id' => 10, 'name' => 'The Digital Canvas', 'date' => '2024-10-10', 'description' => 'A digital art show that explores the intersection of pixels and paint in a futuristic gallery.'],
            ['id' => 11, 'name' => 'Colors of the Wind: Art of Movement', 'date' => '2024-11-02', 'description' => 'Experience dynamic art where wind, motion, and color create mesmerizing visual experiences.'],
            ['id' => 12, 'name' => 'Soundscapes: The Art of Noise', 'date' => '2024-12-12', 'description' => 'An experimental exhibition where sound is the art form—an immersive auditory journey.'],
            ['id' => 13, 'name' => 'Recycled Art Revolution', 'date' => '2025-01-25', 'description' => 'Art made entirely from upcycled materials, celebrating creativity and sustainability.'],
            ['id' => 14, 'name' => 'Time Travelers\' Art Gallery', 'date' => '2025-02-05', 'description' => 'A gallery where past, present, and future artistic styles coexist in a visually stunning timeline.'],
            ['id' => 15, 'name' => 'The Digital Fabric', 'date' => '2025-03-15', 'description' => 'A cutting-edge fashion show blending digital art with wearable tech.'],
            ['id' => 16, 'name' => 'Ancient Echoes: Art and History', 'date' => '2025-04-10', 'description' => 'An exhibition focusing on the interplay between ancient art and modern interpretations.'],
            ['id' => 17, 'name' => 'Art Under the Moonlight', 'date' => '2025-05-18', 'description' => 'A nocturnal art show where light, shadows, and night-time creativity come alive under the stars.'],
            ['id' => 18, 'name' => 'Whispers of the Sea', 'date' => '2025-06-25', 'description' => 'An art exhibit celebrating the beauty and mystery of the ocean through sculptures, paintings, and sound.'],
            ['id' => 19, 'name' => 'Futuristic Architecture Art Show', 'date' => '2025-07-20', 'description' => 'A showcase of groundbreaking architectural designs that will shape the cities of tomorrow.'],
            ['id' => 20, 'name' => 'Mindscapes: Art and the Brain', 'date' => '2025-08-12', 'description' => 'An exploration of how art influences and reflects the mind, featuring interactive exhibits.'],
        ];

        DB::table('art_events')->insert($events);
    }
}
