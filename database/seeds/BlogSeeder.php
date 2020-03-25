<?php

use App\Blog;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog::class)->create([
            'titulo' => 'Este es el primer post',
            'descripcion' => 'descripcion',
            'contenido' => 'contenido',
            'habilitado' => '1',
        ]);

        factory(Blog::class, 2)->create();
    }
}
