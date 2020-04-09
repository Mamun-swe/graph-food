@extends('layouts.app')
@section('content')

<div class="container-fluid py-4 py-lg-5 voucher">
    <div class="row">
        <div class="col-12 col-lg-6 m-auto">
            <div class="card rounded-0 border-0 shadow-none mb-5" id="print-voucher">
                <div class="card-header bg-white pt-4">
                    <div class="d-flex">
                        <div>
                           @if($user[0])
                            <h6 class="text-capitalize mb-0"><b>{{$user[0]->user_name}}</b></h6>
                            <h6 class="mb-0">+880{{$user[0]->phone}}</h6>
                            <h6 class="text-capitalize">{{$user[0]->location}}</h6>
                            @endif
                        </div>
                        <div class="ml-auto">
                            <img src="{{url('')}}/website/static/logo.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center"><p class="mb-0"><b>SL</b></p></td>
                                <td><p class="mb-0 text-capitalize">Name</p></td>
                                <td class="text-center"><p class="mb-0 text-capitalize"><b>Quantity</b></p></td>
                                <td class="text-center"><p class="mb-0 text-capitalize"><b>Price</b></p></td>
                                <td class="text-center"><p class="mb-0 text-capitalize"><b>Total</b></p></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @foreach($data as $key => $item)
                            <tr>
                                <td class="text-center"><p class="mb-0">{{$key + 1}}</p></td>
                                <td><p class="mb-0 text-capitalize">{{$item->product_name}}</p></td>
                                <td class="text-center"><p class="mb-0">{{$item->quantity}}</p></td>
                                <td class="text-center"><p class="mb-0">{{$item->product_price}} Tk</p></td>
                                <td class="text-center"><p class="mb-0">{{$item->quantity * $item->product_price}} Tk</p></td>
                            </tr>
                            @php
                                $sum = $sum + $item->quantity * $item->product_price;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right mr-5 mt-2">
                        <h6><b>Total: {{$sum}} Tk</b></h6>
                    </div>
                </div>
            </div>

            <div class="card border-0 rounded-0 shadow-none" style="background: none;">
                <div class="card-body text-right p-0">
                    <input type="hidden" id="user_id" value="{{$uid}}">
                    <button type="button" class="btn btn-primary text-white rounded-0 shadow px-4" id="print">Accept & Print Voucher</button>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $("#print").click(function () {
        var data = {
            user_id: $('#user_id').val()
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            type: "POST",
            url: "{{route('admin.order.accept')}}",
            data: data,
            success:function(response){
              console.log(response);
              if(response == 'success'){
                $("#print-voucher").show();
                window.print();
              }
            },
            error: function (error) {
                if(error){
                  console.log(error);
                }
            }
        })


        
    });
</script>

@endsection