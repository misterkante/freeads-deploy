<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
<div
    class="flex h-auto min-h-screen items-center justify-center overflow-x-hidden bg-white bg-cover"
  >
    <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8">
      <div class="bg-white shadow-2xl w-full space-y-6 rounded-xl p-6 shadow-md sm:max-w-md lg:p-8">
        <div class="flex items-center justify-center gap-3">
          <img class="w-30" src="https://delta-tech.gmb-maps.com/mao-b">
        </div>
        <div>
          <h3 class="flex text-base-content justify-center mb-1.5 text-2xl font-semibold">Verify your email</h3>
          <p class="text-center text-base-content/80">
            An activation link has been sent to your email address. <b>Please check your inbox and click
            on the link</b> to complete the activation process.
          </p>
        </div>
          <p class="text-base-content/80 text-center">
            Didn't get the mail?
            <div class="flex justify-center">
              <form action="{{ route('verification.send') }}" method="post">
                @csrf
              <button class="rounded-lg w-full bg-blue-600 px-5 py-2.5 text-center text-md font-medium text-white hover:bg-indigo-400 sm:w-full" type="submit"> Resend </button>
              </form>
        </p>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>