@extends('backend.layouts.master')
@section('main-content')
{{--  --}}
<div class="card">
    <h5 class="card-header">Add Product</h5>
    <div class="card-body">
    </div>
</div>
{{--  --}}
<div class="card-body">

{{-- fsgsdffh --}}
<div class="row">
  <div class="col-md-6">
    <div id="example-1" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
      <div class="row">
        <div class="col-md-3"><button type="button" id="btnAdd-1" class="btn btn-primary">Add section</button></div>
      </div>
      
      <form action="{{route('product.attributes',$product->id)}}" method="post">
        @csrf
      <div class="row group">
          <div class="col-md-2">
            <label for="">Size</label>
            <input class="form-control" type="text" name="size" placeholder="eg. S">
          </div>
          <div class="col-md-2">
            <label for="">Original Price</label>
            <input class="form-control" type="number" name="original_price" placeholder="eg. 1200">
          </div>
          <div class="col-md-2">
            <label for="">Offer Price</label>
            <input class="form-control" type="number" name="offer_price" placeholder="eg. 900">
          </div> 
          <div class="col-md-3">
            <label for="">Stock</label>
            <input class="form-control" type="number" name="stock" placeholder="eg. 56">
          </div>
        
          <div class="col-md-3">
            <button type="button" class="btn btn-sm btn-danger btnRemove">Remove</button>
          </div>
          <button type="submit" class="btn btn-sm btn-success">Submit </button>
      </div>
  </div>
</div>
<div class="col-md-6">
  <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Size</th>
        <th>Org.Price</th>
        <th>Of.Price</th>
        <th>Stock</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($productatr as $item)
      <tr>
        <td>{{$item->size}}</td>
        <td>{{$item->offer_price}}</td>
        <td>{{$item->stock}}</td>
        <td>{{$item->original_price}}</td>
        {{-- <td>
        <form method="POST" action="{{route('product_attributes_delete',[$item->id])}}">
          @csrf 
          @method('delete')
              <button class="btn btn-danger btn-sm dltBtn" data-id={{$item->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td> --}}

      </tr> 
      @endforeach
    </tbody>
  </table>
</div>

{{-- dfsdgfg --}}






{{--  --}}






@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="{{asset('backend/vendor/jquery-multifield-master/jquery.multifield.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>

  <script>
    $('#example-1').multifield();
  </script>
  


  
<script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                     form.submit();
                  } else {
                      swal("Your data is safe!");
                  }
              });
        })
    })
</script>



  <script>
    $('input[name=toogle]').change(function(){
      var mode=$(this).prop('checked');
      var id= $(this).val();
      // alert(id);
      $.ajex({
        url:"{{route('banner.status')}}",
        type:"POST";
        data:{
          _token:{{csrf_token()}} 
          mode:mode,
          id:id,
        }
        success:function (response){
          if(response.status){
            alert.(response.msg);
          }
        }
      });
    });
  </script>



  <script>
      
      $('#product-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>

@endpush