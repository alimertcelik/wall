<?php include_once('header.php'); ?>


     <form action="../entry/save_question" method="POST">
        <div class="row">
          <div class="span9">
            <input type="text" name="title" value="Title" />
          </div>          
                          
        </div>
        <div class="row">
          <div class="span9">
            <textarea name="description" > Description</textarea>
          </div>
        </div>
        <div class="row">
          <div class="span3">
            <button type="submit" class="btn btn-primary">Write on wall</button>
        </div>          
        </div>
    </form>

   
<?php include_once('header.php'); ?>