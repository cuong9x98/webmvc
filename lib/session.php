<?php
/**
*Session Class
**/
class Session{
  //khởi tạo các session Lưu phiên giao dịch
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }
//Lấy giá trị database vào biến session
 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }
//Kiểm tra tồn tại của session
 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }
//Kiểm tra đúng phiên giao dịch không nếu sai thì về trang login.php
 public static function checkSession(){
    self::init();
    if (self::get("adminlogin")== false) {
     self::destroy();
     header("Location:ogin.php");
    }
 }
//Kiểm tra đúng phiên giao dịch không nếu sai thì về trang index.php
 public static function checkLogin(){
    self::init();
    if (self::get("adminlogin")== true) {
     header("Location:index.php");
    }
 }
//Xóa phiên làm việc đó
 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>
