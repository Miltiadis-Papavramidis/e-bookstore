<!DOCTYPE html>
<html lang="en">
   <head>
      <title>GFG- Store Data</title>
   </head>
   <body>
      <center>
         <h1>Storing Form data in Database</h1>
         <form action="process_registration.php" method="post">
             
            <p>
               <label for="username">Username:</label>
               <input type="text" name="username" id="username">
            </p>
 
            <p>
               <label for="email">Email Address:</label>
               <input type="email" name="email" id="email">
            </p>
 
            <p>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password">
            </p>
 
            <input type="submit" value="Submit">
         </form>
      </center>
   </body>
</html>
