<?php require_once('database/connect.php');
 //==========================Show coment  data ===========================
 extract($_POST);

  if(isset($_POST['readUser'])){ ?>
   <?php $sqli = "SELECT * FROM tbl_comments ORDER BY cmnt_id DESC";
    $run = mysqli_query($con,$sqli);
    $count= 1;
    while($row = mysqli_fetch_array($run)){ ?>
                <div class="comnet_box">
                    <div class="coment_name">
                       <p>By <?php echo $row['full_name']?> &nbsp; &nbsp;<small style="font-size: 15px;"><?php echo $row['coment_date']?></small></p>
                    </div>
                    <p style=" margin-top: -13px;padding-left: 9px;"><?php echo $row['comments']?></p>
                      <div class="d-flex justify-content-end">
                      <form action="" method="POST">
                        <input type="hidden" name="comnt_use_id" value="<?php echo $result['cmnt_id']?>">
                  </form>
                  <button name="rplay_btn" class=" btn btn-sm btn-secondary border-0" onclick="get_user(<?php echo $row['cmnt_id']?>)">Reply</button> 
                </div> 
                </div>
              
                   <?php if($row['replay_comments']==""){ ?>
                 <?php  }else{ ?>
                  <div class="comnet_box2">
                      <div class="coment_name ">
                        
                        <h4>By Admin &nbsp; &nbsp; <small style="font-size: 15px;"><?php echo $row['replay_date']; ?></small></h4>
                      </div>
                      <strong style="text-transform: capitalize;"><?php echo $row['full_name']?></strong> <p><?php echo $row['replay_comments']?></p>
                      </div>
                   <?php }?>
         <?php  } } 

  //==========================insert coment  data ===========================

  if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['comment'])){
    date_default_timezone_set("Africa/Johannesburg");
    $today = date(" j-F -Y,  g:i a");
    $sql = "INSERT INTO tbl_comments(full_name,email,comments,coment_date)values('$full_name','$email','$comment','$today')";
    $run = mysqli_query($con,$sql);
  }


   //=========================== Modal data show ===========================
   if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_comments where cmnt_id ='$id'";
    $result = mysqli_query($con,$sql);
      $response = array();
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          $response = $row;
        }
      }
      echo json_encode($response);
    }


//=======================update dfata =    =========================
  if(isset($_POST['hidden_user_id'])){
          $hidden_user_id = $_POST['hidden_user_id'];
          $replay_coment = $_POST['replay_coment'];
          date_default_timezone_set("Africa/Johannesburg");
          $today = date(" j-F -Y,  g:i a");
            $update = "UPDATE tbl_comments SET  replay_comments ='$replay_coment',replay_date='$today' WHERE cmnt_id ='$hidden_user_id'";
            $run = mysqli_query($con,$update);
 
   }
?>


