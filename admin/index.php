<?php        
    include "../connect.php"; // выражение include включает и выполняет указанный файл   
    include "../header.php";  
    $news = mysqli_fetch_all(mysqli_query($con, "select news_id, title from news"));  
  
    $id_new = isset($_GET ["new"]) ? $_GET ["new"] : false;  
 
    if ($id_new) $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id = $id_new")); 
     
    if ($id_new) { 
        echo "<div class ='c_img'> <img src='../imeges/news/" . $new_info['image'] . "'></div>"; 
    } 
    ?>   
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Админ панель</title>  
    <link rel="stylesheet" href="../css/style.css"> 
</head>  
<body>  
    <div class="container">  
        <h1>Панель администратора</h1>  
        <div class="admin_content">  
            <section class="col_1">  
                <ul>  
                    <?php   
                    foreach ($news as $new) {  
                        echo"<li><a href='?new=" .$new[0] ."'>" .$new[1]."</a></li>";  
                    } 
                    ?>  
                </ul>  
            </section> 
            <section class="col_2"> 
                <h2><?=$id_new?"Редактирование новости №$id_new":"Создание новости";?></h2>  
 
                <form action='<?=$id_new?"update":"create";?>NewValid.php' method="post" enctype="multipart/form-data">   
                     
                    <?= $id_new?"<img src='/imeges/news/". $new_info['image'] . "' alt ='#' >": "";?>  
                     
                    <?= $id_new?"<input type = 'hidder' name = 'id' value = '$id_new' >": "";?>  
 
                    <label for="newTitle" >Введите название новости</label>   
                    <input type="text" id="newTitle" name="newTitle" class="zagolovok" value='<?=$id_new?$new_info["title"]:"";?>'><br><br>   
 
                    <label for="newTitle" >Введите текст</label>   
                    <input type="text" id="newTitle" name="newTitle" class="zagolovok" value='<?=$id_new?$new_info["content"]:"";?>'><br><br>   
 
                    <label for="newsCat" value='<?=$id_new?$new_info["title"]:"";?>'>Категории:</label>   
                    <select id="newsCat" name="newsCat">   
                        <?php   
                        foreach ($categories as $cat){  
                        $id_cat = $cat[0];   
                        $name = $cat[1];  
                        $is_sel = ($id_cat==$new_info['category_id'])?"selected":''; 
                        echo "<option value ='$id_cat'".($id_new ? $is_sel : '').">$name </option>";  
                        }  
                        ?>  
                    </select><br><br>    
 
                    <label for="newsText" >Текст:</label><br>   
                    <input type="text" id="newsText" name="newsText" rows="4" cols="50" class="zagolovok" placeholder="Введите свою почту"></textarea><br><br>   
 
                    <label for="newsImg">Изображение:</label>   
                    <input type="file" id="newsImg" name="newsImg" accept="image/*" ><br><br>   
 
                    <input type="submit" value="Отправить" class="submit-button">  
 
                
                </form>      
            </section> 
        </div>  
    </div>  
<!-- <?php   
        while($new = mysqli_fetch_assoc($news)){   
            echo "<div class='card'>";   
            echo "<h2 class='c_title'>" . $new['title'] . "</h2>";   
            echo "</div>";   
        }   
    ?>   --> 
</body>  
</html>