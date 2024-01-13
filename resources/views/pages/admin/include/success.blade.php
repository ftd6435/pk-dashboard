@if (session('status') == "success")
    <div class="my-2 py-2 px-4 text-gray-600 rounded-md tracking-normal bg-green-200">
        {{ session('message') }}
    </div>        
@endif