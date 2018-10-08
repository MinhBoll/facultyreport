$(document).ready(function(){  
                  var i=0;
                    console.log(i);
                  $('#add-publications').click(function(){  
                       i++;  
                      console.log(i);
                       $('#dynamic_employment_field').append(
                           '<div class="group-employment" id="employment-row'+i+'"><div class="row"><div class="form-group col-md-12 "><label for="title">Book Title</label> <button type="button" name="remove-employment" id="'+i+'" class="btn btn-danger btn-sm btn_remove_employment">X</button><input class="form-control booktitle" placeholder="CSI" name="booktitle['+i+']" type="text" value=""> </div> </div><div class="row"><div class="form-group col-md-12 "><label for="title">Abstract</label><input class="form-control abstract" placeholder="Software Engineer" id="abstract" name="abstract['+i+']" type="text" value=""></div></div> '
                       );
                  });
            });  
            $(document).on('click', '.btn_remove_employment', function(){  
                       var button_id = $(this).attr("id");   
                       $('#employment-row'+button_id+'').remove();  
                  });
        