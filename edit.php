<?php
require_once('functions.php');
$todo = getSelectedTodo($_GET['id']);
setToken(); // 追記
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  <!-- SESSION追記 -->
  <?php if (!empty($_SESSION['err'])): ?> 
    <p><?= $_SESSION['err']; ?></p> 
  <?php endif; ?> 
  <!-- ここまで -->
  <form action="store.php" method="post">
    <!-- SESSION追記 -->
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"> 
    <!-- ここまで -->
    <input type="hidden" name="id" value="<?= e($_GET['id']); ?>"> 
    <input type="text" name="content" value="<?= e($todo); ?>"> 
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?>
</body>
</html>