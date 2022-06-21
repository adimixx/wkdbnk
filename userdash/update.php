<!DOCTYPE html>
<html>

<head>
  <title>Update Details</title>
  <link href="userdashboard.css" rel="stylesheet">
  <script type="text/javascript" src="../jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(

      function sorok() {
        $('#PersonalEdit').hide();
        $('#PersonalHeader').click(function() {
          $('#PersonalEdit').slideToggle();
          $('#PwdEdit').hide("medium");
        });

        $('#PwdEdit').hide();
        $('#PwdHeader').click(function() {
          $('#PwdEdit').slideToggle();
          $('#PersonalEdit').hide("medium");
        });
      }
    );
  </script>

  <?php
  if (isset($_COOKIE["user"])) {
    $usernya = $_COOKIE["user"];

    include "../mysql_conn.php";


    $query = mysqli_query($ismatConn, "SELECT * FROM USER WHERE USERNAME = '$usernya'");
    $cookie = $query->fetch_assoc();
  ?>
</head>

<body class="bal">
  <header>
    <table>
      <tr>
        <td rowspan="3"><a href="userdashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
      </tr>
      <tr>
        <td align="right"><br><br><br>Welcome <?php echo $cookie["NAME"]; ?></td>
      </tr>
      <tr>
        <td align="right"><a href="logout.php">LOG OUT</a></td>
      </tr>
    </table>
  </header>
  <br>

  <div class="personal">
    <a href="#/">
      <h3 id='PersonalHeader'>EDIT PERSONAL DETAILS</h3>
    </a>
    <div id='PersonalEdit'>
      <form name="updateinfo" action="updatedata.php" method="POST">
        <table>
          <tr>
            <td>Your Name : </td>
            <td><input name="name" required="" tabindex="1" type="text" value="<?php echo $cookie["NAME"]; ?>"></td>
          </tr>

          <tr>
            <td>Email : </td>
            <td><input type="email" name="email" required="" value="<?php echo $cookie["EMAIL"]; ?>"></td>
          </tr>

          <tr>
            <td>Phone Number : </td>
            <td><input type="name" name="phone_no" required value="<?php echo $cookie["PHONENO"]; ?>"></td>
          </tr>

          <tr>
            <td>Gender : </td>
            <td><select name="gender">
                <option value="m">Male</option>
                <option value="f">Female</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>Birthday : </td>
            <td><input type="date" name="birthday" value="<?php echo $cookie["BIRTHDAY"]; ?>" </td> </tr> <tr>
            <td colspan="2" align="center"><br><input type="submit" name="submitpersonal" value="Save Changes"></td>
          </tr>
          </td>
          </tr>
        </table>
      </form>
    </div>
  </div>


  <br><br>

  <div class="pwd">
    <a href="#/">
      <h3 id='PwdHeader'>CHANGE PASSWORD</h3>
    </a>
    <div id='PwdEdit'>
      <script>
        function myFunction() {
          var a = document.getElementById('input1');
          var b = document.getElementById('input2');
          var c = document.getElementById('input3');
          if (a.type === "password" || b.type === "password" || c.type === "password") {
            a.type = "text";
            b.type = "text";
            c.type = "text";
          } else {
            a.type = "password";
            b.type = "password";
            c.type = "password";

          }

        }

        function validate() {
          if (document.getElementById('input1').value == document.getElementById('input2').value) {
            document.getElementById('input2').style.color = 'red';
            document.getElementById('try').innerHTML = 'Password sama';

          } else if (document.getElementById('input1').value != document.getElementById('input2').value) {
            document.getElementById('input2').style.color = 'green';
            document.getElementById('try').innerHTML = 'password tidak sama';
          }
        }

        function validate2() {
          if (document.getElementById('input2').value == document.getElementById('input3').value) {
            document.getElementById('input2').style.color = 'green';
            document.getElementById('try2').innerHTML = 'Password sama';

          } else if (document.getElementById('input2').value != document.getElementById('input3').value) {
            document.getElementById('input2').style.color = 'red';
            document.getElementById('try2').innerHTML = 'password tidak sama';
          }
        }
      </script>


      <form name="borang" action="changepassword.php" method="POST">
        <table>
          <tr>
            <td>Current Password</td>
            <td><input type="password" name="currentpwd" id="input1" required onkeyup='validate()'></td>
          </tr>

          <tr>
            <td>New Password</td>
            <td><input type="password" name="newpwd" id="input2" required onkeyup='validate()'> <span id="try"></span> </td>

          </tr>

          <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="confirmpwd" id="input3" required onkeyup='validate2()'> <span id="try2"></span> </td>

          </tr>

          <tr>
            <td align="center"><input type="checkbox" onclick="myFunction()">Show Password</td>
            <td align="center"><br><input type="submit" name="submitpwd" value="Change Password"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <br><br>
  <div class="buttongrp">
    <button type=button class="bcol" onclick="location.href = 'userdashboard.php';">
      <h3>BACK TO DASHBOARD</h3>
    </button>
  </div>
</body>

</html>
<?php } else {
    echo "<script> getloss() </script>";
    echo "<script>location.href='../index.html';</script>";
    exit();
  }
?>