<table class="table table-bordered">
    <tr>
        <th>Product</th>
        <td>{{ isset($product->name) ? $product->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($product->name) ? $product->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fee</th>
        <td>{{ isset($product->fee) ? 'IDR '.number_format($product->fee) : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Photo</th>
        <td>
            <img src="
                @if ($product->photo != "")
                    @if(File::exists('storage/'.$product->photo))
                        {{ url(Storage::url($product->photo)) }}
                    @else
                       {{ 'N/A' }}
                    @endif
                @else
                    {{ 'N/A' }}
                @endif "
                alt="product photo" class="users-avatar-shadow" height="100" width="100">
        </td>
    </tr>
</table>