@if ($errors->any())
    <div class="my-3 mx-3 py-2 px-4 text-gray-600 rounded-md tracking-normal bg-red-200">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach  
    </div>
@endif