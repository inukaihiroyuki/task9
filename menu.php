<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php">アンケート一覧</a>
            <?php if($_SESSION["kanri_flg"]=="1"){ ?> 
            
            <a class="navbar-brand" href="index_user.php">ユーザー登録</a>
           
                <a class="navbar-brand" href="select_user.php">ユーザー一覧</a>
            <?php } ?>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>