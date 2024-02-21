@extends('master.admin')
@section('title', 'Edit a tag' . $tag_post->name)
@section('main')

    <div class="row"></div>
    <div class="col-md-4">
        <form action="{{ route('tag_post.update', $tag_post->id) }}" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Tag name</label>
                <input type="text" name="name" value="{{ $tag_post->name }}" class="form-control" id="" placeholder="input field">
            </div>             
            <div class="form-group">
                <label for="">Tag Status</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="1" {{ $tag_post->status == 1 ? 'checked' : '' }} />
                        Publish
                    </label>
                </div>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="0" {{ $tag_post->status == 0 ? 'checked' : '' }} />
                        Hidden
                    </label>
                </div>
            </div>            
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </form>
    </div>
@stop()


