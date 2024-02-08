<?php 
    include "connect.php"; 
    $query_category = "SELECT * FROM categories"; 
    $categories=mysqli_fetch_all( mysqli_query($con, $query_category )); 
 
 
    ?> 
    <!DOCTYPE html> 
    <html> 
    <head> 
        <meta charset='utf-8'> 
        <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
        <title>Page Title</title> 
        <meta name='viewport' content='width=device-width, initial-scale=1'> 
        <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'> 
        <script src='main.js'></script> 
    </head> 
    <body> 
        <header> 
            <div class="nav-header"> 
                    <h2>Разделы</h2> 
                    <div class="searcch-block"> 
                        <img src="imeges/Search.svg" alt=""> 
                    <input type="text" placeholder=" Поиск" class="poisk" > 
                    </div> 
                     
                    <div class="vhod"> 
                        <img src="imeges/1.svg" alt=""> 
                        <a href="#" >Вход</a> 
                    </div> 
            </div> 
            <div class="text-name"> 
                <h1 class="namePost1">Пингвины</h1> 
                <h3>Понедельник, Январь 1, 2018</h3> 
                <div class="pogoda"> 
                    <img src="imeges/Sun.svg" alt=""> 
                    <h3>-23°C</h3> 
                </div> 
            </div> 
        </header> 
                <main>  
        <div class="text-main">  
            <?php foreach($categories as $category ){  
 
                echo "<li><a href='#'>$category[1]</a></li>";  
                echo "<hr>";  
                }  
            ?>  
        </div>  
    </main>  
            <form action="createNewValid.php" method="post" enctype="multipart/form-data">  
                <label for="newsCat">Категории:</label>  
                <select id="newsCat" name="newsCat">  
            <?php  
            foreach ($categories as $cat){ 
                $id_cat = $cat[0];  
                $name = $cat[1]; 
 
                echo "<option value ='$id_cat'> $name </option>"; 
            } 
            ?> 
                  
                </select><br><br> 
                <label for="newTitle" >Заголовок:</label>  
        <input type="text" id="newTitle" name="newTitle" class="zagolovok"><br><br>  
 
                <label for="newsText" >Текст:</label><br>  
                <input type="text" id="newsText" name="newsText" rows="4" cols="50" class="zagolovok" placeholder="Введите свою почту"></textarea><br><br>  
                 
                <label for="newsImg">Изображение:</label>  
                <input type="file" id="newsImg" name="newsImg" accept="image/*" ><br><br>  
 
                <input type="submit" value="Отправить" class="submit-button">  
            </form>  
             
 
    </body> 
    </html>