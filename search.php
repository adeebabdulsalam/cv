<!DOCTYPE html>
<html>
    <head><title>CV</title>
        <style>
            .border{
                border: 2px black;
            }
        </style>
    </head>
    <body>
      <?php
if(!empty($_POST['search'])){
    

$search="cv/".$_POST['search'].".txt";
$file= file_get_contents($search);
if($file){
$img="images/".$_POST['search'].".jpg";
$content= json_decode($file,true);
$name=$content[0]["name"];
$roll=$content[0]["roll"];
$dob=$content[0]["dob"];
$address=$content[0]["address"];
$mobile=$content[0]["mobile"];
$email=$content[0]["email"];
$sgpa[0]=$content[0]["sgpa"]["sem1"];
$sgpa[1]=$content[0]["sgpa"]["sem2"];
$sgpa[2]=$content[0]["sgpa"]["sem3"];
$sgpa[3]=$content[0]["sgpa"]["sem4"];
$sgpa[4]=$content[0]["sgpa"]["sem5"];
$sgpa[5]=$content[0]["sgpa"]["sem6"];
$sgpa[6]=$content[0]["sgpa"]["sem7"];
$sgpa[7]=$content[0]["sgpa"]["sem8"];
$cgpa=$content[0]["cgpa"];
$hob=$content[0]["hobbies"];
$from=$content[0]["from"];
$ref=$content[0]["ref"];
 
 
    
    
echo"<center><img src=".$img." width='200' height='200' border='2'>
     <br><br>
     Name:".$name."<br><br>
     Roll Number:".$roll."<br><br>
     Date of Birth:".$dob."<br><br>
     Address:".$address."<br><br>
     Mobile:".$mobile."<br><br>
     Email:".$email."<br><br>
     Hobbies:".$hob."<br><br>
     From:".$from."<br><br>
     References:".$ref."<br><br>
     CGPA:".$cgpa."    
     <table border='1'>
     <thead><tr><th>SEM</th><th>SGPA</th></tr></thead>
     <tbody><tr><td>I</td><td>".$sgpa[0]."</td></tr>
                    <tr><td>II</td><td>".$sgpa[1]."</td></tr>
                    <tr><td>III</td><td>".$sgpa[2]."</td></tr>
                    <tr><td>IV</td><td>".$sgpa[3]."</td></tr>
                    <tr><td>V</td><td>".$sgpa[4]."</td></tr>
                    <tr><td>VI</td><td>".$sgpa[5]."</td></tr>
                    <tr><td>VII</td><td>".$sgpa[6]."</td></tr>
                    <tr><td>VIII</td><td>".$sgpa[7]."</td></tr></tbody>
     </table>    
     </center>";
}
else{
     header("location: index.php?roll=false");
}
}
else{
  header("location: index.php");  
}  ?>
    </body>
</html>
