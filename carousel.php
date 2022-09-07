<?php
include("publicationdb.php");
?>
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    //SELECT * FROM maTable WHERE id=<idSelect>
    $req = "SELECT * FROM plats ORDER BY id DESC LIMIT 10 ";
    $result = mysqli_query($conn, $req);

    if (mysqli_num_rows($result) > 0) {
      while ($image = mysqli_fetch_assoc($result)) { ?>

        <div class="swiper-slide">
          <img class="img_scroll" src="<?php echo $image['url'] ?>">
          <div class="div_text_scroll">
            <?php echo $image['name'] ?><br>
           <?php echo $image['choice'] ?>
          </div>
        </div>
    <?php }
    } ?>
  </div>
</div>

<style>
  .div_text_scroll{
 font-size:x-small;
  }
  </style>
<!-- les fleches -->
<div class="swiper-button-next" style= "position: absolute;bottom:-20px;color: black; font-weight: bold;top: 185px;left:1230px;
"></div>
      <div class="swiper-button-prev" style="position:absolute;bottom:-20px;color: black; font-weight: bold;top: 185px;"></div>
<!--<div class="swiper-pagination"></div>-->


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 5,
    spaceBetween: 3,
    slidesPerGroup: 5,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>