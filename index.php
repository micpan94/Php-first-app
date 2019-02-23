<html>
<head>
    <title>To do List Application</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">



</head>

<body>

    <div class="header">

    <h1>Co by tu zrobić ?</h1>


    </div>


    <form method="post" action="">
        
        
           <?php $db = mysqli_connect("localhost","root","","todo") or die ("QUERY FAILED" . mysqli_error($db) ); ?>
           
            <?php
            if (isset($_POST['submit'])){

                $task = $_POST['task'];
                $query = "INSERT INTO tasks (task) VALUES('$task')";
                $run_query = mysqli_query($db,$query);

            }

            ?>

          
        
       

        <input type="text" name ="task" class="task">
        <button type="submit" name="submit" class="btn">+</button>  

    </form>

    <table>
        <thead>

            <tr>
                <th>N</th>
                <th></th>
                <th>User</th>
                <th></th>
                <th>Task</th>
                <th></th>
                <th>Action</th>
                <th></th>
                <th></th>
                <th>Time</th>
                <th></th>
            </tr>
         </thead>
         
            <tbody>

                    <?php 
                        $run_task = mysqli_query($db,"SELECT * FROM tasks LIMIT 20");
                        while($row = mysqli_fetch_assoc($run_task)) 
                        {
                            $id = $row['id'];
                            $task1 = $row['task'];
                            $name = "<i style='color:#999;'>Panek</i>";
                            $time = $row['time'];


                      
                    
                    
                    
                    ?>

                    <tr>    

                    <td><?php echo $id; ?></td>
                    <td></td>
                    <td><?php echo  $name; ?></td>
                    <td></td>
                    <td><?php echo $task1; ?></td>
                    <td></td>
                    <td class="edit"><i class="icon-pencil"></i> <a href=""></a></td>
                    <td class="delete"><a href="index.php?delete=<?php echo $id; ?>">x</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $time; ?></td>               


                    </tr>

                        <?php } 
                        if (isset($_GET['delete']))
                        {
                            $delete = $_GET['delete'];
                            $query = "DELETE FROM tasks WHERE id = '$delete' ";
                            $run = mysqli_query($db,$query);

                                header('location: index.php');
                            


                        }
                        
                        
                        ?>

            
        
                </tbody>

                <?php
                

                
                ?>


    </table>
    
    <div id="stop">
        Michał Pankiewicz 2019
    </div>

</body>



</html>