<h1>Your Products</h1>

<a href="/vendor/products/create">+ Add Product</a>

<hr>

@foreach($products as $product)
    <div style="margin-bottom:15px;">
        <h3>{{ $product->name }}</h3>
        <p>Price: {{ $product->price }}</p>
        <p>Stock: {{ $product->stock }}</p>
    </div>
@endforeach