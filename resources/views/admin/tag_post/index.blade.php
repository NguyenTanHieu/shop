@extends('master.admin')

@section('title', 'Manage Tags')

@section('main')
    <form action="" method="post" class="form-inline" role="form">
        <div class="form-group">
            <label for="" class="sr-only">label</label>
            <input type="text" class="form-control" id="tag-search" placeholder="Search tags">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('tag_post.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new</a>
    </form>

    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Tag name</th>
                <th>Tag Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagPosts as $index => $tag)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->status == 0 ? 'Ẩn' : 'Kích hoạt' }}</td>
                    <td class="text-right">
                        <form action="{{ route('tag_post.destroy', $tag->id) }}" method="post">
                            @csrf @method('delete')
                            <a href="{{ route('tag_post.edit', $tag->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@stop()
