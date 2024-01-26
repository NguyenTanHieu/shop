@extends('master.admin')
@section('title', 'Create a new category')
@section('main')

    <div class="row"></div>
    <div class="col-md-4">
        <form action="{{ route('category.store') }}" method="POST" role="form">
            @csrf <!-- Bảo vệ chống tấn công CSRF -->
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" class="form-control" name="name" placeholder="Tên danh mục">

            </div>

            <div class="form-group">
                <label for="">Category Status</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="1" />
                        Publish
                    </label>
                </div>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="0" />
                        Hidden
                    </label>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </form>
    </div>

@stop()
