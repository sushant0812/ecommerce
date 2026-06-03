<h1>Become a Vendor</h1>

<form method="POST" action="/become-vendor">
    @csrf

    <input type="text" name="shop_name" placeholder="Shop Name" required>
    <br><br>

    <textarea name="description" placeholder="Description"></textarea>
    <br><br>

    <button type="submit">Submit</button>
</form>