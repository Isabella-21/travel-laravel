<x-layout  title="Login to see the blogs">
  
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
        @csrf
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-white">Username</label>
        <div class="mt-2">
          <input value ="{{old('username')}}"
          id="username" 
          name="username" 
          type="username" 
          autocomplete="username" 
          required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        @error('username')
        <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror

      </div> 

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    
    <form class="space-y-6" action="#" method="POST">
    @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
        <div class="mt-2">
          <input 
          value ="{{old('email')}}"
          id="email" 
          name="email" 
          type="email" 
          autocomplete="email" 
           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        @error('email')
        <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror

      </div>

      <div>
      <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label> 
          <!-- <div class="text-sm"> -->
            <!-- <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a> -->
          <!-- </div> -->
         </div> 
        <div class="mt-2">
          <input 
          id="password" 
          name="password" 
          type="password" 
          autocomplete="current-password" 
          required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        

      </div>

      <div>
        <button type="submit" action="/login" method="GET" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 my-5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
    <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
       Are you new here? Register now
    </a>
    </p>
  </div>
</div>


</x-layout>