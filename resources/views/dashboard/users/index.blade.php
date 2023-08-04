@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main class="p-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
                <h1>Dashboard | Users</h1>
            </div>
            <div class="col-md-8 mb-3">
                <a href="/dashboard/users/create" class="btn custom-success text-white float-end green-button"><i class="plus-icon ">+</i><span>Add User</span></a>
            </div>
        </div>
        <section class="containerfluid data-container">
          <div class="row py-5">
            <div class="col-12 col-md-12">
              <div class="table-responsive">
                <table class="table table-striped align-middle datatables" style="width:100%">
                  <thead>
                    <tr>

                        <th style="width: 20%">Email Address</th>
                        <th style="width: 20%">Username</th>
                        <th style="width: 20%">Role</th>
                        <th style="width: 20%">Image</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                    <tr>

                        <td>
                          <a href='/dashboard/user?id={{ $user->id }}' class='text-primary'>{{ $user->email }}</a>
                        </td>
                        <td>
                           {{ $user->username }}
                        </td>

                        <td>
                          <span>{{ $user->user_role }}</span>
                        </td>
                        <td>

                            <div class="image-crop">
                                <img src='{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : "https://placehold.co/150x150" }}'
                                     alt="{{ $user->name }}" />
                            </div>
                         </td>
                        <td>
                          <a href='/dashboard/user?id={{ $user->id }}' class='btn text-white bg-twitter-blue custom-button'>edit</a>

                          <form method="POST" action="dashboard/users" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn text-white bg-error custom-button delete_button">delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </main>

@endsection
