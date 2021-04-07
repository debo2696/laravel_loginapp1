@extends('layout')

@section('content')
<h1>Autocomplete example</h1>


  <div class="container box">
   <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3>
   
   <div class="form-group">
    <input type="text" name="eml_name" id="eml_name" class="form-control input-lg" placeholder="Enter Country Name" />
    <div id="emlList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>
 

<script>
$(document).ready(function(){

 $('#eml_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#emlList').fadeIn();  
                    $('#emlList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#eml_name').val($(this).text());  
        $('#emlList').fadeOut();  
    });  

});
</script>



@endsection 
