<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath =realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php   
        
        if (!isset($_GET['customerid']) || $_GET['customerid']==NULL) {
            echo "<script>window.location ='inbox.php'</script>";
            
        }else{
            $id =$_GET['customerid'];
        }
        $cs = new customer();
       
    
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sủa danh mục</h2>
               <div class="block copyblock"> 
                <?php 
                    $get_customer = $cs->show_customer($id); 
                    if ($get_customer) {
                        while ($result = $get_customer->fetch_assoc()) {
                    ?>
                 <form action="" method="post">
                    <table  class="form">                   
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['name']?>" name="catName" placeholder="Sửa nội dung" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                   
                    <?php 
                        }
                    }
                     ?>
                </div>
                
            </div>
        </div>
<?php include 'inc/footer.php';?>