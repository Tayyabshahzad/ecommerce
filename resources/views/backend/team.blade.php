@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Team</h5>
    <div class="card-body">
    <form method="post" action="{{route('team.add')}}">
        @csrf
        {{-- @method('PATCH') --}}
        {{-- {{dd($data)}} --}}
        <div class="form-group">
          <label for="short_des" class="col-form-label">Team <span class="text-danger">*</span></label>
          <div class="form-group">

            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
            <input id="thumbnail1" class="form-control" type="text" name="photo" > <br><br>
          </div>
          <input type="text"  class="form-control"  name="name" required placeholder="Team Name"> <hr>
          <input type="text"  class="form-control"  name="role" required placeholder="Team Role">
          @error('short_des')

          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>

      <hr>

      <h3>
        Current Team
      </h3>
        <table class="table">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
            @foreach ($data as $myteam )

            <tr>
                <td><img src="{{ $myteam->photo }}" alt="" width="50"></td>
                <td>{{  $myteam->name }}</td>
                <td>{{  $myteam->role }}</td>
            </tr>
            @endforeach
        </table>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush
