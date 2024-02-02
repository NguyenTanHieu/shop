@foreach ($data as $pro)

    <div class="media">
        <a href="{{ route('home.product',['product'=>$pro->id,'slug'=>$pro->slug]) }}" class="pull-left">
            <img class="media-object" width="50" src="uploads/product/{{ $pro->image }}">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                <a href="{{ route('home.product',['product'=>$pro->id,'slug'=>$pro->slug]) }}">{{ $pro->name }}</a>
            </h4>
            <p> {{ $pro->description }} </p>
        </div>
    </div>;
@endforeach
