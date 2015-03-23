
      function postLink()
			{

				var postresult=$("#message").val();
				console.log("Inside Postlink");
				$.ajax(
    			{
        			'url' : '/callingmodelajax',
        			'type': 'POST',
        			'dataType': "json",
        			'data' :{msg: postresult},
        			success:function(result)
        			{
        				console.log(result.status);
            			//result: return result from server
            			//result=JSON.parse(result);
            			if(result.status==1)
      					  {

      					//	<?php 

      					//		$dt = time();

            					//echo "<hr>";
            					//echo $nameme."        :        ".$dt->format('Y-m-d H:i:s');
								//echo postresult; 
      							//document.getElementById('demo').innerHTML = 'hii';
								//echo "<hr>".$nameme."        :        ".$retime=date('Y-m-d H:i:s',$dt)."Check";
								//echo result.msg;

								
						//	?>	
                //  console.log("result status 200"); 
							   var str='<h3>'+result.name+'</h3><hr>                '+result.time+'<br><br>'+result.msg;
							    
							   $("#comments").before(str);
								  	console.log(result.status);
      					 }
      					 else
      					 {
                  console.log("INside result but else");
      						//	var str='<hr>'+result.name+'        :        '+result.time+'<br><br>'+result.msg;
							     //	$("#comments").after(str);
      						//	console.log("false hai dude");
      					//		console.log($usernameme.$nameme);
      					 }
        			 },
        			 error: function(result)
        			 {
            			//if fails     
            			console.log(result.status);
                  console.log(result.msg);
        			 }
    			});
    		}

    		$('#buttonajax').click(function() {
    			//throw new Error("Not working");
          //console.log($("#message").val());
    			console.log("Button Clicked");
       	 	postLink();
        	//event.preventDefault();
        	});
