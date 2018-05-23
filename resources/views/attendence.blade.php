<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Student Attendence System</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        
    </head>
    <body style="margin:0;padding:0;">
      <div class="container" style="">
        <br>
        <h3 class="text-center">Student Attendence Form</h3><hr>       
        <div class="text-right"> <a href="{{ url('/') }}" >Home</a> | <a href="{{ url('/attendence-report') }}" >Attendence Report</a></div>
        <div class="alert alert-success" style="display:none"></div>
        <div class="col-md-8">
        
         <form id="myForm" method="post">
            <div class="form-group">
              <label for="name">Class</label>
              <select class="form-control selectpicker" name="class" id="class" required>
                <option value="">--Select--</option>
                <option value="Six">Six</option>
                <option value="Seven">Seven</option>
                <option value="Eight">Eight</option>
             </select>
            </div>
            <div class="form-group">
              <label for="type">Subject</label>
              <select class="form-control selectpicker" name="subject" id="subject" required>
                <option value="">--Select--</option>
                <option value="Bangla">Bangla</option>
                <option value="English">English</option>
                <option value="Math">Math</option>
             </select>
            </div>
            <div class="form-group">
               <label for="price">Roll</label>
               <input type="text" class="form-control" name="roll" id="roll" required>
             </div>
             <div class="form-group">
               <label for="price">Date</label>
               <input type="date" class="form-control" name="date" id="date" required>
             </div>
            <div class="form-group">
               <label for="price">Attendence</label>
               <div class="form-check">
                    <input class="form-check-input" name="attendence" value="Present" type="radio" id="attendence" checked>
                    <label class="form-check-label">Present</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="attendence" value="Absent" type="radio" id="attendence">
                    <label class="form-check-label" >Absent</label>
                </div>
             </div>
             <button class="btn btn-primary" id="ajaxSubmit" type="submit">Submit</button>
          </form>
        </div>
      </div>
     
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     
    <script>  
         $(document).ready(function(){            
                $('#ajaxSubmit').click(function(e){ 
                    
                     if ($('#class').val()==""){
                         alert("Class can't be empty!")
                         return false;
                     }
                     if ($('#subject').val()==""){
                         alert("Subject can't be empty!")
                         return false;
                     }
                     if ($('#roll').val()==""){
                         alert("Roll can't be empty!")
                         return false;
                     }
                                  
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });

                    
                $.ajax({                                 
                    url: "{{ url('/attendence-post') }}",
                    method: 'post',
                    dataType: 'json',                    
                    data: {
                        class: $('#class').val(),
                        subject: $('#subject').val(),
                        roll: $('#roll').val(),
                        date: $('#date').val(),
                        attendence: $('#attendence').val(),
                    },
                    success: function(result){
                        console.log(result)
                        $("#myForm")[0].reset();
                        $('.alert').show();
                        $('.alert').html(result.success)
                       
                        setTimeout(function() {                            
                            $('.alert').html(result.success).fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                        
                    }
                             
                    });
                });

            });
    </script>
    
</html>