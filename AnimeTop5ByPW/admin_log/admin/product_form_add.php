<?php include('h.php');?>

<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
	  
        <div class="form-group">
          <div class="col-sm-9">
            <p> product name</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="product name" />
          </div>
        </div>
		
        <div class="form-group">
          <div class="col-sm-8">
            <p> product type</p>
            <select name="type_id" class="form-control" required>
              <option value="type_id">product type</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
		
		<div class="form-group">
          <div class="col-sm-9">
            <p> detail </p>
             <textarea  name="p_price" rows="5" cols="60"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <p> detail </p>
             <textarea  name="p_detail" rows="5" cols="60"></textarea>
          </div>
        </div>
		
        <div class="form-group">
          <div class="col-sm-12">
            <p> product img </p>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> save</button>
            
          </div>
        </div>
      </form>
    </div>
  </div>