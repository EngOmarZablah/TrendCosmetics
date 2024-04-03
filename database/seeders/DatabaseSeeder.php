<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory()->create([
            'firstName' => 'Amr',
            'lastName' => 'khalid',
            'email' => 'amrkhalid@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        //________________________________________


        \App\Models\Region::factory()->create([
            'regionName' => 'الضفة الغربية',
            'deliveryPrice' => 20
        ]);
        \App\Models\Region::factory()->create([
            'regionName' => 'القدس',
            'deliveryPrice' => 30
        ]);
        \App\Models\Region::factory()->create([
            'regionName' => 'الداخل المحتل',
            'deliveryPrice' => 60
        ]);
        //________________________________________


        \App\Models\City::factory()->create([
            'cityName' => 'طولكرم',
            'region_id' => 1
        ]);
        \App\Models\City::factory()->create([
            'cityName' => 'نابلس',
            'region_id' => 1
        ]);
        \App\Models\City::factory()->create([
            'cityName' => 'حيفا',
            'region_id' => 3
        ]);
        \App\Models\City::factory()->create([
            'cityName' => 'القدس',
            'region_id' => 2
        ]);
        //________________________________________


        \App\Models\Township::factory()->create([
            'townshipName' => 'طولكرم المدينة ',
            'city_id' => 1
        ]);
        \App\Models\Township::factory()->create([
            'townshipName' => 'شويكة',
            'city_id' => 1
        ]);
        \App\Models\Township::factory()->create([
            'townshipName' => 'بلعا',
            'city_id' => 1
        ]);
        \App\Models\Township::factory()->create([
            'townshipName' => 'حوارة',
            'city_id' => 2
        ]);
        //________________________________________


        \App\Models\Customer::factory()->create([
            'firstName' => 'omar',
            'lastName' => 'zablah',
            'email' => 'omarzablah@gmail.com',
            'phone' => '0598399738',
            'password' => Hash::make('123456789'),
            'region_id' => 1,
            'city_id' => 1,
            'township_id' => 2,
            'street' => 'شارع العودة',
            'accountType' => 0,
            'status' => 1,
            'verifyCode' => random_int(100000, 999999),

        ]);
        \App\Models\Customer::factory()->create([
            'firstName' => 'amr1',
            'lastName' => 'Nasrallah',
            'email' => 'amrnasrallah@gmail.com',
            'phone' => '0598399737',
            'password' => Hash::make('123456789'),
            'region_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'street' => 'شارع باريس',
            'accountType' => 0,
            'status' => 1,
            'verifyCode' => random_int(100000, 999999),

        ]);
        \App\Models\Customer::factory()->create([
            'firstName' => 'alaa',
            'lastName' => 'ali',
            'email' => 'alaa@gmail.com',
            'phone' => '0598399736',
            'password' => Hash::make('123456789'),
            'region_id' => 1,
            'city_id' => 2,
            'township_id' => 4,
            'street' => 'الشارع الرئيسي',
            'accountType' => 0,
            'status' => 1,
            'verifyCode' => random_int(100000, 999999),

        ]);
        //________________________________________




        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'منتجاتنا',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'عطور',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'لوازم صالونات',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'مكياج',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'شامبو',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'العناية بالجسم',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'كريمات وبلسم شعر',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'مستلزمات البشرة',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'لوازم اطفال',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'مستلزمات نسائية وقطنيات',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'معجون الأسنان والحلاقة',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'سبري ومزيل عرق',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'شفرات',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'المنظفات',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'بكجات وأطقم',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'نثريات',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        \App\Models\Catagory::factory()->create([
            'catagoryName' => 'أجهزة كهربائية',
            'img' => 'https://www.w3schools.com/html/img_girl.jpg',
        ]);
        //________________________________________


        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'عطور أصلية',
            'catagory_id' => 2,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'عطور خليجية',
            'catagory_id' => 2,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'مسك',
            'catagory_id' => 2,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'عطور أخرى',
            'catagory_id' => 2,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'مكياج',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'فلورمار',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'كاترس',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'اسنس',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'نوت',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'ميبلين',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'اورجنال بيل',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'بليس فورتين',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'سفنتين',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'استيلاودر',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'ريميل',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'لوريال',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'كلاسيك',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'غارنيه',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'ماركات أخرى',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'فراشي مكياج',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'مناكير',
            'catagory_id' => 4,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'كريمات الجسم',
            'catagory_id' => 6,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'مقشر جسم',
            'catagory_id' => 6,
        ]);
        \App\Models\Subcatagory::factory()->create([
            'subCatagoryName' => 'مرطب جسم',
            'catagory_id' => 6,
        ]);
        //________________________________________


        \App\Models\Item::factory()->create([
            'itemName' => 'perfum',
            'description' => 'asdasdasd',
            'img' => 'https://www.w3schools.com/html/pic_trulli.jpg',
            'originalPrice' => 100,
            'dealerPrice' => 70,
            'subCatagory_id' => 1,
            'hidden' => 0,
            'available' => 1,
            'status' => 'pending'
        ]);
        \App\Models\Item::factory()->create([
            'itemName' => 'amr',
            'description' => 'amr1',
            'img' => 'https://www.w3schools.com/html/pic_trulli.jpg',
            'originalPrice' => 110,
            'dealerPrice' => 80,
            'subCatagory_id' => 16,
            'hidden' => 0,
            'available' => 1,
            'status' => 'active'
        ]);
        \App\Models\Item::factory()->create([
            'itemName' => 'om',
            'description' => 'om1',
            'img' => 'https://www.w3schools.com/html/pic_trulli.jpg',
            'originalPrice' => 180,
            'dealerPrice' => 130,
            'subCatagory_id' => 6,
            'hidden' => 0,
            'available' => 1,
            'status' => 'active'
        ]);
        \App\Models\Item::factory()->create([
            'itemName' => 'alid',
            'description' => 'dsdsd',
            'img' => 'https://www.w3schools.com/html/pic_trulli.jpg',
            'originalPrice' => 150,
            'dealerPrice' => 110,
            'subCatagory_id' => 3,
            'hidden' => 0,
            'available' => 1,
            'status' => 'pending'
        ]);
    }
}