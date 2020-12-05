<x-backend>
	<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
            	Create New Item

            	<a href="{{ route('item.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>

            </h6>

        </div>
        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            
            @csrf

           {{--  <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="codeno"> Codeno </label>
                        <input type="text" id="codeno" name="codeno">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('codeno') }}
                        </div>
                    </div>
                </div> --}}

               

                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="photo"> Photo </label>
                        <input type="file" id="photo" name="photo">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control" id="name" placeholder="Computer" name="name">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>

                 <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="price"> Price </label>
                        <input type="number" id="price" name="price">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="discount"> Discount </label>
                        <input type="number" id="discount" name="discount">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('discount') }}
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="description"> Description </label>
                        <input type="text" id="description" name="description">

                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>
                </div>

                 <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Subcategory</label>
                        <select class="form-control" name="subcategory_id">
                            @foreach($subcategories as $subcategory)
                            
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Brand</label>
                        <select class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                            
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-secondary text-uppercase mr-2"> 
                    <i class="fas fa-times mr-2"></i> Cancel 
                </button>
                <button type="submit" class="btn btn-primary text-uppercase"> 
                    <i class="fas fa-save mr-2"></i> Save 
                </button>
            </div>
        </form>

    </div>
</x-backend>