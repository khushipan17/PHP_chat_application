<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" href = "style.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Chat with PHP</title>
</head>
<body>
   <?php session_start();
   
   

   
   
   ?>


    <div id="wrapper">

    <h1>Welcome  <?php echo $_SESSION['username'] ?> to my Website</h1>
    
     <div class="chat_wrapper">

     <div id= "chat">
     </div>

     <form method ="post" id="frm">

     <textarea name = "message"  id = "txt" cols = "30" rows= "7" class = "textarea">
       
     
     
      </textarea>
     
     
     </form>
     
     </div>
    


    </div>
    <script>
    loadChat();

    setInterval(() => {
        loadChat();
    }, 1000);
    
  function loadChat(){

      $.post('handlers/message.php?action=getMessage' , function(response){

          $('#chat').html(response);
          $('#chat').scrollTop($('#chat').prop('scrollHeight'));


      } )
  }


    $('.textarea').keyup(

              function(e){
                 if(e.which == 13){
                    $('form').submit();
                
                document.getElementById('frm').reset();
                  }
              }

    );

    $('form').submit(
        function(){
           
            var message = $('.textarea').val();
            
           $.post('handlers/message.php?action=sendMessage&message='+message , function(response){
                              
                 alert(response);    
                      loadChat();
                     
                                  

           }
          
            
           );
        
           return false;
        }

        
    );

    
                           



</script>
   
</body>
</html>