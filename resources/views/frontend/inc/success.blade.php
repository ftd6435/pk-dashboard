@if (session('status') == "success")
    <div class="my-2 py-2 px-4 text-white bg-opacity-25 rounded-pill bg-success bg-gradient">
        {{ session('message') }}
    </div>        
@endif