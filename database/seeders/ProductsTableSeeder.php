<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use \App\Models\Product;
use \App\Models\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
                  ->count(3)
                  ->state(new Sequence(
                      ['price' => 1600.21],
                      ['price' => 378.00],
                    ))
                  ->has(Image::factory()
                                ->count(4)
                                ->state(new Sequence(
                                  ["path" => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png'],
                                  ["path" => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-better-than-naked-jacket-AVKL_NN4_hero.png'],
                                  ["path" => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-single-track-shoe-ALQF_JM3_hero.png'],
                                  )))
                  ->hasColors(3, new Sequence(
                      ["hash" => "#374151"],
                      ["hash" => "#fff"],
                      ["hash" => "#6b7280"],
                  ))
                  ->hasFeatures(4, new Sequence(
                      ["name" => "Multiple strap configurations"],
                      ["name" => "Spacious interior with top zip"],
                      ["name" => "Interior dividers"],
                  ))
                  ->create();
    }
}
