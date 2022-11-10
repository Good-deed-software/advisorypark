<script>
    /*----open comment box-------*/
    function openComment(id){
        console.log(id);

        $('#comment-box-'+id).slideToggle();
    }

    $(document).ready(function(){
        var url = window.location.href;
        var activeTab = url.substring(url.indexOf("#") + 1);
        // $(".tab-pane").removeClass("active in");
        // $("#" + activeTab).addClass("active in");
        // $('a[href="#'+ activeTab +'"]').tab('show')

        $(".share").on('click',function(){
            $(".social-media-icons").fadeToggle();
        });
        
        /*---------My Profile--------------*/
        $('#profile-form').validate({
            rules: {
                name : {
                    required: true,
                    minlength: 5
                },
                gender: {
                    required: true,
                },
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                contact: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                email: {
                    required: true,
                    email:true
                },
                work_status: {
                    required: true,
                },
                skills: {
                    required: true,
                },
                
            },
            messages: {
                name : {
                    required: "Enter Your Name",
                },
                    gender : {
                    required: "Select Your Gender",
                },
                    country : {
                    required: "Select Your Country",
                },
                state : {
                    required: "Select Your State",
                },
                city : {
                    required: "Enter Your City",
                },
                contact : {
                    required: "Enter Your Contact No.",
                    minlength: "Phone number should be 10 digit",
                    maxlength: "Phone number should be 10 digit"
                },
                email : {
                    required: "Enter Your Email-address",
                    email: "Enter Valid Email-address",
                },
                work_status : {
                    required: "Select Your Work Status",
                }
            },
            submitHandler: function(form) 
            {
                
                var form = $('#profile-form')[0];
                var datas = new FormData(form); 
            
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $('.process-comm').css("display", "block");
                $.ajax({
                    url: "{{route('profile.update')}}", 
                    type: "POST",             
                    data: datas,
                    cache: false,             
                    processData: false,
                    contentType: false,
                    dataType: "json",  
                    
                    success: function(data) 
                    {
                        $('.process-comm').css("display", "none");
                    
                        if(data.status == true){
                        toastr.success("Success!", data.message);
                        location.reload();
                        }else{
                        toastr.error("Opps!", data.message);
                        location.reload();
                        }
                    }
                });
                return false;
            },
        });
        
        $('[data-toggle="tooltip"]').tooltip();
        
        $('#example').DataTable({
            'dom': 'Rlfrtip',
            columnDefs: [ {
                className: 'dtr-control',
                orderable: false,
                targets:   0
            } ],
            order: [ 1, 'asc' ]
        } );
        $('#example1').DataTable({
            columnDefs: [ {
                className: 'dtr-control',
                orderable: false,
                targets:   0
            } ],
            order: [ 1, 'asc' ]
        } );

        $('.example').DataTable({
            responsive: {
                details: {
                    type: 'column'
                }
            }
        } );

        /*---------Profile Image--------------*/
        $("a[id='image']").click(function() {
            $("input[id='my_file']").click();
        });
        
        $("#my_file").change(function() {
            
            var img = $(this).prop('files')[0];
            var id = $(this).data('id');
            var form_data = new FormData(); 
                form_data.append("image", img) 
                form_data.append("id",id) 
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url: "{{route('profile.update')}}",
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.status == true){
                            toastr.options.timeOut = 1500; // 1.5s
                            toastr.success(data.message);
                            location.reload();
                    }else{
                        toastr.options.timeOut = 1500; // 1.5s
                            toastr.error('Something went wrong!');
                            location.reload();
                    }
                },
                error: function(data){
                    console.log("error");
                }
            });
                
            });
            
        /*---------Cover Image--------------*/
        $("a[id='cover']").click(function() {
            $("input[id='my_cover']").click();
        });
        
        $("#my_cover").change(function() {
            
            var cover_img = $(this).prop('files')[0];
            var id = $(this).data('id');
            var form_data = new FormData(); 
                form_data.append("cover_image", cover_img) 
                form_data.append("id",id) 
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url: "{{route('profile.update')}}",
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.status == true){
                            toastr.options.timeOut = 1500; // 1.5s
                            toastr.success(data.message);
                            location.reload();
                    }else{
                        toastr.options.timeOut = 1500; // 1.5s
                            toastr.error('Something went wrong!');
                            location.reload();
                    }
                },
                error: function(data){
                    console.log("error");
                }
            });
                
            });
            

            /*---------Business Profile--------------*/
        
        
            $('#business-profile').validate({
            rules: {
                org_name : {
                    required: true,
                    minlength: 5
                },
                org_address_line_1: {
                    required: true,
                },
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                about_org : {
                    required: true,
                }                  
            },
            messages: {
                org_name : {
                    required: "Enter Your Organization Name",
                },
                org_address_line_1 : {
                    required: "Enter Your Organization Address",
                },
                    country : {
                    required: "Select Your Country",
                },
                state : {
                    required: "Select Your State",
                },
                city : {
                    required: "Enter Your City",
                },
                about_org : {
                    required: "Write About Your Organization",
                }
            },
            submitHandler: function(form) 
            {

                var form = $('#business-profile')[0];
                var datas = new FormData(form); 
            
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{route('business-profile.create')}}", 
                    type: "POST",             
                    data: datas,
                    cache: false,             
                    processData: false,
                    contentType: false,
                    dataType: "json",  
                    
                    success: function(data) 
                    {
                    
                        if(data.status == true){
                        toastr.success("Success!", data.message);
                        location.reload();
                        }else{
                        toastr.error("Opps!", data.message);
                        location.reload();
                        }
                    }
                });
                return false;
            },
        });
        
        
        $('body').on('click', '.editbp', function () {
            
            var id = $(this).data('id');
            
            $.get("{{ url('business-profile-edit') }}" +'/' + id, function (data) {
                $('#exampleModalLabel1').html("Edit Business Profile");
                $('#bpBtn').text("Update");
                $('.business-profile-modal').modal('show');
                
                $('#bpid').val(data.id);
                $('#org_name').val(data.org_name);
                $('#org_address_line_1').val(data.org_address_line_1);
                $('#org_address_line_2').val(data.org_address_line_2);
                $('#country').find('option[value="' + data.country + '"]').attr("selected", "selected");
                $('#state').find('option[value="' + data.state + '"]').attr("selected", "selected");
                $('#city').val(data.city);
                $('#pincode').val(data.pincode);
                $(".org_type").each(function(x,y){
                    if(data.org_type.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                });
                $('#about_org').val(data.about_org);
                $('#iso_cert').find('option[value="' + data.iso_cert + '"]').attr("checked", "checked");
                $(".iso_cert").each(function(x,y){
                    if(data.iso_cert.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                });
                $('#desc_iso_cert').val(data.desc_iso_cert);
                $(".achievement").each(function(x,y){
                    if(data.achievement.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                }); 
                $('#desc_achievement').val(data.desc_achievement);
                $('#about_listing').val(data.about_listing);
                $(".trademark").each(function(x,y){
                    if(data.trademark.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                }); 
                $('#desc_trademark').val(data.desc_trademark);
                $(".business_sector").each(function(x,y){
                    if(data.business_sector.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                });
                var nature_of_business = JSON.parse(data.nature_of_business);
                $(".nature_of_business").each(function(x,y){
                    if(nature_of_business.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                });

                /* $('.org_img').attr('id',"org_img_"+data.id);
                var org_img = data.org_images.split(',');
                console.log(org_img);
                org_img.forEach(function(x,y){
                console.log(x);
                        var path = "{{asset('front/images/business_profile')}}/"+x;
                        $('#org_img_'+y).attr('src', path);   
                        <img src="" class="org_img" height="80" width="80">
                }); */
                
            });
            $('body').on('click', '#bpBtn', function (e) {
                e.preventDefault();
                    
                    var editid = $('#bpid').val();
                    
                    var edit_form = $('#business-profile')[0];
                    var edit_datas = new FormData(edit_form); 
                //   alert(edit_datas.valid());

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        url: "{{ url('business-profile-update') }}" +'/' + editid,
                        type: "POST",             
                        data: edit_datas,
                        cache: false,             
                        processData: false,
                        contentType: false,
                        dataType: "json",  
                        
                        success: function(data) 
                        {
                        //  $('.loader_gif').css("display", "none");
                        
                        $('#business-profile').trigger("reset");
                        $('#business-profile-modal').modal('hide');
                            if(data.status == true){
                            toastr.success("Success!", data.message);
                            location.reload();
                            }else{
                            toastr.error("Opps!", data.message);
                            location.reload();
                            }
                        }
                    });
                });
            });

            $(".deletebp").click(function(){
            var id = $(this).data("id");
            var token = "{{csrf_token()}}";
            $.ajax(
            {
                url: "{{ url('business-profile-delete') }}" +'/' + id,
                type: 'Delete',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (data)
                {
                    if(data.status == true){
                            toastr.error("Success!", data.message);
                            location.reload();
                    }else{
                    toastr.error("Opps!", data.message);
                    location.reload();
                    }
                }
            });
        });


        $('.iso_cert').on('click', function(){
        
            var get_val = $(this).attr('value');
            if(get_val=='1'){
                $('#desc_iso_cert').css('display', 'block');
            }else{
                $('#desc_iso_cert').css('display', 'none');
            }
        });

        $('.achievement').on('click', function(){
            
            var get_val = $(this).attr('value');
            if(get_val=='1'){
                $('#desc_achievement').css('display', 'block');
            }else{
                $('#desc_achievement').css('display', 'none');
            }
        });

        $('.trademark').on('click', function(){
            
            var get_val = $(this).attr('value');
            if(get_val=='1'){
                $('#desc_trademark').css('display', 'block');
            }else{
                $('#desc_trademark').css('display', 'none');
            }
        });

            
        /*---------Advisory Listing--------------*/
        
        
        $('#advisory-listing').validate({
            submitHandler: function(form) 
            {

                var form = $('#advisory-listing')[0];
                var datas = new FormData(form); 
            
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{route('advisory-listing.create')}}", 
                    type: "POST",             
                    data: datas,
                    cache: false,             
                    processData: false,
                    contentType: false,
                    dataType: "json",  
                    
                    success: function(data) 
                    {
                    //  $('.loader_gif').css("display", "none");
                    
                        // $('#companydata').trigger("reset");
                        // $('#modal-id').modal('hide');
                        if(data.status == true){
                        toastr.success("Success!", data.message);
                        location.reload();
                        }else{
                        toastr.error("Opps!", data.message);
                        location.reload();
                        }
                    }
                });
                return false;
            },
        });
        
        
        $('body').on('click', '.edit', function () {
            
            var id = $(this).data('id');
            
            $.get("{{ url('advisory-listing-edit') }}" +'/' + id, function (data) {
                $('#exampleModalLabel1').html("Edit Advisory Listing");
                $('#saveBtn').text("Update");
                $('.advisory-listing-modal').modal('show');
                
                
                $('#id').val(data.id);
                $('#type').find('option[value="' + data.type + '"]').attr("selected", "selected");
                $('#category').find('option[value="' + data.category + '"]').attr("selected", "selected");
                $('#listing_name').val(data.listing_name);
                $('#duration_in_hours').val(data.duration_in_hours);
                $('#duration_in_minutes').val(data.duration_in_minutes);
                $('#fees').val(data.fees);
                $('#about_listing').val(data.about_listing);
                $('#experience').val(data.experience);
                $('#exp_in_years').val(data.exp_in_years);
                $('#exp_in_months').val(data.exp_in_months);
                
                var mode = JSON.parse(data.mode);
                $(".mode").each(function(x,y){
                    if(mode.includes($(this).val())){
                        $(this).attr('checked', true);
                    }
                });
            });
            $('body').on('click', '#saveBtn', function (e) {
                    
                e.preventDefault();
                var editid = $('#id').val();
                //   alert(editid);
                
                var edit_form = $('#advisory-listing')[0];
                var edit_datas = new FormData(edit_form); 
                //   alert(edit_datas.valid());

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        url: "{{ url('advisory-listing-update') }}" +'/' + editid,
                        type: "POST",             
                        data: edit_datas,
                        cache: false,             
                        processData: false,
                        contentType: false,
                        dataType: "json",  
                        
                        success: function(data) 
                        {
                        //  $('.loader_gif').css("display", "none");
                        
                        $('#advisory-listing').trigger("reset");
                        $('#advisory-listing-modal').modal('hide');
                            if(data.status == true){
                            toastr.success("Success!", data.message);
                            location.reload();
                            }else{
                            toastr.error("Opps!", data.message);
                            location.reload();
                            }
                        }
                    });
                });
        });


        $(".delete").click(function(){
            var id = $(this).data("id");
            var token = "{{csrf_token()}}";
            $.ajax(
            {
                url: "{{ url('advisory-listing-delete') }}" +'/' + id,
                type: 'Delete',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (data)
                {
                    if(data.status == true){
                            toastr.error("Success!", data.message);
                            location.reload();
                    }else{
                    toastr.error("Opps!", data.message);
                    location.reload();
                    }
                }
            });
        });

        
        /*----show more/show less-------*/
        var showChar = 200;  
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";
        
    
        $('.more').each(function() {
            var content = $(this).html();
        
            if(content.length > showChar) {
        
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
        
                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
        
                $(this).html(html);
            }
        
        });
        
        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });


        /* Posts Edit Popup */

        $('body').on('click', '.editPost', function () {
            
            var id = $(this).data('id');
            let route = "{{route('post.update')}}";

        
            $.get("{{ url('post-edit') }}" +'/' + id, function (data) {
                $("#post_form").attr('action',route);

                $('#saveBtn').text("Update");
                $(".post-popup.job_post").addClass("active");
                $(".wrapper").addClass("overlay");
                
                $('#post_id').val(data.id);
                $('#post_title').val(data.title);
                
                var categories = data.category.split(',');
                var skills = data.skill.split(',');
                var tags = data.tag.split(',');

                $('#category_p').val(categories);
                $('#category_p').trigger("change");

                $('#skill_p').val(skills);
                $('#skill_p').trigger("change");
                
                $('#tag_p').val(tags);
                $('#tag_p').trigger("change");

                $('#post_description').text(data.description);
            });
        }); 
        /* Posts Edit Popup */
        /* Posts delete */
        $(".deletePost").click(function(){
            let r = confirm('Do you really want to delete this post ?');

            if(r == true){
                var id = $(this).data("id");
                var token = "{{csrf_token()}}";
                $.ajax(
                {
                    url: "{{ url('post-delete') }}" +'/' + id,
                    type: 'Delete',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (data)
                    {
                        if(data.status == true){
                                toastr.error("Success!", data.message);
                                location.reload();
                        }else{
                            toastr.error("Opps!", data.message);
                            location.reload();
                        }
                    }
                });
            }

        });
        /* Posts delete */


        /* Requirements Edit Popup */

        $('body').on('click', '.editRequirement', function () {
            
            var id = $(this).data('id');
            let route = "{{route('requirements.update')}}"; 

        
            $.get("{{ url('requirements-edit') }}" +'/' + id, function (data) {
                $("#requirements_form").attr('action',route);

                $('#saveBtn').text("Update");
                $(".requirements-popup.job_post").addClass("active");
                $(".wrapper").addClass("overlay");
                
                $('#requirements_id').val(data.id);
                $('#requirements_title').val(data.title);
                
                var categories = data.category.split(',');
                var skills = data.skill.split(',');
                var tags = data.tag.split(',');

                $('#category_r').val(categories);
                $('#category_r').trigger("change");

                $('#skill_r').val(skills);
                $('#skill_r').trigger("change");
                
                $('#tag_r').val(tags);
                $('#tag_r').trigger("change");

                $('#requirements_description').text(data.description);
            });
        }); 
        /* Requirement Edit Popup */
        /* Requirement delete */
        $(".deleteRequirement").click(function(){
            let r = confirm('Do you really want to delete this requirement ?');

            if(r == true){
                var id = $(this).data("id");
                var token = "{{csrf_token()}}";
                $.ajax(
                {
                    url: "{{ url('requirements-delete') }}" +'/' + id,
                    type: 'Delete',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (data)
                    {
                        if(data.status == true){
                                toastr.error("Success!", data.message);
                                location.reload();
                        }else{
                            toastr.error("Opps!", data.message);
                            location.reload();
                        }
                    }
                });
            }

        });
        /* Requirement delete */


    });      
        
</script>
	
<script>
    /* Change Status Advisory Request */
    function reqAccept(_this, status, id) {
        // alert(status);
        $.ajax({
            url: "{{route('change_status')}}",
            type: "POST",
            data: { status: status, _token: "{{csrf_token()}}", id: id },
            success: function (response) {
                if (response.status == true) {
                    toastr.success("Success!", response.message);
                    _this.closest("td").remove();
                    location.reload();
                } else {
                    toastr.error("Opps!", response.message);
                    location.reload();
                }
            },
        });
    }
    function reqClose(_this, status, id) {
        //  alert(status);
        $("#myModal").modal("show");
        $(".reason_save").click(function () {
            var reason = $("textarea#reason").val();
            if (!reason) {
                alert("Reason is required!");
            } else {
                $.ajax({
                    url: "{{route('change_status')}}",
                    type: "POST",
                    data: { status: status, _token: "{{csrf_token()}}", id: id, reason: reason },
                    success: function (response) {
                        if (response.status == true) {
                            $("#myModal").modal("toggle");
                            toastr.error("Opps!", response.message);
                            _this.closest("td").remove();
                            location.reload();
                        } else {
                            $("#myModal").modal("toggle");
                            toastr.error("Opps!", response.message);
                            location.reload();
                        }
                    },
                });
            }
        });
    }
    function reqPayment(_this, status, id) {
        alert(status);
        $.ajax({
            url: "{{route('change_status')}}",
            type: "POST",
            data: { status: status, _token: "{{csrf_token()}}", id: id },
            success: function (response) {
                if (response.status == true) {
                    toastr.success("Success!", response.message);
                    _this.closest("td").remove();
                    location.reload();
                } else {
                    toastr.error("Opps!", response.message);
                    location.reload();
                }
            },
        });
    }
    function satisfy(_this, status, id) {
        $("#myModal1").modal("show");
        $(".feedback_save").click(function () {
            var feedback = $("textarea#feedback").val();
            $.ajax({
                url: "{{route('change_status')}}",
                type: "POST",
                data: { status: status, _token: "{{csrf_token()}}", id: id, feedback: feedback },
                success: function (response) {
                    if (response.status == true) {
                        $("#myModal1").modal("toggle");
                        toastr.success("Success!", response.message);
                        _this.closest("td").remove();
                        location.reload();
                    } else {
                        $("#myModal1").modal("toggle");
                        toastr.error("Opps!", response.message);
                        location.reload();
                    }
                },
            });
        });
    }
    function disSatisfy(_this, status, id) {
        //  alert(status);
        $("#myModal1").modal("show");
        $(".feedback_save").click(function () {
            var feedback = $("textarea#feedback").val();
            if (!feedback) {
                alert("Please Give Your Feedback..!");
            } else {
                $.ajax({
                    url: "{{route('change_status')}}",
                    type: "POST",
                    data: { status: status, _token: "{{csrf_token()}}", id: id, feedback: feedback },
                    success: function (response) {
                        if (response.status == true) {
                            $("#myModal1").modal("toggle");
                            toastr.error("Opps!", response.message);
                            _this.closest("td").remove();
                            location.reload();
                        } else {
                            $("#myModal1").modal("toggle");
                            toastr.error("Opps!", response.message);
                            location.reload();
                        }
                    },
                });
            }
        });
    }
</script>