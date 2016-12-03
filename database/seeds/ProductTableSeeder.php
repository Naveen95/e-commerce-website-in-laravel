<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\product;
        $product->imagePath = 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg';
        $product->title = 'Harry potter daaww';
        $product->description = 'Never read them before';
        $product->price =  '10';
        $product->save();


        $product = new \App\product;
        $product->imagePath = 'http://newsgrist.typepad.com/underbelly/images/2008/01/24/alchemist.jpg';
        $product->title = 'The alchemist';
        $product->description = 'A book by Paulo Coelo';
        $product->price =  '15';
        $product->save();

        $product = new \App\product;
        $product->imagePath = 'http://www.cheatsheet.com/wp-content/uploads/2014/10/11870085.jpg';
        $product->title = 'The fault in our Stars';
        $product->description = 'A book by JOhn Green';
        $product->price =  '20';
        $product->save();


        $product = new \App\product;
        $product->imagePath = 'http://prodimage.images-bn.com/pimages/9781338099133_p0_v5_s1200x630.jpg';
        $product->title = 'Harry potter and the CUrsed Child';
        $product->description = 'Book by J.K Rowling';
        $product->price =  '10';
        $product->save();

        $product = new \App\product;
        $product->imagePath = 'http://resources1.news.com.au/images/2009/09/16/1225774/722781-best-selling-novels-of-all-time.jpg';
        $product->title = 'Anne of Greene Gables';
        $product->description = 'Anonynous authors book';
        $product->price =  '10';
        $product->save();


        $product = new \App\product;
        $product->imagePath = 'http://prodimage.images-bn.com/pimages/9780143034759_p0_v6_s1200x630.jpg';
        $product->title = 'Alexander Hamilton';
        $product->description = 'I dont know about the author. OOPPPS';
        $product->price =  '10';
        $product->save();



    }
}
