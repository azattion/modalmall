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
            array('id' => '1','name' => 'Azation','email' => 'azat91knu@gmail.com','email_verified_at' => NULL,'status' => '1','password' => '$2y$10$enFJ2m865rT4e0wRcLSat.Fb3q7apTS9HYEHy5uZL98dfAVRzvBh2','phone' => NULL,'address' => NULL,'role' => '1','bio' => NULL,'avatar' => NULL,'remember_token' => 'Eeya0cxUNeKAz9VpEOWGSCFusJzaCK2ferFnOpqH5DiRqCqHJJw7LSxQhx2i','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Ирина','email' => 'ni4eshka24@gmail.com','email_verified_at' => NULL,'status' => '1','password' => '$2y$10$.Jy0ZsP6/HRHMRQsjKhj6OLKlqm/DHjwDAFgo644/aU994KDOPTfi','phone' => NULL,'address' => NULL,'role' => '1','bio' => NULL,'avatar' => NULL,'remember_token' => NULL,'created_at' => '2019-06-29 23:59:34','updated_at' => '2019-06-29 23:59:34')
        ]);
        DB::table('images')->insert([
            array('id' => '23','caption' => 'cabinet.png','name' => 'LuPg4a9AkZ3ovDVWGIXwDpGghAGqY2T4JLVJmP93','ext' => 'png','path' => '/images/45','height' => '138','width' => '138','size' => '9935','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '1','order' => '0','created_at' => '2019-06-28 21:58:10','updated_at' => '2019-06-28 21:58:10'),
            array('id' => '24','caption' => 'cart.png','name' => 'F7WTYZw3shpqfv1uzIVbSbszXjvUoHispHWfvf0O','ext' => 'png','path' => '/images/21','height' => '138','width' => '138','size' => '10144','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '2','order' => '0','created_at' => '2019-06-28 21:59:01','updated_at' => '2019-06-28 21:59:01'),
            array('id' => '25','caption' => 'delivery.png','name' => 'I6ufGnwqzIT1Y5oBt0fk4L3EQYgzOrJR8l2S4kkS','ext' => 'png','path' => '/images/53','height' => '138','width' => '138','size' => '11059','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '3','order' => '0','created_at' => '2019-06-28 21:59:42','updated_at' => '2019-06-28 21:59:42'),
            array('id' => '26','caption' => 'brands.png','name' => 'MFQJrcLtGxeMCYR4x14MM4HpqsQiZQ443nrfSJ5F','ext' => 'png','path' => '/images/96','height' => '184','width' => '184','size' => '16142','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '4','order' => '0','created_at' => '2019-06-28 22:01:23','updated_at' => '2019-06-28 22:01:23'),
            array('id' => '27','caption' => 'promotion.png','name' => 'd1zds4FdjgHj9GhttsMLNSvL15zavubDxXgAxP2S','ext' => 'png','path' => '/images/49','height' => '138','width' => '138','size' => '11619','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '5','order' => '0','created_at' => '2019-06-28 22:05:19','updated_at' => '2019-06-28 22:05:19'),
            array('id' => '28','caption' => 'gift.png','name' => 'JTPQuuVZZDFGyZHsWCwvmPBbJCKxl7DEfKoihW8b','ext' => 'png','path' => '/images/39','height' => '138','width' => '138','size' => '10362','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '6','order' => '0','created_at' => '2019-06-28 22:06:10','updated_at' => '2019-06-28 22:06:10'),
            array('id' => '30','caption' => 'service.png','name' => 'WOnlNyLMRdHhii9fKlUFltFskRG8QFYN9a2OlNDM','ext' => 'png','path' => '/images/47','height' => '184','width' => '184','size' => '14681','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '14','order' => '0','created_at' => '2019-06-28 22:16:59','updated_at' => '2019-06-28 22:16:59'),
            array('id' => '31','caption' => 'partners.png','name' => 'ygJTm5HAKaK9ACCw24h7RmJpuh7gUHzIjeYlc5p8','ext' => 'png','path' => '/images/8','height' => '184','width' => '185','size' => '15653','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '15','order' => '0','created_at' => '2019-06-28 22:17:46','updated_at' => '2019-06-28 22:17:46'),
            array('id' => '32','caption' => 'reviews.png','name' => 'NqOahsSO5FlUYOLJPe0sxqws4tzoJXDl4PIj4Qdx','ext' => 'png','path' => '/images/97','height' => '184','width' => '184','size' => '15531','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '16','order' => '0','created_at' => '2019-06-28 22:18:14','updated_at' => '2019-06-28 22:18:14'),
            array('id' => '33','caption' => 'slider.png','name' => 'bWDlQ3FreUEhiQ1mzUB0MqvSVsYYEOLs7Wp4u1lf','ext' => 'png','path' => '/images/64','height' => '822','width' => '2465','size' => '2377101','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Post','imageable_id' => '2','order' => '0','created_at' => '2019-06-28 22:22:55','updated_at' => '2019-06-28 22:22:55'),
            array('id' => '34','caption' => 'cat-man.png','name' => '2U9hrRxm7DvsIbrcU6v3fK9n2U0mKhQdjM0haLVm','ext' => 'png','path' => '/images/50','height' => '638','width' => '486','size' => '40411','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Category','imageable_id' => '1','order' => '0','created_at' => '2019-06-28 22:23:32','updated_at' => '2019-06-28 22:23:32'),
            array('id' => '35','caption' => 'cat-woman.png','name' => 'auFvdI83t2koU7t66VF5EvVKP4iR7xwlxPsqX7iC','ext' => 'png','path' => '/images/91','height' => '642','width' => '480','size' => '40512','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Category','imageable_id' => '2','order' => '0','created_at' => '2019-06-28 22:23:49','updated_at' => '2019-06-28 22:23:49'),
            array('id' => '36','caption' => 'cat-kids.png','name' => '8nFZdpX5hZzBIZDXocoAO7cgAVPRPlz2A0Kmvo27','ext' => 'png','path' => '/images/62','height' => '628','width' => '514','size' => '61120','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Category','imageable_id' => '3','order' => '0','created_at' => '2019-06-28 22:24:02','updated_at' => '2019-06-28 22:24:02'),
            array('id' => '37','caption' => 'cat-plus-size.png','name' => 'V50aZr0oYTKI27dk5emcPwGxRu8fhUkCoAIMckxy','ext' => 'png','path' => '/images/34','height' => '639','width' => '468','size' => '38056','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Category','imageable_id' => '6','order' => '0','created_at' => '2019-06-28 22:24:17','updated_at' => '2019-06-28 22:24:17'),
            array('id' => '39','caption' => 'cat-family.png','name' => 'z9UrgEtl0dlmib9MRYq0CuNKhsDsaytieow4puiv','ext' => 'png','path' => '/images/40','height' => '645','width' => '565','size' => '418040','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Category','imageable_id' => '7','order' => '0','created_at' => '2019-06-28 22:41:17','updated_at' => '2019-06-28 22:41:17'),
            array('id' => '40','caption' => 'cat-family.png','name' => 'A8WPiKqtHVDVfMjOtVmKiH6WZ9Y9blwCA11hc8pY','ext' => 'jpeg','path' => '/images/94','height' => '645','width' => '565','size' => '418040','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Product','imageable_id' => '4','order' => '0','created_at' => '2019-06-28 22:41:17','updated_at' => '2019-06-28 22:41:17'),
            array('id' => '41','caption' => 'product-1.jpg','name' => 'h8w7FHLWhFU41qaDW1qbMdzlpXqVVpwPisqwzrvK','ext' => 'jpeg','path' => '/images/81','height' => '568','width' => '425','size' => '53778','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Product','imageable_id' => '4','order' => '0','created_at' => '2019-06-29 21:12:52','updated_at' => '2019-06-29 21:12:52'),
            array('id' => '42','caption' => 'product-3.jpg','name' => 'KuBErTxsHPVEPm2aI8iMIR3976SqTeqVQBe4vdZl','ext' => 'jpeg','path' => '/images/64','height' => '570','width' => '426','size' => '38852','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Product','imageable_id' => '4','order' => '0','created_at' => '2019-06-29 21:12:52','updated_at' => '2019-06-29 21:12:52'),
            array('id' => '43','caption' => 'product-4.jpg','name' => '5fuKldSZS8Re3sRFe5PYSWDHE2rmKfrRa98SPm7W','ext' => 'jpeg','path' => '/images/26','height' => '568','width' => '425','size' => '35887','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Product','imageable_id' => '4','order' => '0','created_at' => '2019-06-29 21:12:52','updated_at' => '2019-06-29 21:12:52'),
            array('id' => '44','caption' => 'about.png','name' => 'QEGKwTavrn9isFFbvihvHh0fHBDvX95NlXow0sv0','ext' => 'png','path' => '/images/43','height' => '186','width' => '187','size' => '16522','status' => '1','uid' => '1','desc' => NULL,'imageable_type' => 'App\\Menu','imageable_id' => '18','order' => '0','created_at' => '2019-06-30 01:05:11','updated_at' => '2019-06-30 01:05:11')
        ]);
        DB::table('menu')->insert([
            array('id' => '1', 'title' => 'Личный кабинет', 'ordr' => '1', 'link' => '/cabinet', 'status' => '0', 'type' => '1', 'uid' => '1', 'created_at' => '2019-06-28 21:45:21', 'updated_at' => '2019-06-28 21:45:21'),
            array('id' => '2', 'title' => 'Корзина', 'ordr' => '1', 'link' => '/cart', 'status' => '0', 'type' => '1', 'uid' => '1', 'created_at' => '2019-06-28 21:59:01', 'updated_at' => '2019-06-28 21:59:01'),
            array('id' => '3', 'title' => 'Доставка', 'ordr' => '1', 'link' => '/page/delivery', 'status' => '1', 'type' => '1', 'uid' => '1', 'created_at' => '2019-06-28 21:59:42', 'updated_at' => '2019-06-28 21:59:42'),
            array('id' => '4', 'title' => 'Бренды', 'ordr' => '1', 'link' => '/brands', 'status' => '1', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:01:23', 'updated_at' => '2019-06-28 22:01:23'),
            array('id' => '5', 'title' => 'Акция', 'ordr' => '1', 'link' => '/catalog/0?promotion', 'status' => '1', 'type' => '1', 'uid' => '1', 'created_at' => '2019-06-28 22:05:19', 'updated_at' => '2019-06-28 22:05:19'),
            array('id' => '6', 'title' => 'Подарок', 'ordr' => '1', 'link' => '/page/gift', 'status' => '1', 'type' => '1', 'uid' => '1', 'created_at' => '2019-06-28 22:06:10', 'updated_at' => '2019-06-28 22:06:10'),
            array('id' => '7', 'title' => 'О нас', 'ordr' => '1', 'link' => '/page/about', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:07:18', 'updated_at' => '2019-06-28 22:07:18'),
            array('id' => '8', 'title' => 'Детское', 'ordr' => '1', 'link' => '/catalog/1', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:13:32', 'updated_at' => '2019-06-28 22:13:32'),
            array('id' => '9', 'title' => 'Женское', 'ordr' => '1', 'link' => '/catalog/2', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:14:14', 'updated_at' => '2019-06-28 22:14:48'),
            array('id' => '10', 'title' => 'Мужское', 'ordr' => '1', 'link' => '/catalog/3', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:14:43', 'updated_at' => '2019-06-28 22:14:43'),
            array('id' => '11', 'title' => 'Plus size', 'ordr' => '1', 'link' => '/catalog/4', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:15:08', 'updated_at' => '2019-06-28 22:15:08'),
            array('id' => '12', 'title' => 'Family look', 'ordr' => '1', 'link' => '/catalog/5', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:15:31', 'updated_at' => '2019-06-28 22:15:31'),
            array('id' => '13', 'title' => 'Новинки', 'ordr' => '1', 'link' => '/catalog/new', 'status' => '1', 'type' => '2', 'uid' => '1', 'created_at' => '2019-06-28 22:16:04', 'updated_at' => '2019-06-28 22:16:04'),
            array('id' => '14', 'title' => 'Сервис', 'ordr' => '1', 'link' => '/page/service', 'status' => '1', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:16:44', 'updated_at' => '2019-06-28 22:16:44'),
            array('id' => '15', 'title' => 'Партнерам', 'ordr' => '1', 'link' => '/page/partners', 'status' => '1', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:17:46', 'updated_at' => '2019-06-28 22:17:46'),
            array('id' => '16', 'title' => 'Отзывы', 'ordr' => '1', 'link' => '/reviews', 'status' => '0', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:18:14', 'updated_at' => '2019-06-28 22:18:14'),
            array('id' => '17', 'title' => 'Видео', 'ordr' => '1', 'link' => '/page/category/3', 'status' => '1', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:18:14', 'updated_at' => '2019-06-28 22:18:14'),
            array('id' => '18', 'title' => 'О нас', 'ordr' => '1', 'link' => '/page/about', 'status' => '1', 'type' => '3', 'uid' => '1', 'created_at' => '2019-06-28 22:18:14', 'updated_at' => '2019-06-28 22:18:14')
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
                    'uid' => 1,
                    'slug' => 'gift',
                    'type' => 1,
                    'id' => 7,
                ],
                [
                    'title' => 'Доставка',
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
                    'uid' => 1,
                    'slug' => 'delivery',
                    'type' => 1,
                    'id' => 6,
                ],
                [
                    'title' => 'О нас',
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
                    'uid' => 1,
                    'slug' => 'about',
                    'type' => 1,
                    'id' => 5,
                ],
                [
                    'title' => 'Сервис',
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
                    'uid' => 1,
                    'slug' => 'service',
                    'type' => 1,
                    'id' => 4,
                ],
                [
                    'title' => 'Партнерам',
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
                    'uid' => 1,
                    'slug' => 'partners',
                    'type' => 1,
                    'id' => 3,
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
                    'slug' => '',
                    'uid' => 1,
                    'type' => 2,
                    'id' => 2,
                ]
            ]
        );
        DB::table('orders')->insert([
            array('id' => '4', 'uid' => '1', 'phone' => '+996709866698', 'email' => 'azat91knu@gmail.com', 'address' => 'region Naryn district At-Bashy street Ysmat № 1', 'status' => '0', 'created_at' => '2019-06-29 12:12:00', 'updated_at' => '2019-06-29 12:12:00', 'deleted_at' => NULL)
        ]);
        DB::table('order_items')->insert([
            array('id' => '1', 'pid' => '2', 'oid' => '4', 'uid' => '1', 'qt' => '1', 'color' => '1', 'size' => '1', 'status' => '1', 'created_at' => '2019-06-29 12:12:00', 'updated_at' => '2019-06-29 12:12:00'),
            array('id' => '2', 'pid' => '3', 'oid' => '4', 'uid' => '1', 'qt' => '1', 'color' => '1', 'size' => '1', 'status' => '1', 'created_at' => '2019-06-29 12:12:00', 'updated_at' => '2019-06-29 12:12:00'),
            array('id' => '3', 'pid' => '4', 'oid' => '4', 'uid' => '1', 'qt' => '1', 'color' => '1', 'size' => '1', 'status' => '2', 'created_at' => '2019-06-29 12:12:00', 'updated_at' => '2019-06-29 12:12:00')
        ]);
        DB::table('products')->insert([
                [
                    'name' => 'Продукт 1',
                    'cats' => '|1|',
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'cost' => 100,
                    'sizes' => '|1|2|',
                    'colors' => '|1|3|',
                ],
                [
                    'name' => 'Продукт 2',
                    'cats' => '|2|',
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'cost' => 100,
                    'sizes' => '|1|2|',
                    'colors' => '|1|3|',
                ],
                [
                    'name' => 'Продукт 3',
                    'cats' => '|3|',
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'cost' => 10000,
                    'sizes' => '|1|2|',
                    'colors' => '|1|3|',
                ],
                [
                    'name' => 'Продукт 4',
                    'cats' => '|4|',
                    'vendor_code' => '10285 SV',
                    'barcode' => '8681033102514',
                    'collection' => 'SEVIM 2017',
                    'desc' => 'test',
                    'quantity' => 1,
                    'cost' => 10000,
                    'sizes' => '|1|2|',
                    'colors' => '|1|3|',
                ]
            ]
        );
        DB::table('categories')->insert([
                array('id' => '1', 'pid' => '0', 'level' => '1', 'ordr' => '1', 'name' => 'Мужское', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'pid' => '0', 'level' => '1', 'ordr' => '2', 'name' => 'Женское', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => '2019-06-28 22:23:49'),
                array('id' => '3', 'pid' => '0', 'level' => '1', 'ordr' => '3', 'name' => 'Десткое', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => '2019-06-28 22:24:02'),
                array('id' => '4', 'pid' => '1', 'level' => '2', 'ordr' => '1', 'name' => 'Обувь', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '5', 'pid' => '2', 'level' => '2', 'ordr' => '1', 'name' => 'Украшение', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '6', 'pid' => '0', 'level' => '1', 'ordr' => '6', 'name' => 'Plus size', 'status' => '1', 'inc_menu' => '1', 'desc' => 'test', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => NULL, 'updated_at' => '2019-06-28 22:24:17'),
                array('id' => '7', 'pid' => '0', 'level' => '1', 'ordr' => '7', 'name' => 'Family LOOK', 'status' => '1', 'inc_menu' => '1', 'desc' => '<p>tet</p>', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => '2019-06-28 22:24:28', 'updated_at' => '2019-06-28 22:41:17')
            ]
        );

        DB::table('brands')->insert([
            array('id' => '4', 'pid' => '0', 'ordr' => '1', 'name' => 'Бренд 2', 'status' => '1', 'desc' => NULL, 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => '2019-06-28 03:45:44', 'updated_at' => '2019-06-28 03:48:09'),
            array('id' => '5', 'pid' => '0', 'ordr' => '1', 'name' => 'Бренд 1', 'status' => '1', 'desc' => '<p>еуые</p>', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => '2019-06-28 03:47:52', 'updated_at' => '2019-06-28 03:47:52'),
            array('id' => '6', 'pid' => '0', 'ordr' => '1', 'name' => 'Бренд 0', 'status' => '1', 'desc' => '<p>test</p>', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => '2019-06-28 03:49:03', 'updated_at' => '2019-06-28 03:49:28'),
            array('id' => '7', 'pid' => '0', 'ordr' => '1', 'name' => 'Бренд 4', 'status' => '1', 'desc' => NULL, 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_desc' => NULL, 'uid' => '1', 'created_at' => '2019-06-28 03:51:33', 'updated_at' => '2019-06-28 03:51:33')
        ]);
    }
}
