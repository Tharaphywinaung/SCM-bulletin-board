@extends('layout')
@section('content')
<div class="container mt-5">
  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <div class="bg-light card mx-auto">
    <div class="card-header font-weight-bold">
      <h4 class="">Import Export Excel, CSV File</h4>
    </div>
    <div class="card-body">
      <form id="excel-csv-import-form" method="POST"  action="{{ url('import-excel-csv-file') }}" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf   
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="file" name="file" placeholder="Choose file">
            </div>
          @error('file')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
          </div>              
          <div class="col-md-12">
            <button type="submit" class="btn btn-info" id="submit">Submit</button>
          </div>
        </div>     
      </form>
    </div>
  </div>
</div>  
@endsection