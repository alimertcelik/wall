<?php include_once('header.php'); ?>


    <div class="container">
      
       <h2>Welcome <a href="account"><?php  echo $username; ?>!</a></h2>
       <?php if (! $boolean == false): ?> 
            <a href="<?php echo base_url();?>home/logout">Logout</a>|<a href="<?php echo base_url();?>home/last_comments">Comment</a>
       <?php endif; ?>
      
      <?php $e_id=0; ?>
      <?php foreach($comment as $com){ ?>
          <?php if (! $boolean == false): ?>  
              <div class="row" <?php if ($com->last_comment===0){?>style="display:none"<?php } ?>>
                 <?php $e_id=$com->question_id; ?>
                    
                    <form action="<?php echo base_url();?>home/rate" id="rate_form_<?php echo $e_id; ?>" method="POST">
                    <div class="span2" <?php if ($com->is_vote===1){?>style="display:none"<?php } ?>>
                         <input type="hidden" name="like" id="rate_input_<?php echo $e_id; ?>" value="">
                         <input type="hidden" name="view" id="rate_input_<?php echo $e_id; ?>" value="comment">
                         <input type="hidden" name="entry_id" id="entry_id_<?php echo $e_id; ?>" value="<?php echo $e_id; ?>">
                         <a href="#" onclick="$('#rate_input_<?php echo $e_id; ?>').val('1');$('#rate_form_<?php echo $e_id; ?>').submit();return false;"><i class="icon-thumbs-up"> </i> </a>
                         <a href="#" onclick="$('#rate_input_<?php echo $e_id; ?>').val('0');$('#rate_form_<?php echo $e_id; ?>').submit();return false;"><i class="icon-thumbs-down"></i> </a>
                    </div>
        
                   </form>       
                  
                    <div class="span3">
                          <input type ="hidden" name="entry_id" value="<?php echo $e_id ?> ">
                          <span> Like:<?php echo isset($com->title_like)?($com->title_like):("") ?>Dislike:<?php echo isset($com->title_dislike)?($com->title_like):("") ?></span>
                    </div>
          <?php endif; ?>
                
                 <?php isset($com->last_comment[0])?($user_id=$com->last_comment[0]->user_id):("") ?>
                 <?php isset($com->user_info[0])?($u_id=$com->user_info[0]->user_id):("") ?>
                     <div class="span5">
                          <a href="entry/<?php echo $com->question_id;?>"><?php echo $com->title;?></a>
                          <span> Last comment:<?php echo isset($com->last_comment[0])?($com->last_comment[0]->comment):("No Comment") ?></span>
                           
                            <form action="<?php echo base_url();?>home/user_info" id="user_info_form_<?php echo isset($user_id)?($user_id):("") ?>" method="POST">
                                 <input type="hidden" name="user_id" id="user_info_form_<?php echo isset($user_id)?($user_id):("") ?>" value="<?php echo isset($com->last_comment[0])?($com->last_comment[0]->user_id):("") ?>">
                                 by:<a href="#" onclick="$('#user_info_form_<?php echo isset($user_id)?($user_id):("") ?>').submit();return false;"> <?php echo isset($com->last_comment[0])?($com->last_comment[0]->username):("") ?></a>
                            </form>
                            
                            <form action="<?php echo base_url();?>home/user_info" id="user_info_form_<?php echo isset($u_id)?($u_id):("") ?>" method="POST">
                                 <input type="hidden" name="user_id" id="user_info_form_<?php echo isset($user_id)?($user_id):("") ?>" value="<?php echo isset($com->user_info[0])?($com->user_info[0]->user_id):("") ?>">
                                 created by:<a href="#" onclick="$('#user_info_form_<?php echo isset($u_id)?($u_id):("") ?>').submit();return false;"> <?php echo isset($com->user_info[0])?($com->user_info[0]->username):("") ?></a>
                            </form>
                     </div>
                
                     <div class="span3">
                            <span> at: <span> 
                              <?php 
                                    if(isset($com->last_comment[0]))
                                      {
                                          $seconds = strtotime("now") - strtotime($com->last_comment[0]->comment_date)+3600;
                                          $minutes = (int)($seconds / 60);
                                          $hours = (int)($minutes / 60);
                                          $days = (int)($hours / 24);
                                           
                                           if($seconds <60 && $minutes<60)
                                            {
                                              
                                              echo "Seconds:".$seconds;
                                            }
                                          else if ( $seconds >= 60 && $minutes< 60 )
                                            {
                                                     
                                                      $seconds = $seconds % 60;
                                                      echo $minutes." Minutes ";
                                                      echo $seconds." Seconds";
                                            }
                                          else if ( $minutes >= 60 && $hours<24)
                                           {
                                                     
                                                      $minutes = $minutes % 60;
                                                      echo $hours." Hour ";
                                                      echo $minutes." Minutes";
                                            }         
                                          else if ( $hours >= 24 && $days<30 )
                                           {
                                                      
                                                      $hours = $hours % 60;
                                                      echo $days." Days ";
                                                      echo $hours." Hours";
                                           }       
                                      }
                                      
                                    else
                                      {
                                        echo "No comment";
                                      }                        
                              ?>
                            </span> </span>

                      </div>
          </div>
           <?php } ?>
    </div>

    <div class="container">

      <?php if (! $boolean == false): ?>
                      <div class="row">
                        <form action="<?php echo base_url();?>entry/new_entry" method="POST">
                              <div class="span3">
                                  <input type="submit" id="comment_process" name="process" class="btn" value="Create question" >
                              </div>          
                        </form>    
                      </div>
      <?php endif; ?>

    </div>   
  <?php include_once('footer.php'); ?>