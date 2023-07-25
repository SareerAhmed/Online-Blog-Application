<?php 
$connection = mysqli_connect("localhost","root","","blog_management_system");

// var_dump($connection);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: ['advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview','anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen','insertdatetime', 'media', 'table', 'help', 'wordcount'], toolbar: 'undo redo | blocks | ' + 'bold italic backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help',
      });
    </script>
  </head>

  <body>
    <h1>TinyMCE Quick Start Guide</h1>
    <form method="POST">
      <textarea name="text" id="mytextarea">Hello, World!</textarea>
      <input type="submit" name="submit" value="SUBMIT">
    </form></body>
  


</html>
