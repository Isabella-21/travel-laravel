<x-layout :title="$blog->title">

<div class="shadow-md border-2 border-gray-100 p-3 ">

<img
               class="object-fill"
                src="/storage{{$blog->photo}}"
                alt=""
            >
            <h1 class="text-2xl font-bold mb-3 text-white ">
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                </a>
            </h1>
            <p class="text-white">
                {{$blog->body}}
            </p>
        </div>


</x-layout>