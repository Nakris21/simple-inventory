@extends('layouts.main')

@section('header')
   <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
    </div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
           <a href="/products/create" class="btn btn-sm btn-primary float-right">Tambah Produk</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Description</th>
                  <th>Kode Barang</th>
                  <th>harga</th>
                  <th>Stok</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
               <tbody>
               @foreach ( $products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->sku }}</td>
                  <td>{{ number_format($product->price, 2) }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>{{ $product->category->name}}</td>
                  <td>
                    <div class="d-flex ">
                    <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning">
                    Ubah</a>
                    <form action="/products/{{ $product->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      HAPUS
                    </button>
                    </form>
                  </td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection