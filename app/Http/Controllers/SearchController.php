<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\YourModel; // Thay YourModel bằng tên model của bạn

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query'); // Nhận từ khóa tìm kiếm từ request

        $results = [];
        if (!empty($query)) {
            $results = User::where('name', 'like', "%$query%")->get(); // Thay 'column_name' bằng tên cột bạn muốn tìm kiếm
        }
        

        return view('search.results', compact('results'));
    }
}
