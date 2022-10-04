<div class="product-feed-tab" id="letsconnect-dd">
    <div class="user-profile-ov">
        <h3>
            <a href="#" title="" class="overview-open">Let's Connect</a> 
            <!--<button type="button" title="" class="overview-open w-25 float-right form-control" ><i class="fa fa-plus"></i> Add Business Profile</button>-->
        </h3>
        <div class="table-responsive">
            <table id="example" class="table display responsive" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Request Sent To</th>
                        <th scope="col">Request Sent date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">My Requirement</th>
                        <th scope="col">Type</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_sent as $k => $data)
                    <tr>
                        <th scope="row">{{++$k}}</th>
                        <td>{{$data->listing_user->name}}</td>
                        <td>{{date('M d,Y h:i A',strtotime($data->created_at))}}</td>
                        <td>{{$data->listing_name}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->type}}</td>
                        <td>
                            @if($data->status == '4' || $data->status == '5' || $data->status == '6'){{$data->listing_user->contact}} @endif
                        </td>
                        <td>
                            <span class="badge @if($data->status == '1') badge-warning @elseif($data->status == '2') badge-success @elseif($data->status == '3') badge-danger @elseif($data->status == '4') badge-info @elseif($data->status == '5') badge-success @elseif($data->status == '6') badge-secondary @endif">
                                @if($data->status == '1') Pending @elseif($data->status == '2') Accepted @elseif($data->status == '3') Rejected @elseif($data->status == '4') Payment Done @elseif($data->status == '5') Satisfied @elseif($data->status == '6') Dissatisfied @endif
                            </span>@if($data->status == '3') ({{$data->reason_for_reject}}) @endif
                        </td>
                        
                        <td>
                            @if($data->status == '2')

                            <button class="btn btn-sm mb-1 payment theme-bg" onclick="reqPayment(this,4,'{{$data->id}}');" data-toggle="tooltip" data-placement="top" title="Payment" >Payment</button>
                            @elseif($data->status == '3' || $data->status == '4')
                            <button class="btn btn-success btn-sm mb-1"  onclick="satisfy(this,5,'{{$data->id}}');" data-toggle="tooltip" data-placement="top" title="Satisfy" >Satisfy</button>
                            <button class="btn btn-danger btn-sm mb-1"  onclick="disSatisfy(this,6,'{{$data->id}}');" data-toggle="tooltip" data-placement="top" title="Dissatisfy" >Dissatisfy</button>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>									    	
        </div>	
    </div>	
</div>