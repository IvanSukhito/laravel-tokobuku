@extends('layouts.global')
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"  />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6- rc.0/js/select2.min.js"></script>

@endsection
@section('title')  Create  book @endsection

@section('content')
    Form   create di sini
    
  <div  class="row">
                 <div  class="col-md-8">
                 <form
                          action="{{route('books.store')}}"
                           method="POST"
                           enctype="multipart/form-data"
                           class="shadow-sm  p-3 bg-white"
                           >

                           @csrf

                           <label  for="title">Title</label>  <br>
                           <input  type="text"  class="form-control"  name="title"
        placeholder="Book  title">
                           <br>
                           <label  >Categories</label><br>
                           
                            <select
                                name="categories" class="form-control" > 
                                @foreach ($categories as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                 @endforeach
                            </select>
                           
                            <br><br/>

                           <label  for="cover">Cover</label>
                           <input  type="file"  class="form-control"  name="cover">
                           <br>

                           <label  for="description">Description</label><br>
                           <textarea  name="description"  id="description"  class="form-
        control" placeholder="Give  a description about this  book"></textarea>
                           <br>

                           <label  for="stock">Stock</label><br>
                           <input  type="number"  class="form-control"  id="stock"  name="stock"
        min=0  value=0>
                           <br>

                           <label  for="author">Author</label><br>
                           <input  type="text"  class="form-control"  name="author" id="author"
        placeholder="Book  author">
                           <br>

                           <label  for="publisher">Publisher</label>     <br>
                           <input  type="text"  class="form-control"  id="publisher"
        name="publisher"  placeholder="Book  publisher">
                           <br>

                           <label  for="Price">Price</label>  <br>
                           <input  type="number"  class="form-control"  name="price"  id="price"
        placeholder="Book  price">
                           <br>

                           <button
                                class="btn  btn-primary"
                                name="save_action"
                                value="PUBLISH">Publish</button>

                           <button
 	class="btn  btn-secondary" name="save_action"
value="DRAFT">Save as  draft</button>
</form>
</div>
<script>
        $('#categories').select2({

            ajax:  {url:  'http://127.0.0.1:8000/ajax/categories/search', processResults:  function(data){
                      return  {
                           results:  data.map(function(item){return  {id:  item.id, text:item.name} })
                      }
                  }
             }
        });
</script>
@endsection