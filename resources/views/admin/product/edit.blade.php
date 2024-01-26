@extends('master.admin')
@section('title','Edit a  product' .$product->name)
@section('main')

<div class="row">
<form action="{{ route('product.update',$product->id) }}" method="post"  enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="col-md-9">
            <div class="form-group">
                <label for="" >product name</label>
                <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="" placeholder="input field">
            </div>
            <div class="form-group">
                <label for="" >product description</label>
                <textarea  name="description" class="form-control" id="" placeholder="Product content"> {{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="" >product orther image</label>
                <input type="file" name="other_img[]" class="form-control" multiple onchange="showOtherImage(this)">
                <hr>
                <div class="row">
                    @foreach($product->images as $img)
                    <div class="col-md-3" style="position: relative;">
                        <a href="" class="thumnail">
                            <img src="uploads/product/{{ $img->image }}" width="100px" alt=""> 
                       <a  onclick="return confirm('are you sure')" href="{{ route('product.destroyImage',$img->id) }}" class="btn btn-sm btn-danger" style="position: absolute,top:5px; right:20px">
                                <i class="fa fa-trash"></i>
                            </a>
                    </div>
                    @endforeach
                </div>
                <h4>Các ảnh mới chọn sẽ thay thế ảnh cũ trước đó</h4>
                    <div class="row" id="show_other_img">
                    </div>
            </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="" >product category</label>
           <select name="category_id" class="form-control">
            <option value="">choose one---</option>
            @foreach($cats as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat -> name }}</option>
            @endforeach
           </select>
        </div>
        <div class="form-group">
            <label for="" >product tag</label><br>
            @foreach ($tags as $item_tags)
                        <input type="checkbox" name="tags[]" value="{{$item_tags->id}}" {{ $product->tags->contains($item_tags->id) ? 'checked' : '' }}>
                        {{$item_tags->name}}
                        <br>
                    @endforeach
           </select>
        </div>
        <div class="form-group">
            <label for="" >product price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}" id="" placeholder="input field">
        </div>
        <div class="form-group">
            <label for="" >product sale price</label>
            <input type="text" name="sale_price" class="form-control" value="{{ $product->sale_price }}" id="" placeholder="input field">
        </div>
        <div class="form-group">
            <label for="" >product Status</label>
           <div class="radio">
            <label for="">
                <input type="radio" name="Status"  value="1" {{ $cat->status == 1 ? 'checked' : '' }} />
                Publish
            </label>
           </div>
           <div class="radio">
            <label for="">
                <input type="radio" name="Status"  value="0" {{ $cat->status == 0 ? 'checked' : '' }} />
                Hidden
            </label>
           </div>
        </div>
        <div class="form-group">
            <label for="" >product Image</label>
            <input type="file" name="img" class="form-control" onchange="showImage(this)">
            <img src="uploads/product/{{ $product->image }}"  width="100%" id="show_img">
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


        function showOtherImage(input) {
        if (input.files && input.files.length) {
            var _html= '';
            for (let i = 0; i < input.files.length; i++){
                let file = input.files[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                   _html += `
                   <div class="thumbnail col-md-3">
                        <img src="${e.target.result}" alt="" width="100%">
                    </div>
                   `;
                   $('#show_other_img').html(_html)
                };
             
                reader.readAsDataURL(file);
            }
          
        }
    }
</script>
@stop()