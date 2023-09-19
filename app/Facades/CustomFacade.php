<?php 
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CustomFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'custom'; // Đây là tên của service hoặc class bạn muốn truy cập
    }
}