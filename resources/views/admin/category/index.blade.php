@extends('master.admin')
@section('title', 'Dashboard')
@section('main')
    <form action="" method="post" class="form-inline" role="form">
        <div class="form-group">
            <label for="" class="sr-only">label</label>
            <input type="email" class="form-control" id="" placeholder="input field">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('category.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new</a>
    </form>

    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Category name</th>
                <th>Category Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>1</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status == 0 ? 'Ẩn' : 'Kích hoạt' }}</td>
                    <td class="text-right">
                        <form action="{{ route('category.destroy',$item->id) }}" method="post" >
                            @csrf @method('delete')
                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@stop()
