<h1>Vendor Requests</h1>

@foreach($vendors as $vendor)
    <div style="margin-bottom:20px;">
        <h3>{{ $vendor->shop_name }}</h3>
        <p>Status: {{ $vendor->status }}</p>

        <form method="POST" action="/admin/vendors/{{ $vendor->id }}/approve">
            @csrf
            <button type="submit">Approve</button>
        </form>

        <form method="POST" action="/admin/vendors/{{ $vendor->id }}/reject">
            @csrf
            <button type="submit">Reject</button>
        </form>
    </div>
@endforeach