<?php
session_start();
error_reporting(0);
include('connection.php');

  $id = intval($_GET['iid']);
  if (isset($_POST['submit2'])) {
    $remark = $_POST['remark'];

    $sql = "UPDATE issuesTB SET AdminRemark='$remark' WHERE  IssueID='$id'";
    $query = mysqli_query($con, $sql);
    $msg = "Remark  successfully Updated";
  }

?>
  <script language="javascript" type="text/javascript">
    function f2() {
      window.close();
    }
    ser

    function f3() {
      window.print();
    }
  </script>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Update Compliant</title>
    <link href="style_f.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <link href="anuj.css" rel="stylesheet" type="text/css"> -->
  </head>

  <body>

    <div style="margin-left:50px;">
      <form name="updateticket" id="updateticket" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr height="50">
            <td colspan="2" class="fontkink2" style="padding-left:0px;">
              <div class="fontpink2"> <b>Update Remark !</b></div>
            </td>

          </tr>




          <tr>
            <td colspan="2">  <?php if ($error) { ?><div class=" errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
    </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?></td>

  </tr>

  <tbody>
    <?php
    $sql = "SELECT * from issuesTB where IssueID='$id'";
    $query = mysqli_query($con, $sql);


    while ($row = mysqli_fetch_array($query)) {

      if ($row['AdminRemark'] == "") {
    ?>

        <!-- <tr style=''> -->
          <td class="fontkink1">Remark:</td>
          <td class="fontkink" align="justify"><span class="fontkink">
              <textarea cols="50" rows="7" name="remark" required="required"></textarea>
            </span></td>
        </tr>
        <tr>
          <td class="fontkink1">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="fontkink"> </td>
          <td class="fontkink"> <input type="submit" name="submit2" value="update" size="40" style="cursor: pointer;" /></td>
        </tr>
      <?php } else { ?>
        <tr>
          <td class="fontkink1"><b>Admin Remark:</b></td>
          <td class="fontkink" align="justify"><?php echo htmlentities($row['AdminRemark']); ?></td>
        </tr>
        <tr>
          <td class="fontkink1"><b>Admin Remark Date:</b></td>
          <td class="fontkink" align="justify"><?php echo htmlentities($row['AdminDate']); ?></td>
        </tr>
    <?php
      }
    }
    
    ?>

    </table>
    </form>
    </div>

  </body>

  </html>
<?php  ?>