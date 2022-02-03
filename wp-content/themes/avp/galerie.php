<?php
get_header();
function t() { echo get_template_directory_uri(); }
?>

<main>
  <section>
    <div class="col">
      <h2 class="center">Galerie</h2>
      <div class="galerie w1280">
        <div class="gr">
          <button class="alive" data-src="<?php t(); ?>/imgs/vis/1.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/1.jpg">
          </button>
          <button class="alive w2 h2" data-src="<?php t(); ?>/imgs/vis/2.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/2.jpg">
          </button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="alive" data-src="<?php t(); ?>/imgs/vis/3.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/3.jpg">
          </button>
          <button class="dead"></button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="alive h2" data-src="<?php t(); ?>/imgs/vis/5.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/5.jpg">
          </button>
          <button class="alive" data-src="<?php t(); ?>/imgs/vis/4.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/4.jpg">
          </button>
          <button class="alive" data-src="<?php t(); ?>/imgs/vis/6.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/6.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="dead"></button>
          <button class="alive" data-src="<?php t(); ?>/imgs/vis/7.jpg">
            <img src="<?php t(); ?>/imgs/vis/thumb/7.jpg">
          </button>
          <button class="alive h2" data-src="<?php t(); ?>/imgs/photos/new/full/gal_1.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/800/gal_1.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="alive w2 h2" data-src="<?php t(); ?>/imgs/photos/new/full/gal_2.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/800/gal_2.jpg">
          </button>
          <button class="dead"></button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="dead"></button>
          <button class="dead"></button>
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/gal_3.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/gal_3.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/gal_6.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/gal_6.jpg">
          </button>
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/vie_sportive.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/full/vie_sportive.jpg">
          </button>
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/vie_artistique.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/vie_artistique.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/gal_4.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/gal_4.jpg">
          </button>
          <button class="alive w2 h2" data-src="<?php t(); ?>/imgs/photos/new/800/gal_5.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/800/gal_5.jpg">
          </button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/vie_pratique.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/vie_pratique.jpg">
          </button>
          <button class="dead"></button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="alive h2 w2" data-src="<?php t(); ?>/imgs/photos/new/full/lcite_de_lenergie.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/800/lcite_de_lenergie.jpg">
          </button>
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/le_bonheur_est_dans_la_ville.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/le_bonheur_est_dans_la_ville.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="dead"></button>
          <button class="dead"></button>
          <button class="alive" data-src="<?php t(); ?>/imgs/photos/new/full/amusement.jpg">
            <img src="<?php t(); ?>/imgs/photos/new/500/amusement.jpg">
          </button>
        </div>
        <div class="gr">
          <button class="alive w2 h2" data-src="<?php t(); ?>/imgs/masterplan.jpg">
            <img src="<?php t(); ?>/imgs/masterplan.jpg">
          </button>
          <button class="dead"></button>
          <button class="dead"></button>
        </div>
        <div class="gr">
          <button class="dead"></button>
          <button class="dead"></button>
          <button class="dead"></button>
        </div>

        <div id="fs">
          <div id="fs-wrap">
            <div id="fs-img"></div>
          </div>
          <button class="prev" onclick="changeImg(false)"></button>
          <button class="next" onclick="changeImg(true)"></button>
          <button class="close" onclick="fsClose()"></button>
        </div>

        <script>
        var cnt = 0;
        var imgs = [];
        var imgActive = 1;
        $(".alive").each(function() {
          $(this).addClass("img-" + (cnt));
          imgs[cnt] = $(this).attr("data-src");
          cnt++;
        });

        /*** FUNCTIONS ***/

        var opened = false,
          zoomed = false,
          move = false;
        var cX = 0,
          cY = 0,
          lX = 0,
          lY = 0,
          nX = 0,
          nY = 0;

        function changeImg(dir) {
          if (dir) {
            imgActive++;
            if (imgActive > imgs.length - 1) {
              imgActive = 0;
            }
          } else {
            imgActive--;
            if (imgActive < 0) {
              imgActive = imgs.length - 1;
            }
          }
          var src = imgs[imgActive];
          $("#fs-img").css("background-image", "url(" + src + ")");
        }

        function fsOpen(img) {
          opened = true;
          $("html").addClass("overflow");
          $("#fs").addClass("active");
          var url = "url(" + img.attr("data-src") + ")";
          $("#fs-img").css("background-image", url);
          imgActive = img.attr("class").split(" ").pop().slice(4);
        }

        function fsClose() {
          if (zoomed) {
            $("#fs").removeClass("zoomed");
            zoomed = false;
            cX = 0;
            cY = 0;
            lX = 0;
            lY = 0;
            nX = 0;
            nY = 0;
          } else {
            opened = false;
            $("#fs-img").css("background-image", "");
            $("#fs").toggleClass("active");
            $("html").removeClass("overflow");
          }
          $("#fs-img").css("transform", "");
        }

        function fsZoom() {
          if (zoomed == false) {
            zoomed = true;
            $("#fs").addClass("zoomed");
            $("#fs-img").css("transform", "");
          }
        }

        /*** ACTIONS ***/

        $(".alive").click(function() {
          fsOpen($(this));
        });

        $("#fs-wrap").click(function() {
          if (opened) {
            fsZoom();
          }
        });

        $(document).mousedown(function(e) {
          if (opened && zoomed) {
            move = true;
            nX = e.pageX;
            nY = e.pageY;
            $("#fs").addClass("moving");
          }
        });

        $(document).mouseup(function(e) {
          if (opened && move && zoomed) {
            move = false;
            lX = cX * 2;
            lY = cY * 2;
            $("#fs").removeClass("moving");
          }
        });

        $(document).mousemove(function(e) {
          if (opened && move && zoomed) {
            cX = (e.pageX - nX + lX) / 2;
            cY = (e.pageY - nY + lY) / 2;
            if (cX < -ww / 2) {
              cX = -ww / 2;
            }
            if (cX > ww / 2) {
              cX = ww / 2;
            }
            if (cY < -wh / 2) {
              cY = -wh / 2;
            }
            if (cY > wh / 2) {
              cY = wh / 2;
            }
            $("#fs-img").css("transform", "translate(" + cX + "px, " + cY + "px)");
          }
        });

        window.addEventListener("wheel", function(e) {
          if (opened) {
            if (e.deltaY < 0) {
              fsZoom();
            } else if (e.deltaY > 0 && zoomed) {
              fsClose();
            }
          }
        });
        </script>
      </div>
    </div>
  </section>
</main>

<?php get_footer();