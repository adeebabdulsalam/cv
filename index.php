<!DOCTYPE html>
<html>
    <head>
        <title>Create CV</title>
    </head>
    <body>
    <center>
        <div>
            <form action="search.php" method="post">
                <input type="text" name="search">
                <input type="submit" value="search">
            </form>
        </div>
        <p>Or Create new CV below</p>
    </center>
    <br>
    <br>
    
        <div>
            <form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="false;">
            
            
            
            <input type="text" name="name" placeholder="Name" required>
            
             <br><br>
            
             <input type="text" name="roll" placeholder="Roll Number" required>
            
            <br><br>
            
            <input type="text" name="dob" onclick="this.type='date'" placeholder="Date of Birth" required>
            <?php if(isset($_GET['dob'])){ ?>
            <span style="color:red;">Enter a valid DOB</span>
            <?php } ?>
             <br><br>
            
             <textarea style="width:165px; height:80px;" name="address" placeholder="Address"></textarea>
            
             <br><br>
            
             <input type="tel" name="mobile" placeholder="Mobile" required>
            
             <br><br>
            
             <input type="email" name="email" placeholder="Email ID" required>
            
             <br><br>
            <table>
                <thead>
                    <tr><th>Sem</th><th>SGPA</th></tr>
                </thead>
                <tbody>
                    <tr><td>I</td><td><input type="number" name="sgpa1" step="0.01" style="width:130px"></td></tr>
                    <tr><td>II</td><td><input type="number" name="sgpa2" step="0.01" style="width:130px"></td></tr>
                    <tr><td>III</td><td><input type="number" name="sgpa3" step="0.01" style="width:130px"></td></tr>
                    <tr><td>IV</td><td><input type="number" name="sgpa4" step="0.01" style="width:130px"></td></tr>
                    <tr><td>V</td><td><input type="number" name="sgpa5" step="0.01" style="width:130px"></td></tr>
                    <tr><td>VI</td><td><input type="number" name="sgpa6" step="0.01" style="width:130px"></td></tr>
                    <tr><td>VII</td><td><input type="number" name="sgpa7" step="0.01" style="width:130px"></td></tr>
                    <tr><td>VIII</td><td><input type="number" name="sgpa8" step="0.01" style="width:130px"></td></tr>
                </tbody>
            </table>
            
             <br><br>
            
             <input type="number" name="cgpa" step="0.01" placeholder="CGPA" required>
             <?php if(isset($_GET['cgpa'])){ ?>
            <span style="color:red;">=Avg sum of SGPA</span>
            <?php } ?>
             <br><br>
            
            <textarea style="width:165px; height:80px;" name="hobbies" placeholder="Hobbies"></textarea>
            
             <br><br>
            <label>Hosteller</label>
            <input type="radio" name="from" value="hosteller">
            <span>
            <label>Day Scholar</label>
            <input type="radio" name="from" value="day-scholar">
            </span>
             <br><br>
           
            <textarea style="width:165px; height:80px;" name="ref" placeholder="References"></textarea>
            
             <br><br>
            <!--Upload photo input-->
            <input type="file" name="photo">
            <!--Submit Bio button-->
            <input type="submit" value="Submit" name="submit">
            <ul style="color:red;">
            <?php if(isset($_GET['photo'])){?>
            
                <li>only .jpg format allowed</li>
                <li>Size should be less than 1 MB</li>
                <li>Already existing student cannot create another CV</li>              
            <?php }else{?>
                 <li>Recommended format 200x200</li>
            
            <?php } ?>
                 </ul>
        </form>
        </div>
    </body>
</html>