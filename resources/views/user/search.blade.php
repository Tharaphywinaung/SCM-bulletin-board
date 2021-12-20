@extends('layout')
@section('content')
  <div class="container-fluid p-3 user-list">
    <h2 class="text-info text-center mt-5">User Search Results</h2>
    @if ($message = Session::get('success'))
      <p>{{ $message }}</p>
    @endif
    @if($users->isNotEmpty())
    <div class="table-responsive mt-3">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created User</th>
            <th scope="col">Phone</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Address</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col" class="text-right"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">
              <a href="" data-toggle="modal" data-target="#showModel{{ $user->id }}">{{ $user->name }}</a>
              <div class="modal fade" id="showModel{{ $user->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-center w-100">
                        <img src="/image/{{ $user->profile }}" alt="" width="150">
                      </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p>Name : {{ $user->name }}</p>
                      <p>Email : {{ $user->email }}</p>
                      @if ($user->type == '0')
                      <p>Type : Admin</p>
                      @else
                      <p>Type : User</p>
                      @endif
                      <p>Phone : {{ $user->phone }}</p>
                      @if ($user->dob)
                      <p>Date of birth : {{ $user->dob->format('d/m/Y') }}</p>
                      @endif
                      <p>Address : {{ $user->address }}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_user->name }}</td>
            <td>{{ $user->phone }}</td>
            @if ($user->dob)
            <td>{{ $user->dob->format('m/d/Y') }}</td>
            @endif
            <td>{{ $user->address }}</td>
            <td>{{ $user->created_at->format('m/d/Y') }}</td>
            <td>{{ $user->updated_at->format('m/d/Y') }}</td>
            <td>
            <a href="" data-toggle="modal" data-target="#deleteModal{{ $user->id }}" class="btn btn-danger btn-sm mb-1">Delete</a>
              <div class="modal fade" id="deleteModal{{ $user->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title text-center w-100">
                        <img src="/image/{{ $user->profile }}" alt="" width="150">
                      </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p>Name : {{ $user->name }}</p>
                      <p>Email : {{ $user->email }}</p>
                      @if ($user->type == '0')
                      <p>Type : Admin</p>
                      @else
                      <p>Type : User</p>
                      @endif
                      <p>Phone : {{ $user->phone }}</p>
                      @if ($user->dob)
                      <p>Date of birth : {{ $user->dob->format('d/m/Y') }}</p>
                      @endif
                      <p>Address : {{ $user->address }}</p>
                    </div>
                    <div class="modal-footer">
                      <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div>
        <h2>No item found</h2>
      </div>
    @endif
  </div>
@endsection