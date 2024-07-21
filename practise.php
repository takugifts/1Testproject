    
     <!DOCTYPE html>
     <html>
     <head>
         <title>Email Form</title>
     </head>
     <body>
         <h1>Send Email</h1>
         <form method="post" action="process.php">
             <label for="name">Name:</label>
             <input type="text" id="name" name="name" required><br><br>

             <label for="email">Email:</label>
             <input type="email" id="email" name="email" required><br><br>

             <label for="message">Message:</label>
             <textarea id="message" name="message" rows="5" required></textarea><br><br>

             <input type="submit" value="Send Email">
         </form>
     </body>
     </html>
   