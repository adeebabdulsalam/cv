<?php
/*Save entered bio temperorily*/
$input[0]=$_POST["name"];
$input[1]=$_POST["roll"];
$input[2]=$_POST["dob"];
$input[3]=$_POST["address"];
$input[4]=$_POST["mobile"];
$input[5]=$_POST["email"];
$input[6]=$_POST["cgpa"];
$input[7]=$_POST["hobbies"];
$input[8]=$_POST["from"];
$input[9]=$_POST["ref"];
if(!empty($_POST["sgpa1"])){
$input_sgpa[0]=$_POST["sgpa1"];
}
if(!empty($_POST["sgpa2"])){
$input_sgpa[1]=$_POST["sgpa2"];
}
if(!empty($_POST["sgpa3"])){
$input_sgpa[2]=$_POST["sgpa3"];
}
if(!empty($_POST["sgpa4"])){
$input_sgpa[3]=$_POST["sgpa4"];
}
if(!empty($_POST["sgpa5"])){
$input_sgpa[4]=$_POST["sgpa5"];
}
if(!empty($_POST["sgpa6"])){
$input_sgpa[5]=$_POST["sgpa6"];
}
if(!empty($_POST["sgpa7"])){
$input_sgpa[6]=$_POST["sgpa7"];
}
if(!empty($_POST["sgpa8"])){
$input_sgpa[7]=$_POST["sgpa8"];
}

/*Checking validity*/
$present=date("Y m d");
$given=$input[2];
//$year=date("Y",strtotime($input[2]));
$sgpa_sum=array_sum($input_sgpa);
$sgpa_count=count($input_sgpa);
$cgpa=$sgpa_sum/$sgpa_count;
if($present < $given){
    
    if($cgpa!=$input[6] || $input[6]>10 || $input[6]<0){
      header("location: index.php?dob&cgpa");
    }
    else{
      header("location: index.php?");  
    }
}
elseif($cgpa!=$input[6] || $input[6]>10 || $input[6]<0){
    header("location: index.php?cgpa");
}
/*Photo Upload */
else{    
     // Check if image file is a actual image or fake image
    $upload=false;
    $FileType = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
    $target_file = "images/".$input[1].".".$FileType;    
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {     
        // Check if file already exists
          if (file_exists($target_file)) {
           header("location:index.php?photo&roll");
          
          }
        // Check file size
         elseif ($_FILES["photo"]["size"] > 1000000) {
            header("location:index.php?photo");
           
         }
        // Allow certain file formats
         elseif ($FileType != "jpg"){
            header("location:index.php?photo");
             
        }

        else {
             if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)){
               $upload=true;
              } 
             else {
              header("location:index.php?photo");
             }
            }
     }
    else {      
       header("location:index.php?photo");
    }
    
  if(!$upload){
      header("location:index.php?photo");
  }
  /*Write to file*/
  else{
      
     $cv_path="cv/".$input[1].".txt";
      $cv_file=fopen($cv_path,"w");
      $content[]=array(
        
          "name"=>$input[0],
          "roll"=>$input[1],
          "dob"=>$input[2],
          "address"=>$input[3],
          "mobile"=>$input[4],
          "email"=>$input[5],
          "sgpa"=>array("sem1"=>$input_sgpa[0],
              "sem2"=>$input_sgpa[1],
              "sem3"=>$input_sgpa[2],
              "sem4"=>$input_sgpa[3],
              "sem5"=>$input_sgpa[4],
              "sem6"=>$input_sgpa[5],
              "sem7"=>$input_sgpa[6],
              "sem8"=>$input_sgpa[7],
              ),
          "cgpa"=>$input[6],
          "hobbies"=>$input[7],
          "from"=>$input[8],
          "ref"=>$input[9],
              
              );
      $write=fwrite($cv_file, json_encode($content));
      fclose($cv_file);
      if($write){
      
      header("location: index.php?cv");
      }
      else{
       header("location: index.php?nocv");   
      }
  }
}

