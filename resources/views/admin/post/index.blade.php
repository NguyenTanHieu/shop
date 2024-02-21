@extends('master.admin')
@section('title', 'Post Manager')
@section('main')
    <form action="{{ route('post.index') }}" method="post" class="form-inline" role="form">
        @csrf
        <div class="form-group">
            <label for="search" class="sr-only">Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search by post name">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('post.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new</a>
    </form>

    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Post name</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $model->name }}</td>
                    <td>
                        @foreach ($model->cats as $category)
                            {{ $category->name }}
                            <br>
                        @endforeach
                    </td>
                    <td>
                        @php
                            $tags = isset($model->tags) ? $model->tags : [];
                        @endphp
                        {{-- @dd($model->tags) --}}
                        @foreach ( $model->tags as $tag)
                            {{ $tag->name }}
                            <br>
                        @endforeach
                    </td>
                    <td>{{ $model->status == 0 ? 'Hidden' : 'Publish' }}</td>
                    <td>
                        <img src="{{ asset('uploads/post/' . $model->image) }}" width="40" alt="">
                    </td>
                    <td class="text-center">
                        <form action="{{ route('post.destroy', $model->post_id) }}" method="post">
                            @csrf
                            @method('delete')

                            <a href="{{ route('post.edit', $model->post_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@stop
