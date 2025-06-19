@extends('layout.app')


@section('konten')
    <div class="content-wrapper">

    <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Edit Produk</h5>
            
            
          </div>
        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Edit Produk </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
                    <form class="forms-sample" action="{{ route('penjual.updateproduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
    
<select name="category_id" id="code" class="form-control">
    <option value="">Pilih Kategori</option>
    @foreach ($kategori as $kg)
        <option value="{{ $kg->id }}" {{ $produk->category_id == $kg->id ? 'selected' : '' }}>
            {{ $kg->name }}
        </option>
    @endforeach
</select>


                        <div class="form-group">
                          <label for="code">Nama produk</label>
                          <input type="text" class="form-control" id="code" placeholder="nama_produk" name="name" value="{{ $produk->name }}">
                        </div>

                        <div class="form-group">
                          <label for="code">Gambar</label>
                          <input type="file" class="form-control" id="code" placeholder="gambar" name="gambar" >
                          @if ($produk->gambar)
                          <div>
                            <img src="{{ asset('storage/'. $produk->gambar) }}" alt="Gambar Produk" width="150">
                          </div>
                              
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="code">Harga</label>
                          <input type="number" class="form-control" id="code" placeholder="harga" name="price" value="{{ $produk->price }}">
                        </div>
                        
                        <div class="form-group">
                          <label for="code">Deskripsi</label>
                          <input type="text" class="form-control" id="code" placeholder="Deskripsi" name="description" value="{{ $produk->description }}">
                        </div>
  
                        <div class="form-group">
                          <label for="code">Stok</label>
                          <input type="number" class="form-control" id="code" placeholder="stok" name="stock_quantity" value="{{ $produk->stock_quantity }}">
                        </div>

                                     
                     
              

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection