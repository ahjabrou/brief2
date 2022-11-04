<!--like et dislike dans la même table "plats"-->
<?php
$con = mysqli_connect('localhost', 'root', '', 'utilisateurs');
$id = $_GET['page'];
$sql = "SELECT * FROM plats WHERE id=$id ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>

<head>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <style>
        .com {
            border: none;


        }

        .commenter {
            position: absolute;
            left: 250px;
            top: 565px;
            border: 1.5px solid #36b;
            border-radius: 15px;
            padding-left: 10px;
            width: 600px;
            height: 80px;

        }

        .comment {
            width: 70px;
            position: absolute;
            top: 565px;
            left: 850px;
        }

        /* .icon{
        position:absolute;
        top:520px;
        left:345px;
    }
    .icon1{
        position:absolute;
        top:525px;
        left:420px;
    } */
        .im {
            border: 2px solid greenyellow;
            border-radius: 35px;
            position: absolute;
            left: 250px;
            top: 320px;
            width: 300px;
            height: 200px;
        }

        .image {
            width: 75%;
            height: 75%;
            margin-left: 35px;
            margin-top: 20px;
            align-items: center;

        }

        h3 {
            position: absolute;
            top: 280px;
            left: 500px;
            color: #008518;
            text-decoration: none;
        }

        .message {
            color: black;
            position: absolute;
            top: 380px;
            left: 565px;
        }

        h5 {
            position: absolute;
            top: 340px;
            left: 565px;
            color: #3551EC;
        }

        p {
            color: #596CE5;
            position: absolute;
            top: 500px;
            left: 565px;

        }

        .dat {
            font-weight: normal;
        }

        a {
            text-decoration: none;
            color: black;
        }

        #dislike_loop_ {



            border-style: solid;
            border-color: red;
            border-radius: 60px;
            width: 40px;
            padding-left: 7.3px;
            height: 40px;
            padding-top: 5px;
            background-color: red;
        }
    </style>

</head>

<body>
    <?php while ($image = mysqli_fetch_assoc($res)) { ?>

        <a href="index.php?page=<?= $image['id'] ?>">
            <h3><?php echo $image['choice'] ?></h3>
            <div class="im">
                <img class="image" src="<?php echo $image['url'] ?>">
            </div>
        </a>
        <h5><?php echo $image['name'] ?></h5>
        <p class="message"><?php echo $image['message'] ?></p>
        <p class="dat">publié le : <?php echo $image['date_de_publication'] ?></p>

<!-- boutons like et dislike -->
        <a href="javascript:void(0)" style="position:absolute;top:520px;left:345px;">
            <span class="icon" name="like" onclick="like_update('<?php echo $image['id'] ?>')">
                <iconify-icon class="icon" icon="ant-design:like-twotone" style="color: blue;" width="30" height="30" alt="like">Like </iconify-icon>
            </span>
        </a>
        (<span id="like_loop_<?php echo $image['id'] ?>" style="position:absolute;
                                                                left:300px;
                                                                top:520px;
                                                                color:white;
                                                                border-style:solid;
                                                                border-color:blue;
                                                                border-radius:60px;
                                                                width:40px;
                                                                padding-left:7.3px;
                                                                height:40px;
                                                                padding-top:5px;
                                                                background-color:blue;"><?php echo $image['like_count'] ?></span>

        <a href="javascript:void(0)" style="position:absolute;top:525px;left:420px;">
            <span class="icon1" onclick="dislike_update('<?php echo $image['id'] ?>')">
                  <iconify-icon class="icon1" icon="ant-design:dislike-twotone" style="color: red;" width="30" height="30" alt="dislike">Dislike </iconify-icon>
                  </span>
        </a>
        <span id="dislike_loop_<?php echo $image['id'] ?>" style="position:absolute;
                                                                  left:460px;
                                                                  top:520px;
                                                                  color:white;
                                                                  border-style:solid;
                                                                  border-color: red;
                                                                  border-radius: 60px;
                                                                  width: 40px;
                                                                  padding-left: 7.3px;
                                                                  height: 40px;
                                                                  padding-top: 5px;
                                                                  background-color: red;"><?php echo $image['dislike_count'] ?></span>

<!-- Formulaire de commentaire -->
<form action="comment.php?id=<?=$id ?>" method="POST">
<input class="commenter" name="commentaire" placeholder="commentaire..." maxlength="300">
<button type="submit" class="com" name="commenta"><a href="index.php?page=<?php echo $id?>"><img class ="comment" src="oval-black-speech-bubble.png" alt=""></a></button>
     </form>
    <?php } ?>

    <script>
        function like_update(id) {
            jQuery.ajax({
                url: 'updatelikecount.php',
                type: 'post',
                data: 'type=like&id=' + id,
                success: function(result) {
                    var cur_count = jQuery('#like_loop_' + id).html();
                    cur_count++;
                    jQuery('#like_loop_' + id).html(cur_count);

                }
            });
        }

        function dislike_update(id) {
            jQuery.ajax({
                url: 'updatelikecount.php',
                type: 'post',
                data: 'type=dislike&id=' + id,
                success: function(result) {
                    var cur_count = jQuery('#dislike_loop_' + id).html();
                    cur_count++;
                    jQuery('#dislike_loop_' + id).html(cur_count);

                }
            });
        }
    </script>

</body>

</html>