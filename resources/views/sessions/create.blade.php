@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main>
        <section class="py-5 container">
            <div class="row py-lg-5">

                <h1 class="border-bottom text-center pb-3 mb-5">LOGIN</h1>

                <div class="col-lg-6 col-md-8 mx-auto card p-5">
                <form action="/login" method="POST" class="justify-content-md-end">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" tabindex="3" value="{{ old('email') }}">
                        <label for="email" class="form-label">Email address</label>
                        {{-- @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    <div class="form-floating mb-3">

                        <input type="password" name="password"  class="form-control" id="password" tabindex="4">

                        <label for="password" class="form-label">Password</label>
                        <i class="bi bi-eye-slash toggle-password" id="togglePassword"  data-target="password"></i>
                        {{-- @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                    @if ($errors->any())
                    <ul class="mt-3 list-unstyled">
                    @foreach ($errors->all() as $error )
                        <li class="small text-danger">{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif

                    </form>
              </div>
            </div>
        </section>
    </main>

@endsection
