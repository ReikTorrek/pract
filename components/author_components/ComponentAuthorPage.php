<?php
error_reporting(0);
require_once ('../framework/Component.php');
require_once ('ComponentAuthorAvatar.php');
class ComponentAuthorPage extends Component
{
    public function render()
    {
        $author = $this->data;
        $connection = mysqli_connect('localhost', 'root', '', 'mysql');
        $select_db = mysqli_select_db($connection, 'mysql');

        $query_tag1 = "SELECT * FROM author WHERE id = '$author'";
        $tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
        while ($tag1 = mysqli_fetch_assoc($tag_result1)) {
        return
            '<!DOCTYPE html>
<html>
 <head>
  <meta charset=\"utf-8\">
  <title>Исторический турнир</title>
  <link href=\"../css/authorPage.css\" rel=\"stylesheet\">
 </head>
 <body>
  <div id=\"container\">
   <header><h1>' + new ComponentAuthorAvatar($tag1); + '</h1></header>
   <article>
   ' +

            + '
   </article>
  </div> 
 </body>
</html>';
    }
}
}
?>
