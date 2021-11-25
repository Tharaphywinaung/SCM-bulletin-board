@extends('layout')
@section('content')
  <div class="container user-profile mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-6 bg-light card mx-auto">
          @if ($errors->any())
          <p>{{ $error }}</p>
          @endif
          <img src="/image/{{ $user->profile }}" alt="" class="detail-profile-image">
          <div class="card-body">
            <dl>
              <dt>Name :</dt>
              <dd>{{ $user->name }}</dd>
            </dl>
            <dl>
              <dt>Email :</dt>
              <dd>{{ $user->email }}</dd>
            </dl>
            <dl>
              <dt>Type :</dt>
              @if ($user->type == '0')
              <dd>Admin</dd>
              @else
              <dd>User</dd>
              @endif
              </dd>
            </dl>
            <dl>
              <dt>Phone :</dt>
              <dd>{{ $user->phone }}</dd>
            </dl>
            <dl>
              <dt>Date Of Birth :</dt>
              <dd>{{ $user->dob->format('d/m/Y') }}</dd>
            </dl>
            <dl>
              <dt>Address :</dt>
              <dd>{{ $user->address }}</dd>
            </dl>
            <p class="text-right">
              <a href="{{route('user.edit',$user->id)}}" class="btn btn-danger">Edit</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection