<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Nhập từ khóa tìm kiếm">
    <button type="submit">Tìm Kiếm</button>
</form>


<h1>Kết quả tìm kiếm</h1>

@if($results->count() > 0)
    <ul>
        @foreach($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>
@else
    <p>Không có kết quả phù hợp.</p>
@endif
