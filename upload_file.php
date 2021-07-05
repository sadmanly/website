

<?php
include_once "src.php";

if($_FILES["file"]["size"] < 300*1024*1024)
{
    if($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists("./upload/" . $_FILES["file"]["name"]))
        {
            echo "Error info : ".$_FILES["file"]["name"] . " already exists. "."<br \>";
        }
        else
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"],
            "./upload/" . $_FILES["file"]["name"]))
            {
                echo "Stored in: " . "./upload/" . $_FILES["file"]["name"];
                $sql = "INSERT INTO src_file (name) VALUES ('".$_FILES["file"]["name"] . "')";
                do_sql($sql);
                $id = get_max_id();
                $cmd = "./bin/run " . $id;
                do_cmd($cmd);
                echo "  上传成功"."<br />";
            }
            else
            {
                echo "Stored error"."<br />";
            }
        }
    }
}
else
{
  echo "Invalid file";
}

?>


<script>
let pageVisibility = document.visibilityState; 
// 监听 visibility change 事件 
document.addEventListener('visibilitychange', function() {
  // 页面变为不可见时触发 
  if (document.visibilityState == 'hidden') {
    document.title = '死鬼，你去哪儿了';
  } 
  // 页面变为可见时触发 
  if (document.visibilityState == 'visible') {
    document.title = '欢迎回家';
  } 
  }
);
</script>
<button type="button"
onclick="self.location='login_s.php'">
返回首页
</button>

