@extends('layouts.admin')

@section('title', 'Manage Konten Tentang Kami')

@section('page-content')
<div class="card">
    <form action="{{ route('admin.abouts.update', $about->id) }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="body" class="form-label"><h4>Tentang Kami</h4></label>
                <textarea maxlength="255" class="form-control fs-5 @error('description') is-invalid @enderror" name="description" id="body" cols="30" rows="10">{{$about->description}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="visi" class="form-label"><h4>Visi</h4></label>
                        <textarea maxlength="100" class="form-control fs-5 @error('visi') is-invalid @enderror" name="visi" id="visi" cols="30" rows="5">{{$about->visi}}</textarea>
                        @error('visi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="misi" class="form-label"><h4>Misi</h4></label>
                        <textarea maxlength="100" class="form-control fs-5 @error('misi') is-invalid @enderror" name="misi" id="misi" cols="30" rows="5">{{$about->misi}}</textarea>
                        @error('misi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nilai" class="form-label"><h4>nilai</h4></label>
                        <textarea maxlength="100" class="form-control fs-5 @error('nilai') is-invalid @enderror" name="nilai" id="nilai" cols="30" rows="5">{{$about->nilai}}</textarea>
                        @error('nilai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex">
                <button type="submit" class="btn text-bg-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
    @if (session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
                title: 'Your work has been saved',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1000,
                showCloseButton: true
        })
    </script>
    @endif
@endsection