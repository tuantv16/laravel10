<?php

namespace App\Http\Controllers;

use App\Jobs\StoreMultipleData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DemoController extends Controller
{

    public function demoRedis() {
       // Lưu một giá trị vào Redis với khoá 'user:id'
        // Cache::put('user:1', 'John Doe', 10); // Lưu trữ trong 10 phút (600 giây)
        // $userName = Cache::get('user:1', 'Default Name'); // Lấy giá trị của khoá 'user:1', nếu không có sẽ trả về 'Default Name'
        // //Cache::forget('user:1'); // Xóa dữ liệu có khoá 'user:1' khỏi Redis

        // if (Cache::has('user:1')) {
        //     echo $userName;die;
        //     // Dữ liệu có tồn tại trong Redis
        // } else {
        //     echo 'Dữ liệu không tồn tại trong Redis';die;
        //     // Dữ liệu không tồn tại trong Redis
        // }

        $conditions = [
            'id' => 1,
            'name' => 'vantuant2'
        ];

        $value = User::where($conditions)->first();
        $key = json_encode($conditions);
        Cache::put($key, $value, 60); // Lưu trữ trong 10 phút (600 giây)
        $userName = Cache::get($key, 'Guest');
        dd($userName);
    }


    public function demo() {
        return view('demo');
    }

    public function storeMultipleData(Request $request)
    {
        // Lấy dữ liệu từ request
        //$data = $request->input('data');

        $data = [
           
        ];

        // Gọi công việc và truyền dữ liệu vào
        StoreMultipleData::dispatch($data)->onQueue('store_data');

        return response()->json(['message' => 'Lưu dữ liệu thành công.']);
    }
    
}
