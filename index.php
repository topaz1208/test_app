<?php 
require_once('functions.php'); 
header('Set-Cookie: userId=123'); 
setToken(); //SESSION追記
?> 

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>
<body>
  welcome hello world
    <!-- // SESSION追記 -->
<?php if (!empty($_SESSION['err'])): ?> 
    <p><?= $_SESSION['err']; ?></p> 
  <?php endif; ?> 
  <!-- ここまで -->
  <div>
     <a href="new.php">
       <p>新規作成</p>
     </a>
  </div>
  <div> 
    <table>
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <?php foreach (getTodoList() as $todo) :?>
        <tr>
          
          <td><?= e($todo['id']); ?></td>  
          <td><?= e($todo['content']); ?></td> 
          <td>
            <a href="edit.php?id=<?= e($todo['id']); ?>">更新</a>
          </td>
          <td>
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="<?= e($todo['id']); ?>">
              <!-- // SESSION追記 -->
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"> 
              <!-- ここまで -->
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <!-- // SESSION追記 -->
  <?php unsetError(); ?>
  <!-- ここまで -->
</body>
</html>