@extends('layout.mainlayout')

@section('title', 'Home')
    
@section('content')
        <h1> ini halaman home </h1>
        <h2>selamat datang {{ $name }}, anda adalah {{ $role }}</h2>

        <table class="table">
            <tr>
                <th>no.</th>
                <th>nama</th>
            </tr>
            @foreach ($buah as $data)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td> {{ $data }}</td>
            </tr>
            @endforeach
        </table>
      

        {{-- @if($role == 'admin')
            <a href=""> kehalaman admin >></a>
        @elseif($role == 'staff')
            <a href="">kehalaman gudang >></a>
        @else
            <a href="">kehalaman whatever >></a>
        @endif --}}
 @endsection
