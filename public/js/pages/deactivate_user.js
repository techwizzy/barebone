
function deactivate_user(event) {
    let id = event.getAttribute('data-id');
    // alert(id);
        swal.fire({
            title: "Are you sure?",
            text: "You can activate the user later!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, deactivate user!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ml-2 mt-2",
            buttonsStyling: !1
        }).then((willDelete) => {
                if (willDelete.value) {
                    $.ajax({
                        type:'POST',
                        url: '{!! url('access/users/delete-user') !!}',
                        data:{
                            id : id,
                            "_token" : "{{csrf_token()}}",
                        },
                        success:function (response) {
                            swal.fire({
                                type: "success",
                                text:"User Successfully deactivated!"

                            });
                          //  $("#"+id+"").remove(); //remove the tr without refreshing
                            setTimeout(function(){  location.reload(); }, 5000);

                        }
                    }); // ajax end

                } else {
                    swal.fire({
                        title:"The user has not been deactivated!",
                        type: "warning"
                    });
                }
            });
        }

