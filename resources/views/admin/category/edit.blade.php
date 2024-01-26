@extends('master.admin')
@section('title', 'Edit a category' . $category->name)
@section('main')

    <div class="row"></div>
    <div class="col-md-4">
        <form action="{{ route('category.update', $category->id) }}" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="" placeholder="input field">
            </div>             
            <div class="form-group">
                <label for="">Category Status</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }} />
                        Publish
                    </label>
                </div>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }} />
                        Hidden
                    </label>
                </div>
            </div>            
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </form>
    </div>
@stop()
