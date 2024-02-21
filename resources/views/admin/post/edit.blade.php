@extends('master.admin')
@section('title','Edit a  post' .$post->name)
@section('main')

<div class="row">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{ route('post.update',$post->post_id) }}" method="post"  enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="col-md-9">
            <div class="form-group">
                <label for="" >post name</label>
                <input type="text" value="{{ $post->name }}" name="name" class="form-control" id="" placeholder="input field">
            </div>
            <div class="form-group">
                <label for="" >post description</label>
                <textarea  name="description" class="form-control" id="" placeholder="Product content"> {{ $post->description }}</textarea>
            </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="" >post category</label><br>
            @foreach ($cats as $item_tags)
                        <input type="checkbox" name="cats[]" value="{{$item_tags->id}}" {{ $post->cats->contains($item_tags->id) ? 'checked' : '' }}>
                        {{$item_tags->name}}
                        <br>
                    @endforeach
           </select>
        </div>
        <div class="form-group">
            <label for="" >post tag</label><br>
            @foreach ($tagPosts as $item_tags)
                        <input type="checkbox" name="tags[]" value="{{$item_tags->id}}" {{ $post->tags->contains($item_tags->id) ? 'checked' : '' }}>
                        {{$item_tags->name}}
                        <br>
                    @endforeach
           </select>
        </div>
        <div class="form-group">
            <label for="" >Post Status</label>
           <div class="radio">
            <label for="">
                <input type="radio" name="status"  value="1" {{ $post->status == 1 ? 'checked' : '' }} />
                Publish
            </label>
           </div>
           <div class="radio">
            <label for="">
                <input type="radio" name="status"  value="0" {{ $post->status == 0 ? 'checked' : '' }} />
                Hidden
            </label>
           </div>
        </div>
        <div class="form-group">
            <label for="" >post Image</label>
            <input type="file" name="img" class="form-control" onchange="showImage(this)">
            <img src="uploads/product/{{ $post->image }}"  width="100%" id="show_img">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
    </div>
</form>
</div>
@stop()
@section('css')
<link rel="stylesheet" href="ad_assets/plugins/summernote/summernote.min.css">
@stop()
@section('js')
<script src="ad_assets/plugins/summernote/summernote.min.js"></script>
<script>
        $('.description').summernote({
            height: 250
        });
        
        function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


     
   
</script>
@stop()