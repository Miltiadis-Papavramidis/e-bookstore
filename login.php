<!DOCTYPE html>
<html>
    <head> 
      <meta charset="UTF-8"> 
      <title>Login - BookStore</title>
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
       
           .login-container {
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
         
           .login-form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            width: 70%; 
            max-width: 600px;
            text-align: center;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .login-form button {
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
         <div class="login-container">
         <div class="login-form">
             <h2><span style="color: darkblue"><i>Login</i></span></h2>
    <form action="process_registration" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit"><i>Login</i></button>
    </form> 
     </div>
</div>       
 </div>            
    </body>
</html>

