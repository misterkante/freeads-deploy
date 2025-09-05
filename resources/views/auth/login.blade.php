<!doctype html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>  

<body class = "flex mt-70 justify-center items-center">
<div class="flex bg-white p-10 shadow-2xl rounded-xl">
  <form action="{{ route('login') }}" class="mx-auto max-w-sm" method="POST">
    @csrf
    <div class="flex justify-center mb-5">
      <img class="w-30" src="https://delta-tech.gmb-maps.com/mao-b">
    </div>
    <h2 class="mb-5 text-3xl font-bold text-black flex justify-center">Login To Your Account</h2>
    <p class="flex justify-center text-md mb-5">Let's sparkle your ads</p>
    <div class="mb-5">
      <label for="email" class="mb-2 block text-md font-medium text-gray-700">Email</label>
      <input name="emal" type="email" id="email" value="{{ old('email') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder="john.doe@company.com" />
      @if ($errors->has('email'))
        <div class="flex mt-5 items-center">
          <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <div class="text-red-700 font-medium">{{ $errors->first('email') }}</div>
        </div>
      @endif
    </div>
    <div class="mb-5">
      <label for="password" class="mb-2 block text-md font-medium text-gray-700 items-center">Password</label>
      <input name="password" type="password" id="password" class="w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder="........"/>
      @if ($errors->has('password'))
        <div class="flex mt-5 items-center">
          <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <div class="text-red-700 font-medium">{{ $errors->first('password') }}</div>
        </div>
      @endif
    </div>
    <button type="submit" class="rounded-lg w-full bg-blue-600 px-5 py-2.5 text-center text-md font-medium text-white hover:bg-indigo-400 sm:w-full" value="Register">Sign in</button>
    <div class="flex justify-center gap-2 mt-5">
      <p>Don't have an account ?</p>
      <a class="font-bold text-blue-700 underline" href="{{ route('show.register') }}">Sign in</a>
    </div>
    <!-- validation errors -->
  </form>
</div>
</body>
</html>