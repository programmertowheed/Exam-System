$(document).ready(function(){
    //Get subject list by department
    $("#department_id").change(function () {
        var department_id = $('#department_id').val();
        $("#subject_id").html("");
        var option ="<option value=''>Select Course</option>";
        if(department_id != ""){
            $.ajax({
                url:'crud/getsubject.php',
                method:'post',
                data:{department_id:department_id},
                dataType:'text',
                success:function(data){
                    if(data){
                        $("#subject_id").html(data);
                    }else{
                        $("#subject_id").html(option);
                    }
                }
            });
        }else{
            $("#subject_id").html(option);
        }
    });

    //Registration script
    $("#regsubmit").on('click',function() {
        var username  = $("#susername").val();
        var mobile    = $("#smobile").val();
        var email     = $("#semail").val();
        var password  = $("#spassword").val();
        var filter    = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(username=='' || mobile=='' || email=='' || password==''){
          var msg ="<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
          $('#msgrespons').html(msg);
          setTimeout(function(){
            $('#msgrespons span').fadeOut();
          },4000);
          return false;
        }
        if(!filter.test(email)){
          var msg ="<span style='color:red;font-size:18px'>Invalid Email Address!!</span>";
          $('#msgrespons').html(msg);
          setTimeout(function(){
            $('#msgrespons span').fadeOut();
          },4000);
          return false;
        }else{
          $.ajax({
            url:'crud/signup.php',
            method:'post',
            data:{username:username,email:email,mobile:mobile,password:password},
            dataType:'text',
            success:function(data){
              $("#signup").trigger("reset");
              if(data !=""){
                $('#msgrespons').html(data);
                setTimeout(function(){
                  $('#msgrespons span').fadeOut();
                },5000);
              }else{
                var msg ="<span style='color:red;font-size:18px'>Something wrong!!</span>";
                $('#msgrespons').html(msg);
                setTimeout(function(){
                  $('#msgrespons span').fadeOut();
                },4000);
              }
            }
          });

            return false;
        }
    });

    //Login script
    $("#loginsubmit").on('click',function() {
        var email     = $("#lemail").val();
        var password  = $("#lpassword").val();
        var filter    = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(email=='' || password==''){
          var msg ="<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
          $('#logrespons').html(msg);
          setTimeout(function(){
            $('#logrespons span').fadeOut();
          },4000);
          return false;
        }
        if(!filter.test(email)){
          var msg ="<span style='color:red;font-size:18px'>Invalid Email Address!!</span>";
          $('#logrespons').html(msg);
          setTimeout(function(){
            $('#logrespons span').fadeOut();
          },4000);
          return false;
        }else{
          $.ajax({
            url:'crud/signin.php',
            method:'post',
            data:{email:email,password:password},
            dataType:'text',
            success:function(data){
              $("#signin").trigger("reset");
              if(data !=""){
                if(data == "login"){
                  window.location="home.php";
                }else{
                  $('#logrespons').html(data);
                  setTimeout(function(){
                    $('#logrespons span').fadeOut();
                  },4000);
                }
              }else{
                var msg ="<span style='color:red;font-size:18px'>Something wrong!!</span>";
                $('#logrespons').html(msg);
                setTimeout(function(){
                  $('#logrespons span').fadeOut();
                },4000);
              }
            }
          });

            return false;
        }
    });






  });



