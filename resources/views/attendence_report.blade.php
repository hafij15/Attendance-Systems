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
        <h3 class="text-center">Student Attendence Report</h3><hr>       
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
               <label for="">Roll</label>
               <input type="text" class="form-control" name="roll" id="roll" required>
             </div>
			 <div class="form-group">
               <label for="fromDate">From Date</label>
               <input type="date" class="form-control" name="fromDate" id="fromDate" required>
             </div>
			 <div class="form-group">
               <label for="fromDate">To Date</label>
               <input type="date" class="form-control" name="toDate" id="toDate" required>
             </div>
             <button class="btn btn-primary" id="ajaxSubmit" type="submit">Submit</button>
          </form>		  
        </div>
		<br>
		<div class="col-md-12" id="report">
		
		</div>
      </div>  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	
	<script>  
		$(document).ready(function(){    
			$('#example').DataTable();        
			$('#ajaxSubmit').click(function(e){ 
					
				if ($('#class').val()==""){
					alert("Class can't be empty!")
					$('class').focus();
					return false;
				}                     
				if ($('#roll').val()==""){
					alert("Roll can't be empty!")
					$('#roll').focus();
					return false;
				}
				if ($('#fromDate').val()==""){
					alert("Date can't be empty!")
					$('#fromDate').focus();
					return false;
				}
				if ($('#toDate').val()==""){
					alert("Date can't be empty!")
					$('#toDate').focus();
					return false;
				}
								
				e.preventDefault();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
					
				$.ajax({                                 
					url: "{{ url('/attendence-report') }}",
					method: 'post',
					dataType: 'json',                    
					data: {
						class: $('#class').val(),                        
						roll: $('#roll').val(),                       
						fromDate: $('#fromDate').val(),                       
						toDate: $('#toDate').val(),                       
					},
					success: function(result){
						console.log(result)                      
						
						$('#report').show();
						$('#report').html(result.success)
						
					}
							
					});
				});

			});
	</script>


    </body>
</html>