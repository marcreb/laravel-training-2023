@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main>
        <section class="py-5 container">
            <div class="row">
                <div class="col-12 pb-3">
                    <a href="/dashboard/users" class="float-end btn bg-error text-white">Go Back</a>
                </div>
            </div>
            <hr>
            <div class="row py-lg-5">

                <h1 class="border-bottom text-center pb-3 mb-5">EDIT USER</h1>

                <div class="col-lg-6 col-md-8 mx-auto card p-5">
                <form action="/dashboard/user/{{ $user->id }}" method="POST" class="justify-content-md-end" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="profile-pic-wrapper mb-3">
                        <div class="pic-holder">
                          <!-- uploaded pic shown here -->
                          <img id="profilePic" class="pic" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : "https://placehold.co/150x150" }}">

                          <input class="uploadProfileInput" type="file" name="profile_picture" value="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : "https://placehold.co/150x150" }}" id="newProfilePhoto" accept=".jpg, .jpeg, .png" style="opacity: 0;"/>
                          <label for="newProfilePhoto" class="upload-file-block">
                            <div class="text-center">
                              <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                              </div>
                              <div class="text-uppercase">
                                Edit <br /> Profile Photo
                              </div>
                            </div>
                          </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" tabindex="1" value="{{ old('name', $user->name) }}">
                        <label for="name" class="form-label">Name</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="username" class="form-control" name="username" id="username" aria-describedby="username" tabindex="2" value="{{ old('username', $user->username) }}">
                        <label for="username" class="form-label">Username</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" tabindex="3" value="{{ old('email', $user->email) }}">
                        <label for="email" class="form-label">Email address</label>
                        {{-- @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="changePasswordCheckbox" onclick="togglePasswordFields()">
                        <label for="changePasswordCheckbox">Change Password?</label>
                      </div>
                    <div id="passwordFields" style="display: none;">
                    <div class="form-floating mb-3">

                        <input type="password" name="password"  class="form-control password-toggle" id="password" tabindex="4">

                        <label for="password" class="form-label">Password</label>
                        <i class="bi bi-eye-slash toggle-password" data-target="password" id="togglePassword"></i>
                        {{-- @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control password-toggle" id="password_confirmation" tabindex="5">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <i class="bi bi-eye-slash toggle-password" data-target="password_confirmation" id="togglePasswordConfirmation"></i>
                    </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="user_role" name="user_role" class="form-select" required>
                            @foreach ($userRoles as $role)
                                <option
                                value="{{ $role }}"
                                @if($user->user_role === $role)
                                selected
                                @endif
                                >{{ $role }}</option>
                            @endforeach
                        </select>
                        <label for="user_role" class="form-label">User Role</label>
                    </div>

                    <button type="submit" class="btn custom-success text-white float-end ">Save User</button>
                    <a href="/dashboard/users" class="btn btn-danger text-white float-end mx-2 "><span>Cancel</span></a>


                    @if ($errors->any())
                        <ul class="mt-3">
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

@section('scripts')

<script type="text/javascript">
$(document).on("change", ".uploadProfileInput", function () {
    var triggerInput = this;
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
    var holder = $(this).closest(".pic-holder");
    var wrapper = $(this).closest(".profile-pic-wrapper");
    $(wrapper).find('[role="alert"]').remove();
    triggerInput.blur();
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
        return;
    }
    if (/^image/.test(files[0].type)) {
        // only image file
        var reader = new FileReader(); // instance of the FileReader
        reader.readAsDataURL(files[0]); // read the local file

        reader.onloadend = function () {
            $(holder).addClass("uploadInProgress");
            $(holder).find(".pic").attr("src", this.result);
            $(holder).append(
                '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only"></span></div></div>'
            );

            // Dummy timeout; call API or AJAX below
            setTimeout(() => {
                $(holder).removeClass("uploadInProgress");
                $(holder).find(".upload-loader").remove();
                // If upload successful
                if (Math.random() < 0.9) {
                    $(wrapper).append(
                        '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                    );

                    // // Clear input after upload
                    // $(triggerInput).val("");

                    setTimeout(() => {
                        $(wrapper).find('[role="alert"]').remove();
                    }, 3000);
                } else {
                    $(holder).find(".pic").attr("src", currentImg);
                    $(wrapper).append(
                        '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                    );

                    // Clear input after upload
                    // $(triggerInput).val("");
                    setTimeout(() => {
                        $(wrapper).find('[role="alert"]').remove();
                    }, 3000);
                }
            }, 1500);
        };
    } else {
        $(wrapper).append(
            '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>'
        );
        setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
        }, 3000);
    }
});

$(document).ready(function() {
    $("#changePasswordCheckbox").on("change", function() {
      const passwordFields = $("#passwordFields");

      if ($(this).is(":checked")) {
        passwordFields.show();
      } else {
        passwordFields.hide();
      }
    });
  });
</script>
@endsection
