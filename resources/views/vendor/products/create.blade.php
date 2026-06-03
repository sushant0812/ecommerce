<h1>Add Product</h1>

<form method="POST" action="/vendor/products">
    @csrf

    <input type="text" name="name" placeholder="Product Name" required>
    <br><br>

    <input type="text" name="price" placeholder="Price" required>
    <br><br>

    <input type="number" name="stock" placeholder="Stock">
    <br><br>

    <textarea name="description" placeholder="Description"></textarea>
    <br><br>

    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Save Product</button>
</form>