<x-layout title="Dashboard">

            <form action="/"> 

<div class='flex items-center justify-center my-5 '>
    <div class="flex w-full mx-10 rounded bg-white">
        <input value="{{request('query')}}"
            name="query" class=" w-full border-lg-rounded-md bg-transparent px-4 py-1 text-gray-800 outline-none focus:outline-none " type="search" name="search" placeholder="Search..." />
        <button type="submit" class="m-2 rounded bg-blue-600 px-4 py-2 text-white">
            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </button>
    </div>
</div>
            </form>

    <form action="">
        @if (request('query'))
        <input
            name="query"
            type="hidden"
            value="{{request('query')}}"
        >
        @endif
        
        <select
            name="category_id"
            id=""
            class="border-2 px-2 py-2 rounded-lg w-3/4 mx-10"
        >
            @foreach ($categories as $category)
            <option {{$category->id == request('category_id') ? 'selected' : ''}}
                value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button
            type="submit"
            class="bg-indigo-500 px-2 py-1 text-white rounded-lg"
        >Search by Continent</button>
    </form>
        
    <div class="grid grid-cols-3 space-x-2 ">
        @forelse($blogs as $blog)
        <div class="shadow-md p-3">
        <img
                width="full"
                height="full"
                src="/storage{{$blog->photo}}"
                alt=""
            >
            <h1 class="text-2xl font-bold mb-3 text-white">
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                </a>
            </h1>
            <p class="text-white">
                {{$blog->body}}
            </p>
            <p class="mt-3 text-white">category - {{$blog->category->name}}</p>
            
            <button 
            type="submit" 
            class="bg-blue-500 text-white border border-black rounded-md px-2 py-3 my-3"
            >  <a href="/blogs/{{$blog->slug}}">
            Read More
            </a>
            </button>

        </div>
        @empty
        <p>no results found.</p>
        @endforelse

    
    </div>

    {{$blogs->links()}}

</x-layout>


