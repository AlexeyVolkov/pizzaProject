<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create([
            'name' => 'Steak & Blue Cheese',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/11970.png',
            'description' => 'Topped with garlic spread base, steak strips, fresh mushrooms, mozzarella cheese and sprinkled with crumbles of blue cheese',
            'basic_price' => 12.29
        ]);

        Pizza::create([
            'name' => 'Buffalo Chicken',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/buffalo-chicken-pizza.png',
            'description' => 'All the Zing, without the wing - This tangy, spicy pie is made for Game Day. Kick off with Buffalo blue cheese sauce, grilled chicken, red onions, fire-roasted red peppers and mozzarella cheese.',
            'basic_price' => 9.29
        ]);

        Pizza::create([
            'name' => 'Chipotle Chicken',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/Chipotle-Chicken.png',
            'description' => 'Smoky, zesty and bold - This Southwest-style flavor-bomb is set off with smoky chipotle sauce, then topped with chipotle chicken, zesty red onions, and melty mozzarella. Me gusta?',
            'basic_price' => 11.99
        ]);

        Pizza::create([
            'name' => 'Chicken Bruschetta ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/chickenbruschetta.png',
            'description' => 'A Twist on Italian Taste - What can make bruschetta better? How about grilled chicken? Add roasted garlic, Italiano Blend Seasoning, parmesan and mozzarella, and it\'s molto deliziosa.',
            'basic_price' => 13.29
        ]);

        Pizza::create([
            'name' => 'Chipotle Steak ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/Chipotle-Steak.png',
            'description' => 'Smoky chipotle meets sizzling steak - his hearty Southwest-inspired pie combines smoky chipotle sauce, tender steak, zesty red onions, and melty mozzarella.VIVA CHIPOTLE!',
            'basic_price' => 11.69
        ]);

        Pizza::create([
            'name' => 'Bacon Double Cheeseburger ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/bacondblchburg.png',
            'description' => 'Cheeseburger. Pizza. Enough Said - Yeah, we did it. Crush two comfort-food classics in one, with ground beef, bacon crumble and four-cheese blend. Try it with Honey Mustard dipping sauce for extra burger bite!',
            'basic_price' => 14.79
        ]);

        Pizza::create([
            'name' => 'Classic Super ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/12400.png',
            'description' => 'The Pizza Pizza original - A staple since 1967, this one never goes out of style! A classic combo of pepperoni, fresh mushrooms, green peppers, and mozzarella cheese.',
            'basic_price' => 10.69
        ]);

        Pizza::create([
            'name' => 'Sausage Mushroom Melt',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/SausageMelt.png',
            'description' => 'Creamy, dreamy and melty - Meet your dream pizza: rich, tasteful and?savoury. Made with creamy garlic sauce, spicy Italian sausage, fresh mushrooms, Italiano blend seasoning, and ooey-gooey mozzarella cheese. ',
            'basic_price' => 12.19
        ]);

        Pizza::create([
            'name' => 'Spicy BBQ Chicken ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/bbqchicken.png',
            'description' => 'Saddle up for a slice - It\'s a showdown at Flavour Corral, with grilled chicken, hot banana peppers, red onions, Texas BBQ sauce and mozzarella cheese. Wanna amp it up even more? Add Frank\'s Red Hot!',
            'basic_price' => 10.69
        ]);

        Pizza::create([
            'name' => 'Tropical Hawaiian ',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/12700.png',
            'description' => 'Grab your floral shirt and dip in - Don\'t let anyone tell you it isn\'t amazing. This taste of the tropics brings together sweet pineapple, bacon crumble, bacon strips, and mozzarella cheese for a beach vacation on Flavour Island! ',
            'basic_price' => 13.29
        ]);

        Pizza::create([
            'name' => 'Sweet Heat',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/13830.png',
            'description' => 'A fiery bite with a sweet twist - Sometimes opposites attract and make sweet, spicy magic! Trust us, the combo of grilled chicken, pineapple, hot banana peppers and mozzarella cheese is totally amazing.',
            'basic_price' => 13.29
        ]);

        Pizza::create([
            'name' => 'Pepperoni',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/Pepperoni.png',
            'description' => 'The all-time favourite - It doesn\'t get any more iconic than this. Savoury pepperoni, homestyle sauce, and ooey-gooey, stretchy mozzarella. Perfection!',
            'basic_price' => 9.19
        ]);

        Pizza::create([
            'name' => 'Hot and Spicy',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/SHIS.png',
            'description' => 'Is it getting warm in here? - Some people just love to brave the heat. Well, step-up you spice-monsters. This slice of fire combines spicy Italian sausage, hot banana peppers, and mozzarella cheese.',
            'basic_price' => 10.69
        ]);

        Pizza::create([
            'name' => 'Meat Supreme',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/meat-supreme.png',
            'description' => 'Topped with classic pepperoni, bacon crumble, salami, spicy Italian sausage, mozzarella cheese, and Italiano blend seasoning. For the meat-lover in you.',
            'basic_price' => 13.79
        ]);
        
    }
}
