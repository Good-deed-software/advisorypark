<div class="product-feed-tab" id="myrequirments-dd">
    <div class="user-profile-ov">
        <h3>
            <a href="#" title="" class="overview-open">My Requirment</a> 
            <!--<button type="button" title="" class="overview-open w-25 float-right form-control" ><i class="fa fa-plus"></i> Add Business Profile</button>-->
        </h3>
        <div class="table-responsive">
            <table id="example1" class="table display responsive" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Skill</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created by</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requirements as $k => $data)
                    <tr>
                        <th scope="row">{{++$k}}</th>
                        <td>{{$data->title}}</td>
                        @php 
                            $cats = getPostCategories($data->category); 
                            $skills = getPostSkills($data->skill);
                            $tags = getPostTags($data->tag);
                        @endphp
                        
                        <td>@foreach($cats as $v) {{$v}}, @endforeach</td>
                        
                        <td>@foreach($skills as $v) {{$v}}, @endforeach</td>
                        <td>@foreach($tags as $v) {{$v}}, @endforeach</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->users->name}}</td>
                        <td>
                            <button class="btn btn-info btn-sm editRequirement mr-1" data-toggle="tooltip" data-placement="top" title="Edit" data-id="{{$data->id}}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm deleteRequirement" data-toggle="tooltip" data-placement="top" title="delete" data-id="{{$data->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>	
    </div>
</div>