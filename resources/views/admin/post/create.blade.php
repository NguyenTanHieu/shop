@extends('master.admin')
@section('title', 'Create a new product')
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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Post name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="input field">
                </div>
                <div class="form-group">
                    <label for="">Post description</label>
                    <textarea name="description" class="form-control description" placeholder="Product content">
                </textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" >product category</label><br>
                    @foreach ($cats as $item_tags)
                        <input type="checkbox" name="cats[]" value="{{$item_tags->id}}" >
                        {{$item_tags->name}}
                        <br>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="">post Status</label>
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
                <div class="form-group">
                    <label for="">post Image</label>
                    <input type="file" name="img" class="form-control" id="" placeholder="input field"
                        onchange="showImage(this)">
                    <img src="" id="show_img" alt="" width="100%">
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

                reader.onload = function(e) {
                    $('#show_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        function showOtherImage(input) {
            if (input.files && input.files.length) {
                var _html = '';
                for (let i = 0; i < input.files.length; i++) {
                    let file = input.files[i];
                    var reader = new FileReader();

                    reader.onload = function(e) {
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
