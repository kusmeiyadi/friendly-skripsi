@extends('admin.layouts.app')

@section('headSection')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
<script src="https://unpkg.com/sweetalert2@7.26.29/dist/sweetalert2.all.js"></script>

@endsection

@section('main-content')

  <div class="pusher">
    <div class="main-content">

      <div class="ui grid stackable padded">
        <div class="column">
          <a href="{{ route('pengaduans.index') }}" class="">Back</a>
          <a href="{{ route('pengaduan.email',$pengaduan->id) }}">Email</a>
          @if($pengaduan->is_approved == false)
            <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $pengaduan->id }})">
                <i class="material-icons">done</i>
                <span>Approve</span>
            </button>
            <form method="post" action="{{ route('pengaduan.approve',$pengaduan->id) }}" id="approval-form" style="display: none">
                @csrf
                @method('PUT')
            </form>
        @else
            <button type="button" class="btn btn-success pull-right" disabled>
                <i class="material-icons">done</i>
                <span>Approved</span>
            </button>
        @endif
          <div class="ui fluid card">
            <div class="content">

                <div class="ui left floated header">
                  <h1 class="ui header">
                    {{ $pengaduan->pelapor->nama_p }}
                  </h1>
                </div>

              @can('pengaduans.create', Auth::user())
                <div class="ui right floated">
                  <a class="ui labeled icon blue button" href="{{ route('pengaduan.create') }}">
                    <i class="plus icon"></i>
                     Add New
                   </a>
                </div>
              @endcan

              <div class="ui clearing divider"></div>
              <form class="" action="index.html" method="post">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $pengaduan->kontak_p }}">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('footerSection')

<script>

function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }

</script>

@endsection
