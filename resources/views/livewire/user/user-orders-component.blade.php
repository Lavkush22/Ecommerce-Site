<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                        </div>
                        <div class="panel-body">
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th>OrderId</th>
                                      <th>Subtotal</th>
                                      <th>Discount</th>
                                      <th>Tax</th>
                                      <th>Total</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Mobile</th>
                                      <th>Email</th>
                                      <th>Zipcode</th>
                                      <th>Status</th>
                                      <th>Order Date</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($orders as $order)
                                  <tr>
                                      <th>{{$order->id}}</th>
                                      <th>${{$order->subtotal}}</th>
                                      <th>${{$order->discount}}</th>
                                      <th>${{$order->tax}}</th>
                                      <th>${{$order->total}}</th>
                                      <th>{{$order->firstname}}</th>
                                      <th>{{$order->lastname}}</th>
                                      <th>{{$order->mobile}}</th>
                                      <th>{{$order->email}}</th>
                                      <th>{{$order->zipcode}}</th>
                                      <th>{{$order->status}}</th>
                                      <th>{{$order->created_at}}</th>
                                      <th><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></th>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          {{$orders->links()}}  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
