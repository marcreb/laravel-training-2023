@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main>
        <section class="py-5 container">
            <div class="row py-lg-5">

                <h1 class="border-bottom text-center pb-3 mb-5">REGISTER</h1>

                <div class="col-lg-6 col-md-8 mx-auto card p-5">
                <form action="/register" method="POST" class="justify-content-md-end">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" tabindex="1" value="{{ old('name') }}">
                        <label for="name" class="form-label">Name</label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="username" class="form-control" name="username" id="username" aria-describedby="username" tabindex="2" value="{{ old('username') }}">
                        <label for="username" class="form-label">Username</label>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" tabindex="3" value="{{ old('email') }}">
                        <label for="email" class="form-label">Email address</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">

                        <input type="password" name="password"  class="form-control" id="password" tabindex="4">

                        <label for="password" class="form-label">Password</label>
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">REGISTER</button>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error )
                            <ul class="list-unstyled mt-5">
                                <li class="small text-danger">{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                    </form>
              </div>
            </div>
        </section>
    </main>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', (event) => {
            // Toggle the type attribute using
            // getAttribute() method
            const type = password.getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the eye and bi-eye icon
            event.target.classList.toggle('bi-eye');
        });
    </script>
@endsection