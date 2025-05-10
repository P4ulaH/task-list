<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravrel task list</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formater-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply text-slate-600 font-medium rounded-md px-2 py-1 my-20 text-center shadow-sm ring-1 ring-slate-700/40 
            hover:bg-slate-200 hover:text-slate-500 
            dark:bg-zinc-700 dark:text-[#a3a9c7] 
            dark:hover:bg-zinc-600 dark:hover:text-[#868ba3]
        }
        .link{
            @apply text-gray-600 underline decoration-slate-400
            hover:text-gray-950 hover:decoration-[#646c91]
            dark:text-zinc-400 dark:decoration-slate-500
            dark:hover:text-zinc-200 dark:hover:decoration-[#b6bcd9]
        }
        label{
            @apply block uppercase text-slate-700 mb-2 font-medium
            dark:text-[#70789e]
        }
        input, 
        textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none 
            dark:bg-zinc-700 dark:text-zinc-200 dark:border-zinc-600
        }
        .error-message{
            @apply text-red-500 text-sm
        }

        .index-box{
            @apply border border-slate-300 rounded-lg p-5 my-6 shadow-[0px_0px_20px_rgba(0,0,0,0.2)]
            dark:border-[#616785] dark:bg-zinc-800 dark:shadow-[0px_0px_20px_rgba(0,0,0,0.5)]
        }
    </style>
    {{-- blade-formater-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg bg-white 
    dark:bg-zinc-800">
    <h1 class="mb-5 text-3xl font-bold dark:text-[#b6bcd9] ">@yield('title')</h1>
    <div x-data="{ flash:true }">
        @if(session()->has('success'))
            <div x-show="flash"
                class=" relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <div>{{ session('success')}}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke-width="1.5" @click="flash = false"
                      stroke="currentColor" class="h-6 w-6 cursor-pointer">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif  
            
        @yield('content')
    </div>
</body>
</html>