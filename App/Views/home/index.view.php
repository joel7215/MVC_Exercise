<!-- <div class="text-center vh-50 d-flex flex-column justify-content-center m-5">
    <h1 class="display-3 mb-2">MVC exemple 2n DAW curs 2025-2026</h1>
<img src="../../../Public/Assets/img/mvc.png" class="rounded mx-auto d-block" alt="..."> -->
<?php
    use App\Models\User;
    use App\Models\Orm;
    $user=new User;
    $home=new homeController;
    
    // $user->reset();
    $home->loadUserData();
    $u=$user->getLastId();
    
    echo "<pre>";
    echo $u["username"];
    print_r($user->getAll());
    echo "</pre>";
?>
<!-- </div> -->


