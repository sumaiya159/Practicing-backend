@extends('layouts.app')
@section('content')

 <div class="container">
    <div class="justify-content-center row">
        <div class="col-md-8">
            <div class="p-4 text-end">
                <a href="{{ route('products.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
            </div>
            <div class="card card rounded-3 text-dark bg-warning fs-5 fw-semibold">
                <div class="card-header">
                    <div class="card-header fw-bold">Edit Product</div>  
                </div>
                <div class="card-body">
                    <form  method="post" action="{{ route('products.update', $product->id) }}">
                        @csrf
                         @method('PATCH')
                         <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-end">
                                {{ __('Name') }} :
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="category_id" class="col-md-4 col-form-label text-end">
                                {{ __('Category Id') }} :
                           </label>
                           <div class="col-md-6">
                            <select class="form-control" name="category_id" value="{{ $product->category->name }}" required autocomplete="category_id" autofocus >
                                @foreach ($categories as $category)                                          
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                    <div class="mb-3 row">
                        <label for="is_active" class="col-md-4 col-form-label text-end">
                            {{ __('Active Status') }} :
                        </label>
                        <div class="col-md-6">    
                            <select class="form-control" name="is_active" value="{{ $product->is_active }}" required autocomplete="is_active" autofocus >
                                  <option value="1">Active</option>
                                  <option value="0">Deactive</option>
                              </select>

                          @error('is_active')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                  
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn fs-5" style=" color:rgb(241, 169, 13) ;background-color: rgb(21, 21, 20)">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
 </div>
 @endsection