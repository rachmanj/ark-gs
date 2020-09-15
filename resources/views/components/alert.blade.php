{{-- <div class="alert-message alert-{{ $type }}" role="alert">
    {{ $message }}
</div> --}}


<div class="alert alert-{{ $type }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div class="alert-message">
        {{ $message }}
    </div>
  </div>