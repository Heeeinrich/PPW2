@extends('auth.layouts')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Dashboard</h5>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">Create</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-3 mb-3">
                                <div class="gallery-item">
                                    <a href="{{ asset('storage/posts_image/' . $gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                                        <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" class="img-fluid rounded" alt="gallery-image" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <h3 class="text-center">Tidak ada data</h3>
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
