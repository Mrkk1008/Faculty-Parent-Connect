<?php
  session_start();
  include("cn.php");
  include("common.php");
?>
<?PHP
  $res = mysqli_query($link,"select * from sem");
?>

<!doctype html>
<html>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#sem').on('change',function(){
        var sem = $(this).val();
        if(sem){
            $.ajax({
                type:'POST',
                url:'subdata.php',
                data:'sem='+sem,
                success:function(html){
                    $('#sub').html(html);
                    $('#sub2').html(html);
                    $('#sub3').html(html);
                     
                }
            }); 
        }else{
            $('#sub').html('<option value="">Select country first</option>');
             
        }
    });
    
    
});
</script>
 <body >
 
  <form method='post' action>

   <select name="sem" id="sem">
    <option value="select">select</option>
    <?php
      while($row = mysqli_fetch_array($res, MYSQLI_BOTH))
      {
    ?>
    <option value="<?php echo $row['sem']; ?>"><?php echo $row['sem']; ?></option>
    <?php
      }
    ?>
   </select>

   <br>
   <br>
   <select name="sub" id="sub">
      <option value="">select sem</option>
   </select>
   <select name="sub2" id="sub2">
      <option value="">select sem</option>
   </select>
   <select name="sub3" id="sub3">
      <option value="">select sem</option>
   </select>

   <div id='response'></div>
  </form>
    


 </body>
</html>
