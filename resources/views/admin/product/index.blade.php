@extends('master.admin')
@section('title', 'Product manager')
@section('main')
    <form action="" method="post" id="searchForm" class="form-inline" role="form">
        @csrf <!-- Thêm token CSRF vào form -->
        <div class="form-group">
            <label for="" class="sr-only">label</label>
            <input type="text" class="form-control" id="searchInput" placeholder="input field">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('product.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new</a>
    </form>


    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Product name</th>
                <th>Category</th>
                <th>tag</th>
                <th>Price</th>
                <th>Status</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->cat ? $model->cat['name'] : 'No category' }}</td>
                    <td>
                        @foreach ($model->tags as $item_tags)
                            {{ $item_tags->name }}
                            <br>
                        @endforeach
                    </td>
                    <td>{{ $model->price }} <span class="label label-success">{{ $model->sale_price }}</span></td>
                    <td>{{ $model->status == 0 ? 'Hidden' : 'Pulish' }}</td>
                    <td>
                        <img src="uploads/product/{{ $model->image }}" width="40" alt="">
                    </td>
                    <td class="text-right">
                        <form action="{{ route('product.destroy', $model->id) }}" method="post">
                            @csrf @method('delete')

                            <a href="{{ route('product.edit', $model->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure want to delete ?')"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var keyword = $('#searchInput').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('product.searchproducts') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                success: function(data) {
                    if (data.status == 200) {
                        $('.table tbody').html(data.html);
                    }else {
                        alert("Loi56")
                    }
                },
                error: function(error) {
                    console.error(
                    'Error occurred while searching products. Check console for details.');
                }
            });
        });
    </script>
@stop()
