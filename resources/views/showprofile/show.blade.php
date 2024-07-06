<x-layout title="Your Profile">
    
<!-- component -->
<div class="mx-auto right-0 mt-2 w-full ">
                <div class="bg-black rounded overflow-hidden shadow-lg">
                    <div class="text-center p-6 bg-white-500 border-b">
                    <svg aria-hidden="true" role="img" class="h-24 w-24 text-white rounded-full mx-auto" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M172 120a44 44 0 1 1-44-44a44 44 0 0 1 44 44Zm60 8A104 104 0 1 1 128 24a104.2 104.2 0 0 1 104 104Zm-16 0a88 88 0 1 0-153.8 58.4a81.3 81.3 0 0 1 24.5-23a59.7 59.7 0 0 0 82.6 0a81.3 81.3 0 0 1 24.5 23A87.6 87.6 0 0 0 216 128Z"></path></svg>
                    <p class="pt-2 text-lg font-semibold text-gray-50 mb-3">{{auth()->user()->username}}</p>
                    <p class="text-sm text-gray-100 m-5">{{auth()->user()->email}}</p>
                    
                    </div>
                    
                        

                    <div class="">
                        <form action="/logout"
                        method="POST">
                      @csrf
                        <button type="submit" class="flex w-full justify-center  bg-indigo-600 p-5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log out</button>                        
                  
                    </form>
                    </div>
                </div>
            </div>


</x-layout>