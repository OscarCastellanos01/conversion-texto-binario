
@extends('layouts.app')

@section('titulo', 'Binary Code Translator')
    
@section('contenido')
    <h1 class="text-5xl font-extrabold text-center text-blue-600 mb-5">Binary Code Translator</h1>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul 
            class="flex flex-wrap -mb-px text-sm font-medium text-center" 
            id="default-styled-tab" 
            data-tabs-toggle="#default-styled-tab-content" 
            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" 
            role="tablist"
        >
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="text-to-binary-styled-tab" data-tabs-target="#styled-text-to-binary" type="button" role="tab" aria-controls="text-to-binary" aria-selected="false">Text to binary</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="binary-to-text-styled-tab" data-tabs-target="#styled-binary-to-text" type="button" role="tab" aria-controls="binary-to-text" aria-selected="false">Binary to text</button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div 
            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" 
            id="styled-text-to-binary" 
            role="tabpanel" 
            aria-labelledby="text-to-binary-tab"
        >
            <form id="textToBinaryForm" method="POST" action="{{ route('convert.text.to.binary') }}">
                @csrf
                <div class="relative">
                    <input 
                        type="text" 
                        id="text"
                        name="text"
                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                        placeholder=" " 
                    />
                    <label 
                        for="text" 
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto"
                    >
                        Text
                    </label>
                </div>
                <div class="mt-5">
                    <button 
                        type="submit" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Translate
                    </button>
                </div>
            </form>
            <div id="binaryResult" class="mt-3"></div>
        </div>
        <div 
            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" \
            id="styled-binary-to-text" 
            role="tabpanel" 
            aria-labelledby="binary-to-text-tab"
        >
            <form id="binaryToTextForm" method="POST" action="{{ route('convert.binary.to.text') }}">
                @csrf
                <div class="relative">
                    <input 
                        type="text" 
                        id="binary"
                        name="binary"
                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                        placeholder=" " 
                    />
                    <label 
                        for="binary" 
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto"
                    >
                        Binary
                    </label>
                </div>
                <div class="mt-5">
                    <button 
                        type="submit" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Translate
                    </button>
                </div>
            </form>
            <div id="textResult" class="mt-3"></div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#textToBinaryForm').on('submit', function(event) {
                event.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.post(url, data, function(response) {
                    $('#binaryResult').html('<strong>Binary:</strong> ' + response.binary);
                });
            });

            $('#binaryToTextForm').on('submit', function(event) {
                event.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.post(url, data, function(response) {
                    $('#textResult').html('<strong>Text:</strong> ' + response.text);
                });
            });
        });
    </script>
@endpush