<?php foreach ($chat as $data){?>
    
    <div class="col-lg-4 border row">
    
  <div>
      <h4> <span class="badge bg-success"> User Name : <?php echo $data['name'] ?> </span> </h4>
      <input readonly <?php echo $data['subject'] ?> >
     <textarea name="" id="" cols="30" rows="10"><?php echo $data['data'] ?></textarea>
    
     <input type="text">
    
     <button class="btn btn-info">To Reply</button>
     <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/home/sms.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
      </div>
      
  </div>
  <?php } ?> 


  <table class="table border ">
                <br>
                <tr>
                    <th><span class="badge bg-success"> User Name </span></th>
                    <th><span class="badge bg-success"> Subject </span></th>
                    <th><span class="badge bg-success"> Data </span></th>
                 
                    <th colspan="4" class="text-center" >Action</th>
                </tr>
                <?php foreach ($chat as $data){?>
                    <tr>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['subject'] ?></td>
                        <td><?php echo $data['data'] ?> </td>
                        <th>
                        <form method="POST">
                          <th><input type="text"></th>
                          <th><button class="btn btn-info">To Reply</button></th>
                          
                          <th> <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/home/sms.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></th>
                          </form>
                           </th>

                       
                       
                        
                    </tr>
                <?php } ?>
            </table>





            if (isset($_POST['replayAdmin'])) {
  $answer_data = $_POST['answer_data'];
  $id2 = $_POST['messageId'];
  $adminId = $_SESSION['admin'];

  if (trim($answer_data) == "") {
      echo '<script>alert("plese enter valid data")</script>';
  } else {
      $insertreplay = "INSERT INTO answers VALUES (NULL ,'$answer_data' , '$id2', '$adminId' )";
      $ichat = mysqli_query($conn, $insertreplay);
  }
}