@extends('layouts.app')
@section('title', 'Daftar Dosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
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
            <div class="card-body">
                <a href="{{ route('dosen.tambah') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm mb-3">
                    <i class="bi bi-person-add"></i> Tambah Data Dosen</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Lihat</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Lihat</th>
                            <th>Hapus</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($dosen as $row)
                        <tr>
                            <td>{{ $row->nidn }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->tgl_lahir }}</td>
                            <td>
                                <a href="{{ route('dosen.tampil', $row->id) }}"><i class="bi bi-eye-fill" style="color: green;"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('dosen.hapus', $row->id) }}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection