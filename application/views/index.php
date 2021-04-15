<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Players</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }
        .container{
            max-width: 1200px;
            margin: 40px auto;
        }
        .container > *{
            padding:20px;
            display: inline-block;
            vertical-align: top;
        }
        .search label{
            display: block;
        }
        .sidebar{
            border: 1px solid black;
            height: 100%;
            width: 20%;
        }
        .player{
            width: 200px;
            display: inline-block;
            margin: 10px;
            text-align: center;
            vertical-align: top;
        }
        .player img{
            width: 100%;
            height: 150px;
        }
        .player-container{
            width: 79%;
        }
        h3{
            margin: 20px 0px 10px 0px;
        }
        .search{
            margin-bottom: 10px;
        }
        .btn{
            padding:8px 15px;
            background-color: #92e8ff;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            box-shadow: 1px 1px 4px rgba(0,0,0,.4);
        }
    </style>
</head>

<body>
    <div class="container">
       <div class="sidebar">
        <form action="/" method="get">
                <div class="search">
                    <label for="">Search Users</label>
                    <input type="text" name="name" value="<?= $this->session->flashdata('search') ?>">
                </div>
                <div>
                    <input type="checkbox" name="gender[]" value="male">
                    <label for="">Male</label>
                </div>
                <div>
                    <input type="checkbox" name="gender[]" value="female">
                    <label for="">Female</label>
                </div>
                <h3>Sports</h3>
                <?php 
                    foreach($sports as $sport){

                ?>
                    <div>
                        <input type="checkbox" name="sports[]" value="<?= $sport->id ?>">
                        <label for=""><?= $sport->name ?></label>
                    </div>
                <?php } ?>
                <input type="submit" value="Search" class="btn">
            </form>
       </div>
       <div class="player-container">
           <?php foreach($players as $player){?>
            <div class="player">
                <img src="<?= $player->image?>" alt="">
                <p><?= $player->name ?></p>
            </div>
            <?php } ?>
       </div>
    </div>
</body>

</html>