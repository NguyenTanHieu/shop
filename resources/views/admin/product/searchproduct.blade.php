@foreach ($data as $model)
<tr>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $model->name }}</td>
    <td>{{ $model->cat ? $model->cat['name'] : 'No category' }}</td>
    <td>
        @foreach ($model->tags as $item_tags)
            {{ $item_tags->name }}
            <br>
        @endforeach
    </td>
    <td>{{ $model->price }} <span class="label label-success">{{ $model->sale_price }}</span></td>
    <td>{{ $model->status == 0 ? 'Hidden' : 'Pulish' }}</td>
    <td>
        <img src="uploads/product/{{ $model->image }}" width="40" alt="">
    </td>
    <td class="text-right">
        <form action="{{ route('product.destroy', $model->id) }}" method="post">
            @csrf @method('delete')

            <a href="{{ route('product.edit', $model->id) }}" class="btn btn-sm btn-primary"><i
                    class="fa fa-edit"></i></a>
            <button class="btn btn-sm btn-danger"
                onclick="return confirm('Are you sure want to delete ?')"><i
                    class="fa fa-trash"></i></button>
        </form>
    </td>
</tr>
@endforeach