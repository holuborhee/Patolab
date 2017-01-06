function checkRequired(arr)
{
	
	for (var i = arr.length - 2; i >= 0; i--) {
		
		
		if(!arr[i].value)
		{
			alert('fill all required fields');

			return false;
			
		}
		
	}
	
}

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});







$(document).on('click','.save-patient', function(event){

        event.preventDefault();

        var inputarray = new Array();
        var allright = true;
        $( ".allinputs" ).each(function( index ) {
        		var nm = this.name;
        	//console.log( index + ": " + $( this ).val() );

  				if(!$(this).val()){
  					var formgroup = $(this).parents('.form-group');
  					
  					formgroup.addClass('has-error');
  					formgroup.find('.help-block').removeClass('hidden');
  					formgroup.find('.help-block > strong').html(nm + ' is required');
  					allright = false;
  				}
  				else{
  					inputarray[nm] = this.value;
  				}


		});

		if(allright){
			//send code to server
			//console.log( inputarray );
			/*$.ajax({
        		dataType: 'json',
        		type: 'DELETE',
        		url: url
        	}).done(function(data){

            	toastr.success('The breaking News has been successfully removed.', 'Done', {timeOut: 5000});
            
        
        	});*/
        		var path = window.location.pathname;

        		path = path.replace('/create','');
        		var val1 = inputarray['name'];
        		var val2 = inputarray['email']; 
        		var val3 = inputarray['dob']; 
        		var val4 = inputarray['gender']; 
        		var val5 = inputarray['phone']; 
        		var val6 = inputarray['address']; 
        		var val7 = inputarray['bloodgroup']; 
        		var val8 = inputarray['genotype']; 
        		var val9 = inputarray['medicalhistory'];

        		console.log(val1 + ' ' + val2 + ' ' + val3 + ' ' + val4 + ' ' + val5 + ' ' + val6 + ' ' + val7 + ' ' + val8 + ' ' + val9);

        		
        	$.ajax({
      			type: 'post',
      			url: "http://" + window.location.hostname + path,
      			data: {name:val1, email:val2, dob:val3, gender:val4, phone:val5, address:val6, bloodgroup:val7, genotype:val8, medicalhistory:val9},
      			
      			dataType: 'json'})
      			.success(function(data){
      				console.log(data);
      			})
      			.error(function(data){

      				try {
        				var errors = $.parseJSON(data.responseText);

        				$.each(errors, function (key, value) {
            			var formgroup = $('#' + key).parents('.form-group');
            			formgroup.addClass('has-error');
  						formgroup.find('.help-block').removeClass('hidden');
  						formgroup.find('.help-block > strong').html(value);
        				});
    				} catch (e) {
        				$('#reg-div').html(data.responseText);
    				}
      				
        		
      				/*if(data.email)
      				{
      					

      					var formgroup = $( "#email" ).parents('.form-group');
  					
  					formgroup.addClass('has-error');
  					formgroup.find('.help-block').removeClass('hidden');
  					formgroup.find('.help-block > strong').html(errors.email);
      				}

      				if(data.dob){
      					var formgroup = $( "#dob" ).parents('.form-group');
  					
  						formgroup.addClass('has-error');
  						formgroup.find('.help-block').removeClass('hidden');
  						formgroup.find('.help-block > strong').html(errors.dob);
      				}

      				if(data.phone){
      					var formgroup = $( "#phone" ).parents('.form-group');
  					
  					formgroup.addClass('has-error');
  					formgroup.find('.help-block').removeClass('hidden');
  					formgroup.find('.help-block > strong').html(errors.phone);
      				}*/
      			});


    		
		}
		
	
        
        
});

$(document).on('keyup','.allinputs', function(event){

        event.preventDefault();
        $(this).parents('.form-group').removeClass('has-error');
        $(this).parents('.form-group').find('.help-block').addClass('hidden');
        
        
});


$(document).on('click','.addtest', function(event){

        	event.preventDefault();

        	$.ajax({
        		dataType: 'json',
        		type: 'GET',
        		url: ''
        	}).done(function(data){
        		//console.log(data + '');
            	//$('.report-div').append(data);
            
        
        	}).error(function(data){
        		//console.log(data);
            	$('.new-report').append(data.responseText);
            
        
        	});
        
        
});


$(document).on('click','.save-report', function(event){

        event.preventDefault();
        $(".new-report").submit();
        
        
});

$(document).on('click','.update-report', function(event){

        event.preventDefault();
        $(".edit-report").submit();
        
        
});

$(document).on('change','.allinputs', function(event){

        event.preventDefault();
        $(this).parents('.form-group').removeClass('has-error');
        $(this).parents('.form-group').find('.help-block').addClass('hidden');
        
        
});

$(document).on('click','.edit-link', function(event){

        event.preventDefault();
        var href = $(this).attr('href');
        var value_box = $(this).parent('.form-group').find('.value');

        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: href
          }).done(function(data){
              var elem = returnFormElement(data.col,data.val,href);
              value_box.html(elem);

            
        
          }).error(function(data){
            console.log(data + 'error');
              
            
        
          });


          $(this).removeClass('edit-link');
        $(this).addClass('done-link');

        $(this).html('<i class="fa fa-check fa-3x"></i> Done');
        hre = href.replace('/edit','');
        $(this).attr('href',hre);
        
        
});





$(document).on('click','.done-link', function(event){

        event.preventDefault();
        var href = $(this).attr('href');
        var value_box = $(this).parent('.form-group').find('.value');
        var new_value = $(this).parent('.form-group').find('.value-text').val();
        var n_href = $(this).parent('.form-group').find('.href').val();
        
        $.ajax({
        dataType: 'json',
        type: 'PUT',
        url: href,
        data: {value: new_value}
        }).done(function(data){

              
              value_box.html('<p class="lead text-success">' + data.val + '</p>');
              if(data.col == 'name')
                $('#top-name').html(data.val);
              if(data.col == 'password')
                value_box.html('<p class="lead text-success">Pass Code Changed</p>');
            
        
          }).error(function(data){
            console.log(data + 'error');
              
            
        
          });


          $(this).removeClass('done-link');
        $(this).addClass('edit-link');

        $(this).html('<i class="fa fa-pencil"></i> Edit');

        $(this).attr('href',n_href);
        
        
});


function returnFormElement(col,val,href){

  var returnstring = '<input type="hidden" name="href" class="href" value="'+ href + '" />';
  if(col=='medical_history')
  {
      returnstring += ' <textarea row="6" class="form-control value-text">' + val +'</textarea>';
  }
  if(col=='password')
  {
      returnstring += ' <input type="text" class="form-control value-text" placeholder="Enter new passcode"/>';
  }
  else
  {
    returnstring += '<input type="text" class="form-control value-text" value="' + val + '"/>';
  }
  return returnstring;
}