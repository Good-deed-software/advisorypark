<div class="product-feed-tab" id="advisory-listing-dd">
    <div class="user-profile-ov">
        <h3>
            <a href="#" title="" class="overview-open">Advisory Listing</a> 
            <!--<button type="button" title="" class="overview-open w-25 float-right form-control" ><i class="fa fa-plus"></i> Add Business Profile</button>-->
            <button type="button" class="btn w-25 float-right advisory-listing-jb theme-bg text-light"  data-toggle="modal" data-target=".advisory-listing-modal" ><i class="fa fa-plus text-light"></i> Add Advisory Listing</button>
        </h3>
        <!--<table class="table">-->
        <div class="table-responsive">
            <table id="example" class="table display responsive" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Listing Name</th>
                        <th scope="col">Advisory Type</th>
                        <th scope="col">Advisory Category</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Available</th>
                        <th scope="col">Description</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Action</th>					
                    </tr>
                </thead>
                <tbody>
                    @foreach($advisory_listings as $k=>$data)
                        <tr >
                            <td>{{++$k}}</td>
                            <td>{{$data->listing_name}}</td>
                            <td>{{$data->types->name}}</td>
                            <td>{{$data->categories->name}}</td>
                            <td>{{$data->duration_in_hours}} Hrs,{{$data->duration_in_minutes}} Mins</td>
                            <td>{{$data->fees}}</td>
                            <td>
                                @php $mode = json_decode($data->mode)@endphp 
                                @foreach($mode as $v)
                                {{$v}},
                                @endforeach
                            </td>
                            <td>{{$data->about_listing}}</td>
                            <td>{{$data->experience}}</td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-info btn-sm edit mr-1 mb-1" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-id="{{$data->id}}"><i class="fa fa-edit"></i></button> 
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm delete" type="button" data-toggle="tooltip" data-placement="top" title="Delete" data-id="{{$data->id}}" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  	
    </div>	
</div>