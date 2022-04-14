@extends('master')
@section("content")
<div class="custom-product">
     <div class="">
        <div class="trending-wrapper">
            <h1>my orders</h1>
            <a class="btn btn-success" href="ordernow">place order</a> <br> <br>
            @foreach($order as $item)
          
             <div class="col-sm-7">
                <a href="detail/{{$item->id}}">
                    <img class="trending-img" src="{{$item->gallery}}">
                  </a>
                  
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
                    
                 </div>
            @endforeach
            </div>
            </div>
          
</div>
@endsection 
