$(document).ready(function () {
  ajaxRequest();
  checkLinkAPI();
});

function checkLinkAPI() {
  $.ajax({
     url: 'checkLinkAPI.php',
     success: function(data) {
       console.log(data);
       if (data == "no_account") {
         swal({
            title: "iAuditor Account Not Found",
            text: "Please link your iAuditor account now to get access to Workspace Inspection Portal!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Link Now",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
              linkAPI();
            } else {
              swal("Cancelled", "You may link your iAuditor account later!", "error");
              $("#linkAPI").css("display", "block");
            }
            });
       } else if (data == "expired_token") {
         swal({
            title: "iAuditor Token Expired",
            text: "Please link your iAuditor account again to get access to Workspace Inspection Portal!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Link Now",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
              linkAPI();
            } else {
              swal("Cancelled", "You may link your iAuditor account later!", "error");
              $("#linkAPI").css("display", "block");
            }
            });
       }
     }
  });
}

function ajaxRequest () {
  $.ajax({
     url: 'UQname.php',
     success: function(data) {
       $("#welcomeName").html(data);
     }
  });
}

function linkAPI () {
  swal.withForm({
    title: 'Link your WIP account with your iAuditor account now!',
    text: 'Type in your iAuditor details',
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Submit',
    closeOnConfirm: false,
    closeOnCancel: true,
    showLoaderOnConfirm: true,
    formFields: [
      { name: 'username', placeholder: 'iAuditor Login', required: true },
      { name: 'password', type: 'password', placeholder: 'iAuditor Password', required: true }
    ]
  }, function(isConfirm) {
    // do whatever you want with the form data
    if (isConfirm) {
      var str = $.param(this.swalForm);
      var posting = $.post("getAuthToken.php", str);
      posting.done(function( data ) {
        var obj = JSON.parse(data);
        if (obj.insertion == "success") {
          swal("Good job!", "You have successfully linked your iAuditor account", "success");
          $("#linkAPI").css("display", "none");
        } else {
          swal(obj.error, obj.error_description, "error");
          $("#linkAPI").css("display", "block");
        }
      });
    } else {
      $("#linkAPI").css("display", "block");
    }
  })
}

function myFunction() {
    var x = document.getElementById("myDate").value;
    document.getElementById("demo").innerHTML = x;
}
