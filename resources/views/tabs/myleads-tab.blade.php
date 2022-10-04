<div class="product-feed-tab" id="myleads-dd">							
    <div class="user-profile-ov">
            <h3>
            <a href="#" title="" class="overview-open">Leads</a> 
            <!--<button type="button" title="" class="overview-open w-25 float-right form-control" ><i class="fa fa-plus"></i> Add Business Profile</button>-->
        </h3>
        <table class="table display responsive example" cellspacing="0" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Request From</th>
                    <th scope="col">Requested date</th>
                    <th scope="col">Subject</th>
                    <th scope="col">User Requirment</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advisory_request as $k => $data)
                <tr>
                    <th scope="row">{{++$k}}</th>
                    <td>{{$data->users->name}}</td>
                    <td>{{date('M d,Y h:i A',strtotime($data->created_at))}}</td>
                    <td>{{$data->listing_name}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->type}}</td>
                    <td>
                        <span class="badge @if($data->status == '1') badge-warning @elseif($data->status == '2') badge-success @elseif($data->status == '3') badge-danger @elseif($data->status == '4') badge-info @elseif($data->status == '5') badge-success @elseif($data->status == '6') badge-secondary @endif">
                        @if($data->status == '1') Pending @elseif($data->status == '2') Accepted @elseif($data->status == '3') Rejected @elseif($data->status == '4') Payment Done @elseif($data->status == '5') Satisfied @elseif($data->status == '6') Dissatisfied @endif
                        </span>@if($data->status == '6') ({{$data->feedback}}) @elseif($data->status == '5' && $data->feedback != null) ({{$data->feedback}})@endif
                    </td>
                    <td>
                        @if($data->status == '1')
                        <button class="btn btn-sm mb-1 theme-bg" onclick="reqAccept(this,2,'{{$data->id}}');" data-toggle="tooltip" data-placement="top" title="Accept" >Accept</i></button>
                        <button class="btn btn-danger btn-sm " onclick="reqClose(this,3,'{{$data->id}}');" data-toggle="tooltip" data-placement="top" title="Reject" >Reject</i></button>
                        
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>										    
    </div>	

</div>