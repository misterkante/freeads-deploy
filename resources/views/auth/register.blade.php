<!doctype html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <meta charset="utf-8" />
    <style>
      .iti {
        width: 100%;
      }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>  

<body class = "flex mt-20 justify-center items-center">
<div class="flex bg-white p-10 shadow-2xl rounded-xl">
<form action="{{ route('register') }}" class="max-w-sm mx-auto" method="POST">
  @csrf
  <div class="flex justify-center mb-5">
      <img class="w-30" src="https://delta-tech.gmb-maps.com/mao-b">
  </div>
  <h2 class = "mb-5 text-3xl font-bold text-black flex justify-center">Register for an Account</h2>
  <div class="mb-5">
    <label for="login" class="mb-2 block text-md font-medium text-gray-700">Name</label>
    <input type="login" name = "login" id="login" class="w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder="Name" required/>
      @if ($errors->has('login'))
        <div class="flex mt-5 items-center">
          <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <div class="text-red-700 font-medium">{{ $errors->first('login') }}</div>
        </div>
      @endif
  </div>
  <div class="mb-5">
    <label for="email" class="mb-2 block text-md font-medium text-gray-700">Email</label>
    <input type="email" name = "email" id="email" value="{{ old('email') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder="john.doe@company.com"/>
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
    <label for="phone" class="mb-2 block text-md font-medium text-gray-700 items-center">Phone</label>
  </div>
   <div class="w-full mb-5">
    <input type="tel" name = "phone" id="phone" class="form-control w-full w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder="Enter your phone number" required/>
      @if ($errors->has('phone'))
      <div class="flex mt-5 items-center">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="text-red-700 font-medium">{{ $errors->first('phone') }}</div>
      </div>
      @endif
  </div>
  <div class="mb-5">
    <label for="password" class="mb-2 block text-md font-medium text-gray-700 items-center">Password</label>
    <input type="password" name = "password" id="password" class="form-control w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder = "........" required />
      @if ($errors->has('password'))
        <div class="flex mt-5 items-center">
          <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <div class="text-red-700 font-medium">{{ $errors->first('password') }}</div>
        </div>
      @endif
  </div>
    <div class="mb-5">
    <label for="password_confirmation" class="mb-2 block text-md font-medium text-gray-700 items-center">Confirm password</label>
    <input type="password" name = "password_confirmation" id="password_confirmation" class="w-full rounded-lg border border-gray-300 p-2.5 text-md text-gray-900" placeholder = "........" required/>
  </div>
  <button type="submit" class="rounded-lg w-full bg-blue-600 px-5 py-2.5 text-center text-md font-medium text-white hover:bg-indigo-400 sm:w-full" value = "Register">Register</button>
  <!-- validation errors -->
  </form>
  <script>
  const phoneInput = document.querySelector("#phone");
  window.intlTelInput(phoneInput, {
    initialCountry: "auto",
    geoIpLookup: callback => {
      fetch('https://ipinfo.io/json?token=<YOUR_TOKEN>')
        .then(response => response.json())
        .then(data => callback(data.country))
        .catch(() => callback('bj'));
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });
</script>
</body>
</html>