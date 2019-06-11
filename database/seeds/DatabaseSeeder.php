<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call([
//             UsersTableSeeder::class
//         ]);
        DB::table('users')->insert([
            'name' => 'Azat',
            'email' => 'azat91knu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('images')->insert([
            array('caption' => 'cat-kids.png', 'name' => 'Wc0NO3ZJOwIaIVpzxG3pVlUmu1VtFcSCtb8y7nhX', 'ext' => 'png', 'path' => '/images/30', 'height' => '628', 'width' => '514', 'size' => '61120', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'category', 'imageable_id' => '3', 'order' => '0'),
            array('caption' => 'cat-woman.png', 'name' => 'bW8zv3yy3nZnRx49aqWzPEz2tlAiJr2rUMcJDAdM', 'ext' => 'png', 'path' => '/images/83', 'height' => '642', 'width' => '480', 'size' => '40512', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'category', 'imageable_id' => '2', 'order' => '0'),
            array('caption' => 'cat-man.png', 'name' => 'VO65UTai6s4QVAPbUvM8jVYvCYXPBPEvQU2Mskt4', 'ext' => 'png', 'path' => '/images/2', 'height' => '638', 'width' => '486', 'size' => '40411', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'category', 'imageable_id' => '1', 'order' => '0'),
            array('caption' => 'cat-plus-size.png', 'name' => 'k2BTulldPRAHuLSIa3Lq9byMt6pdmD1Mu49FX1HS', 'ext' => 'png', 'path' => '/images/53', 'height' => '639', 'width' => '468', 'size' => '38056', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'category', 'imageable_id' => '6', 'order' => '0'),
            array('caption' => 'product-1.jpg', 'name' => 'kbez2d2pEL2ZafWjain4hIt474tPiCFj45G92wE1', 'ext' => 'jpeg', 'path' => '/images/10', 'height' => '568', 'width' => '425', 'size' => '53778', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'product', 'imageable_id' => '1', 'order' => '0'),
            array('caption' => 'product-2.jpg', 'name' => 'ZIUwgZRDhkOT0hgvRtwj1pQjib8B3jz8VC3Rsi0n', 'ext' => 'jpeg', 'path' => '/images/51', 'height' => '570', 'width' => '426', 'size' => '38302', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'product', 'imageable_id' => '2', 'order' => '0'),
            array('caption' => 'product-4.jpg', 'name' => '0m18u95LocsYRuaWO2Yr8jEluTVAjfW68ZHI8syn', 'ext' => 'jpeg', 'path' => '/images/9', 'height' => '568', 'width' => '425', 'size' => '35887', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'product', 'imageable_id' => '3', 'order' => '0'),
            array('caption' => 'product-3.jpg', 'name' => 'DijErOrlExtIynAem1f2KDOYDYOXJaFyfVhcJus1', 'ext' => 'jpeg', 'path' => '/images/68', 'height' => '570', 'width' => '426', 'size' => '38852', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'product', 'imageable_id' => '4', 'order' => '0'),
            array('caption' => '222838966_6674_8270178514558053533.jpg', 'name' => '8KukcigYxg1WZADNNOjpUPjA7acmzsSBinTu8mgu', 'ext' => 'jpeg', 'path' => '/images/7', 'height' => '640', 'width' => '640', 'size' => '110631', 'status' => '1', 'uid' => '1', 'desc' => NULL, 'imageable_type' => 'post', 'imageable_id' => '5', 'order' => '0')
        ]);
        DB::table('posts')->insert([
                [
                    'title' => 'Lorem ipsum dolor',
                    'date' => '2019-07-03',
                    'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequatur excepturi hic perferendis quisquam
    tempora veniam voluptas voluptatibus. Esse minima obcaecati temporibus? Asperiores aut quasi quisquam reiciendis
    repellendus sapiente sunt?</p><p>Accusantium culpa cum debitis dicta distinctio dolorem eaque eum explicabo fugit
    illo in ipsa laborum modi natus nostrum numquam officia perspiciatis quaerat quas ratione reiciendis rerum, sapiente
    temporibus. Asperiores, porro?</p><p>Ad aspernatur culpa cupiditate debitis impedit quia repudiandae rerum sint?
    Accusamus alias autem deleniti dolore earum eligendi impedit mollitia nisi nobis odio perferendis provident quas
    qui, sed sint vel, velit.</p><p>A ab architecto autem dicta dolor, eius enim excepturi fugiat ipsam iste, nostrum
    nulla odit officiis quae quaerat qui quisquam quo recusandae reiciendis repudiandae, saepe tempora vel. A, nihil
    veritatis.</p><p>Atque dicta distinctio dolorem eligendi expedita, hic, inventore magni maxime minima neque placeat
    quos repellendus veritatis. Eveniet illum officiis quis. At eos esse laboriosam mollitia nemo placeat reprehenderit
    ullam voluptatibus.</p><p>Ab, ad consectetur cupiditate dignissimos explicabo iste odio ullam ut veniam vitae? A
    aliquid aut beatae culpa hic illo modi omnis quo quos, totam. Cumque harum ipsa nobis obcaecati reprehenderit?</p>
<p>Doloribus excepturi hic iusto nisi quas, repudiandae veritatis. A at culpa cupiditate distinctio est exercitationem
    harum incidunt maiores officia officiis quaerat, ratione repudiandae sunt. Asperiores fugiat neque quisquam quos
    temporibus?</p><p>Accusamus aliquid, dignissimos impedit magni natus nesciunt obcaecati perspiciatis quas qui quia,
    reprehenderit saepe sed voluptas? Aliquam, at aut eligendi esse facere, id maxime nisi optio quae quisquam
    reprehenderit vitae!</p><p>A aliquid aperiam beatae dolorem doloremque dolorum eaque et eum eveniet iure laudantium
    nesciunt porro quos reprehenderit repudiandae similique tempora tenetur, veniam. Eligendi exercitationem hic ut
    voluptas voluptatibus? Quo, rerum!</p><p>Amet culpa debitis delectus deserunt est facere fugiat fugit ipsum itaque
    labore molestiae necessitatibus numquam, odio perspiciatis quam similique, tenetur. Ad alias ea illo in iste
    quisquam rem ut vitae?</p>',
                    'status' => 1,
                    'desc' => 'ffv',
                    'keywords' => 'tesfv',
                    'uid' => 1
                ],
                [
                    'title' => 'Lorem ipsum dolor',
                    'date' => '2019-07-03',
                    'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequatur excepturi hic perferendis quisquam
    tempora veniam voluptas voluptatibus. Esse minima obcaecati temporibus? Asperiores aut quasi quisquam reiciendis
    repellendus sapiente sunt?</p><p>Accusantium culpa cum debitis dicta distinctio dolorem eaque eum explicabo fugit
    illo in ipsa laborum modi natus nostrum numquam officia perspiciatis quaerat quas ratione reiciendis rerum, sapiente
    temporibus. Asperiores, porro?</p><p>Ad aspernatur culpa cupiditate debitis impedit quia repudiandae rerum sint?
    Accusamus alias autem deleniti dolore earum eligendi impedit mollitia nisi nobis odio perferendis provident quas
    qui, sed sint vel, velit.</p><p>A ab architecto autem dicta dolor, eius enim excepturi fugiat ipsam iste, nostrum
    nulla odit officiis quae quaerat qui quisquam quo recusandae reiciendis repudiandae, saepe tempora vel. A, nihil
    veritatis.</p><p>Atque dicta distinctio dolorem eligendi expedita, hic, inventore magni maxime minima neque placeat
    quos repellendus veritatis. Eveniet illum officiis quis. At eos esse laboriosam mollitia nemo placeat reprehenderit
    ullam voluptatibus.</p><p>Ab, ad consectetur cupiditate dignissimos explicabo iste odio ullam ut veniam vitae? A
    aliquid aut beatae culpa hic illo modi omnis quo quos, totam. Cumque harum ipsa nobis obcaecati reprehenderit?</p>
<p>Doloribus excepturi hic iusto nisi quas, repudiandae veritatis. A at culpa cupiditate distinctio est exercitationem
    harum incidunt maiores officia officiis quaerat, ratione repudiandae sunt. Asperiores fugiat neque quisquam quos
    temporibus?</p><p>Accusamus aliquid, dignissimos impedit magni natus nesciunt obcaecati perspiciatis quas qui quia,
    reprehenderit saepe sed voluptas? Aliquam, at aut eligendi esse facere, id maxime nisi optio quae quisquam
    reprehenderit vitae!</p><p>A aliquid aperiam beatae dolorem doloremque dolorum eaque et eum eveniet iure laudantium
    nesciunt porro quos reprehenderit repudiandae similique tempora tenetur, veniam. Eligendi exercitationem hic ut
    voluptas voluptatibus? Quo, rerum!</p><p>Amet culpa debitis delectus deserunt est facere fugiat fugit ipsum itaque
    labore molestiae necessitatibus numquam, odio perspiciatis quam similique, tenetur. Ad alias ea illo in iste
    quisquam rem ut vitae?</p>',
                    'status' => 1,
                    'desc' => 'ffv',
                    'keywords' => 'tesfv',
                    'uid' => 1
                ]
            ]
        );
        DB::table('orders')->insert([
                [
                    'uid' => 1,
                    'phone' => '+996709866698',
                    'email' => 'azat-91knu@mail.ru',
                    'address' => 'region Naryn district At-Bashy street Ysmat № 1',
                ],
                [
                    'uid' => 1,
                    'phone' => '+996709866698',
                    'email' => 'azat-91knu@mail.ru',
                    'address' => 'region Naryn district At-Bashy street Ysmat № 1',
                ],
                [
                    'uid' => 1,
                    'phone' => '+996709866698',
                    'email' => 'azat-91knu@mail.ru',
                    'address' => 'region Naryn district At-Bashy street Ysmat № 1',
                ]
            ]
        );
        DB::table('products')->insert([
                [
                    'name' => 'Продукт 1',
                    'cat' => 1,
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'sex' => 1,
                    'price' => 10000,
                ],
                [
                    'name' => 'Продукт 2',
                    'cat' => 2,
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'sex' => 1,
                    'price' => 10000,
                ],
                [
                    'name' => 'Продукт 3',
                    'cat' => 3,
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'sex' => 1,
                    'price' => 10000,
                ],
                [
                    'name' => 'Продукт 4',
                    'cat' => 4,
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'sex' => 1,
                    'price' => 10000,
                ]
            ]
        );
        DB::table('categories')->insert([
                [
                    'name' => 'Мужское',
                    'pid' => 0,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ],
                [
                    'name' => 'Женское',
                    'pid' => 0,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ],
                [
                    'name' => 'Десткое',
                    'pid' => 0,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ],
                [
                    'name' => 'Обувь',
                    'pid' => 1,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ],
                [
                    'name' => 'Украшение',
                    'pid' => 2,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ],
                [
                    'name' => 'Plus size',
                    'pid' => 0,
                    'status' => 1,
                    'inc_menu' => 1,
                    'uid' => 1,
                    'desc' => 'test'
                ]
            ]
        );
    }
}
