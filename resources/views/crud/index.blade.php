{{-- pebungkus layout --}}
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">

                {{-- judul --}}
                
                <h2 class="text-center">Laravel  CRUD </h2>
                {{-- end judul --}}

                {{-- css style --}}
                <style type='text/css' >
                    .pagination li {
                        float:left;
                        list-style-type: none;
                        margin: 5px: 
                    }
                </style>
                {{-- end css style --}}
            
                <div class="text-center">
                    
                    <h3 >Data </h3>    
                
                    <a href="/crud/tambah"> Tambah pegawai</a><br/><br/>
                </div>
                
    
                {{-- Pencarian --}}
                <p>Cari Data Pegawai :</p>
                <form action="/crud/cari" method="GET">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}"> <br/>
                    <input class="btn btn-primary ml-3" type="submit" value="CARI">
                </form>
                {{-- end Pencarian --}}
            
            
                {{-- table --}}
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Perkenalan</th>
                        <th>lokasi</th>
                        <th>Cost</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($cruds as $c)
                        
                        <tr>
                            <td>{{ $c->nama }}</td>
                            <td>{{ $c->perkenalan }}</td>
                            <td>{{ $c->lokasi }}</td>
                            <td>{{ $c->cost }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/crud/edit/{{$c->id}}">Edit</a>
                                
                                <a class="btn btn-danger btn-sm" href="/crud/hapus/{{$c->id}}">Hapus</a>
            
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- end table --}}
                Halaman : {{ $cruds->currentPage() }} <br/>
                Jumlah Data : {{ $cruds->total() }} <br/>
                Data Per Halaman : {{ $cruds->perPage() }} <br/>
            
                {{-- custom pagination di view.pagination --}}
                {!! $cruds->links('vendor.pagination.custom') !!}
                {{-- {{ $cruds->links('vendor.pagination.default') }} --}}
                {{-- {!! $cruds->links() !!} --}}




            </div>
        </div>
    </div>

@endsection
