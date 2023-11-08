@extends('layouts.app')
@section('title', 'Tampil Dosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tampil Dosen</h1>
        <ol class="breadcrumb mb-4">
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if($errors->any())
                {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                @endif
                @if(Session::get('error') && Session::get('error') != null)
                <div style="color:red">{{ Session::get('error') }}</div>
                @php
                Session::put('error', null)
                @endphp
                @endif
                @if(Session::get('success') && Session::get('success') != null)
                <div style="color:green">{{ Session::get('success') }}</div>
                @php
                Session::put('success', null)
                @endphp
                @endif
                <form action="{{ route('dosen.update', $dosen->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{ asset('gambar/' . $dosen->foto_dosen) }}" width="200" height="300" alt="Gambar">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label class="form-text" style="text-align:left">NIDN</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $dosen->nidn }}">
                                        </div>
                                        @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label class="form-text" style="text-align:left">Nama</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}">
                                        </div>
                                        @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label class="form-text" style="text-align:left">Alamat</label>
                                        </div>
                                        <div class="col-sm-8 mb-3">
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $dosen->alamat }}">
                                        </div>
                                        @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label class="form-text" style="text-align:left">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $dosen->tgl_lahir }}">
                                        </div>
                                        @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label class="form-text" style="text-align:left">Foto Dosen</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="foto_dosen" name="foto_dosen" accept="image/jpeg, image/png">
                                            <!-- tampil nama gambar lama -->
                                            <input type="hidden" class="form-control" id="gambar_lama" name="gambar_lama" value="{{ $dosen->foto_dosen }}">

                                            <!--  -->
                                        </div>
                                        @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning">Edit</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
@endsection