
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

$(document).ready(function(){     

    //alert("HELLO"); 

    $('.numbers').ForceNumericOnly();
    
    $(".tables").dataTable({
        bJQueryUI: true,
        "sPaginationType": "full_numbers"
    });
    
    $("#username2").on('blur', function(){
        var username=$(this).val();
        //alert(username);
        $.ajax({
            url:'/scripts/username.php',
            type: 'post',
            data : username,
            beforeSend: function() {
                $('#usernameErr').text('Searching... Pls wait...');
            },
            success: function(response){
                $('#usernameErr').html(response);
            }
        })
    });

     $("#sponsorid").on('blur', function(){
        var sponsorid=$(this).val();
        
        var data='sponsorid='+sponsorid;
        //alert(sponsorid);

        $.ajax({
            url:'/scripts/sponsorid.php',
            type: 'POST',
            data : data,
            //beforeSend: function() {
            //    $('#sponsoridErr').text('Searching... Pls wait...');
            //},
            success: function(response){
                $('#sponsoridErr').html(response);
            }
        })
    });


    $('#toggleMenu').toggle(function () {
        $("#maincontent").animate({left:'250px'},{duration:1000, queue:false});
        $("#mainmenu").animate({left:0}, {duration:1000, queue:false});
        
        $(this).toggleClass('toggle');
        },
        function () {
            
            $("#maincontent").animate({left:'0px'},{duration:1000, queue:false});
            $("#mainmenu").animate({left:'-250px'}, {duration:1000, queue:false});
            $(this).toggleClass('toggle');
        }
    );
    
    //accordion menu

    $("#accordion > li > div").click(function(){
    	if(false==$(this).next().is(':visible')){
    		$("#accordion ul").slideUp(300);

    	}

    	$(this).next().slideToggle(300);
    	
    });

    //$("#accordion ul:eq(0)").show();

    $("#checksponsor").on('checked', function(){
        //alert('changg...');
    });

   /* $("#recipientprofileid").on('blur', function(){
        var recipientprofileid=$(this).val();
        alert(recipientprofileid);
        /*$.ajax({
            url:'/scripts/getprofileid.php',
            type: 'post',
            data : recipientprofileid,
            beforeSend: function() {
                $('#recipientprofileidErr').text('Searching... Pls wait...');
            },
            success: function(response){
                $('#recipientname').val(response);
            }
        });
    });*/

    $("#recipientprofileid").on('blur', function(){
        var recipientprofileid=$(this).val();

        
        var data='recipientprofileid='+recipientprofileid;
        //alert(data);

        $.ajax({
            url:'/scripts/getprofileid.php',
            type: 'POST',
            data : data,
            //beforeSend: function() {
            //    $('#sponsoridErr').text('Searching... Pls wait...');
            //},
            success: function(response){
                $('#recipientname').val(response);
            }
        })
    });

    //alert('Hu');
    $("#org").jOrgChart({
        chartElement : '#chart',
        dragAndDrop  : true
    });

    //alert("Hello");

    $(".remove").click(function(e){

        var id=$(this).parents("tr").attr("id");

        var url="/modules/deleteadmin.php?id="+id;

        if(confirm('Are you sure to delete this record')) { 
            $.ajax({
                url:url,
                type:'GET',
                data: {id:id},

                error: function(){
                    alert("Something is wrong");
                },
                success: function(data){
                    $("#"+id).remove();
                    alert("Record deleted successfully");
                }
            });
        }
        return false;
    });
    $(".delete").click(function(e){

        var id=$(this).parents("tr").attr("id");

        var url="/modules/deletepin.php?id="+id;

        if(confirm('Are you sure to delete this record')) { 
            $.ajax({
                url:url,
                type:'GET',
                data: {id:id},

                error: function(){
                    alert("Something is wrong");
                },
                success: function(data){
                    $("#"+id).remove();
                    alert("Record deleted successfully");
                }
            });
        }
        return false;
    });

    $(".activate").click(function(e){

        var id=$(this).parents("tr").attr("id");

        var url="/modules/activateadmin.php?id="+id;
        
        $.ajax({
            url:url,
            type:'GET',
            data: {id:id},
            error: function(){
                alert("Something is wrong");
            },
            success: function(data){
                $("#"+id).remove();
                alert("Record activated successfully");
            }
        });
        return false;
    });

    $("#addtowallet").submit(function(){
        $('#addstatus').html('');
        var data=$(this).serialize();
        //alert(data);
        $.ajax({
          type: 'POST',
          url: '/scripts/addtowallet.php',
          data: data,
          success: function (data) {
              $('#addstatus').html(data);
              $('#addtowallet')[0].reset();
          }
      });
        $('#addtowallet').find('input:text').val('');
      return false;
    });

    $("#deductfromwallet").submit(function(){
        $('#deductstatus').html('');
        var data=$(this).serialize();
        //alert(data);
        $.ajax({
          type: 'POST',
          url: '/scripts/deductfromwallet.php',
          data: data,
          success: function (data) {
              $('#deductstatus').html(data);

          }
      });
        $('#deductfromwallet').find('input:text').val('');
      return false;
      $("form").trigger("reset");
    });

});