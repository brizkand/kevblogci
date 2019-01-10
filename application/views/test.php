<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>CodeIgniter View Example</title> 
   </head>
	
   <body> 
      CodeIgniter View Example
      <br> 
      <?php 
         echo $this->benchmark->memory_usage(); 

         $this->benchmark->mark('dog');

         // Some code happens here

         $this->benchmark->mark('cat');

         // More code happens here

         $this->benchmark->mark('bird');

         echo $this->benchmark->elapsed_time('dog', 'cat') . "<br>";
         echo $this->benchmark->elapsed_time('cat', 'bird') . "<br>";
         echo $this->benchmark->elapsed_time('dog', 'bird') . "<br>";

         echo $this->benchmark->elapsed_time() . "<br>";

         $cal = new Calen_con(1994, 1);
         $cal->test();

      ?>
   </body>
	
</html>