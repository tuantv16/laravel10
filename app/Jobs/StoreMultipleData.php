<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Faker\Factory as Faker;

class StoreMultipleData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
       
        $dataInsert = $this->data;
        $faker = Faker::create();
        // // Xử lý lưu trữ dữ liệu
            for ($i = 0; $i < 1000000; $i++) {
            $dataInsert['name'] = $faker->text(35);
            //$dataInsert['name'] = 'admin2';
            $dataInsert['email'] = $faker->text(35).$i.'@gmail.com';
            $dataInsert['password'] = '123456789';

            // Lưu trữ dữ liệu vào cơ sở dữ liệu
            User::create($dataInsert);
                
            }
        
    }
}
