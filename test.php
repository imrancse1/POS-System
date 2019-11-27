$(document).ready(function(){

 load_data('');

$('#search').click(function(){
  var full_text_search_query = $('#full_text_search').val();
  load_data(full_text_search_query);
 });

 function load_data(full_text_search_query = '')
 {
  var _token = $("input[name=_token]").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
   url:"{{ route('hr.ajaxSearch.action') }}",
   type:"POST",
   data:{
      full_text_search_query:full_text_search_query, 
      _token:_token
   },
   dataType:"json",
   success:function(data)
   {
      // console.log(data[0].status);
      // return false;
    var output = '';
    if(data.length > 0)
    {
     for(var i = 0; i < data.length; i++)
     {
      var img = "{{URL::to('public/images/personal_image/')}}/";
      var view = "{{URL::to('hr/single-employee-view')}}/";
      var edit = "{{URL::to('hr/employee-edit')}}/";
      var personalinfo = 'personal-info';
      var active = 'active';
      var inactive = 'inactive';
      var Delete = 'delete';
      output += '<tr>';
      output += '<td>'+data[i].personal_info_id+'</td>';
      output += '<td>'+data[i].name+'</td>';
      output += '<td>'+data[i].mobile_number+'</td>';
      output += '<td>'+data[i].education_qualification+'</td>';
      output += '<td>'+data[i].religion+'</td>';
      output += '<td>'+data[i].dob+'</td>';
      output += '<td>'+data[i].marital_status+'</td>';
      output += '<td>'+data[i].job_designation+'</td>';
      output += '<td>'+'<img src="'+img+data[i].image_path+'"/>'+
      '</td>';
      output += '<td>'; 
         if(data[i].status == 1){
            var result = 'Active';
      output += '<label class="label label-success">'+result+'</label>';
         }else {
            var result = 'Inactive'; 
      output += '<label class="label label-warning">'+result+'</label>';
         }           
      output +='</td>';
      output += '<td>'; 
                        if(data[i].status == 1){
                           var result = 'Active';
                         output += '<a href="javascript:;" class="btn btn-warning btn-xs" style="'+result+'" onclick="updateStatus('+personalinfo+', '+active+','+data[i].personal_info_id+')">' +
                           '<i class="fa fa-ban" title="Inactive"></i>'+   
                        '</a>&nbsp';
                         } else {
                           var result = 'Inactive';
                          output+= '<a href="javascript:;" class="btn btn-success btn-xs" style="'+result+'" onclick="updateStatus('+personalinfo+', '+inactive+', '+data[i].personal_info_id+')">' +
                                    '<i class="fa fa-check-square-o" title="Active"></i>'+   
                                 '</a>&nbsp';
                         }
                  output+= '<a href="'+edit+data[i].personal_info_id+'" class="btn btn-info btn-xs edit-personal-info" id="reference_'+data[i].personal_info_id+'">' +
                                    '<i class="fa fa-edit" title="Edit"></i>'+   
                                 '</a>&nbsp';

                    output+= '<a href="javascript:;" class="btn btn-success btn-xs save-update-personal-info" id="saveUpdate_'+data[i].personal_info_id+'" style="display: none;">' +
                           '<i class="fa fa-save" title="Save"></i>'+   
                           '</a>';
                    output += '<a href="javascript:;" class="btn btn-primary btn-xs reset" style="display: none;">' +
                              '<i class="fa fa-refresh fa-spin" title="Reset"></i>'+   
                           '</a>';
                     if(data[i].status == 2){
                           var result = 'delete';
                         output += '<a href="javascript:;" class="btn btn-danger btn-xs" style="display:none;" onclick="updateStatus('+personalinfo+', '+Delete+','+data[i].personal_info_id+')">' +
                           '<i class="fa fa-trash" title="delete"></i>'+   
                        '</a>&nbsp';
                         }
                      
                 output+= '<a class="btn btn-primary btn-xs" href="'+view+data[i].personal_info_id+'">' + 
                           '<i class="fa fa-street-view" title="view"></i>' + 
                     '</a>';         

      output += '</td>';
                                
      output += '</tr>';
   }

   } else
     
    {
     output += '<tr>';
     output += '<td colspan="6">No Data Found</td>';
     output += '</tr>';
    }
    $('tbody').html(output);
   }
  });
 }

 

});


//--------------------

 $.each(data, function(index, value) {
                            output += '<tr>';
                            output += '<td>' + value.personal_info_id + '</td>';
                            output += '<td>' + value.name + '</td>';
                            output += '<td>' + value.mobile_number + '</td>';
                            output += '<td>' + value.education_qualification + '</td>';
                            output += '<td>' + value.religion + '</td>';
                            output += '<td>' + value.dob + '</td>';
                            output += '<td>';
                            if(value.marital_status == 1){
                              output += '<p>Married</p>';
                            }else {
                              output += '<p>Unmarried</p>';
                            }
                            output +='</td>';
                            output += '<td>' + value.job_designation + '</td>';
                            output += '<td><img src="'+img+value.image_path+'"/></td>';
                            output += '<td>';
                            if (value.status == 1) {
                                output += '<label class="btn btn-success btn-xs " id="statusTitleActive_' + value.personal_info_id + '">Active</label>';
                            }
                            if (value.status == 0) {
                                output += '<label class="btn btn-warning btn-xs" id="statusTitleInactive_' + value.personal_info_id + '">Inactive</label>';
                            }
                            output += '</td>';
                            output += '<td>';
                            output += '<a href="' + edit + value.personal_info_id + '" class="btn btn-info btn-xs edit-personal-info" id="reference_' + value.personal_info_id + '">' +
                                '<i class="fa fa-edit" title="Edit"></i>' +
                                '</a>&nbsp';
                            output += '<a class="btn btn-primary btn-xs" href="' + view + value.personal_info_id + '">' +
                                '<i class="fa fa-street-view" title="view"></i>' +
                                '</a>';

                            output += '</td>';
                            output += '</tr>';
                        });