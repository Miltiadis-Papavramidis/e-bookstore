<!DOCTYPE html>
<html>
    <head> 
      <meta charset="UTF-8"> 
      <title>Registration - BookStore</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
               body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
            
            header {
            position: fixed;
            border:15px white;
            text-align: center;
            color:  #ccffff;
            font-family : Brush Script MT, cursive ;
            padding: 10px 0;
            z-index: 1;
            background-color: darkblue;/* Ensure header is above other content */
            top:0px;
            width: 100%; /* Fills the entire width of the page */
            left: 0;
            }
            
           .overlay-box {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: absolute;
            top: -15px; 
            left: 2px;
            right: 2px;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0);   
        } 
       
           .registration-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Ensure the container is above other content */
        }
         
           .registration-form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            width: 70%; 
            max-width: 600px;
            text-align: center;
        }

        .registration-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .registration-form button {
            background-color: darkblue;
            color: azure;
            border-radius: 5px;
            padding: 10px 28px;
            border: none;
            margin-top: 10px;
        }     
        
        #main-content {
            background-image: url('vecteezy_realistic-library-aisle-mockup_21795110.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 80px; 
            padding-bottom: 50px; 
        }
      </style>
    </head>
    
    <body>
        <header>
            <div>
        <h1>BookStore</h1></div>
    </header>
        
        <div id="main-content">
         <div class="registration-container">
         <div class="registration-form">
             <h2><span style="color: darkblue"><i>Registration</i></span></h2>
    <form action="process_registration.php" method="post">
        <input type="text" name="name" placeholder="Username" autocomplete="username"><br>
        <input type="email" name="Email" placeholder="Email" autocomplete="email"><br>
        <input type="password" name="Password" placeholder="Password" autocomplete="new-password"><br>
        <button type="submit" name="submit"><i>Register</i></button>
    </form>    
       </div>
      </div>     
    </div>             
    </body>
</html>
