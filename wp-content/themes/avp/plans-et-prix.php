<?php get_header(); ?>

<main id="plans-et-prix">
  <section>
    <div class="h hidden col center">
      <h2>Les plans et prix</h2>
      <div id="facade"><?php include("imgs/facade.svg"); ?></div>
    </div>
  </section>

  <section class="prix">
    <div class="h hidden origin-t col">
      <div class="avp-filters" style="display: none;">
        <div class="f1">
          <input type="checkbox" id="f1-1" value="A" checked>
          <label for="f1-1">Bâtiment A</label>
          <input type="checkbox" id="f1-2" value="B" checked>
          <label for="f1-2">Bâtiment B</label>
          <input type="checkbox" id="f1-3" value="C" checked>
          <label for="f1-3">Bâtiment C</label>
        </div>
        <div class="f3">
          <input type="checkbox" id="f3-1" value="Studio" checked>
          <label for="f3-1">Studio</label>
          <input type="checkbox" id="f3-2" value="1.5" checked>
          <label for="f3-2">1.5 pièces</label>
          <input type="checkbox" id="f3-3" value="2.5" checked>
          <label for="f3-3">2.5 pièces</label>
          <input type="checkbox" id="f3-4" value="3.5" checked>
          <label for="f3-4">3.5 pièces</label>
          <input type="checkbox" id="f3-5" value="4.5" checked>
          <label for="f3-5">4.5 pièces</label>
          <input type="checkbox" id="f3-6" value="5.5" checked>
          <label for="f3-6">5.5 pièces</label>
        </div>

        <script>
        $(".avp-filters input").change(function() {
          var match = [],
            f1 = [],
            f3 = [];
          $(".f1 input").each(function() {
            if (this.checked) {
              f1.push(this.value);
            }
          });
          $(".f3 input").each(function() {
            if (this.checked) {
              f3.push(this.value);
            }
          });

          match.push(f1);
          match.push(f3);

          var parity = true;
          $(".avp-prix tbody tr").each(function() {
            var hide = true;
            var tr = $(this);

            var tds = [
              tr.find(".column-1").text(),
              tr.find(".column-3").text()
            ];

            //coś nie bangla
            for (var y = 0; y < match.length; y++) {
              for (var x = 0; x < match[y].length; x++) {
                if (tds[y] == match[y][x]) {
                  hide = false;
                }
              }
            }

            tr.removeClass("even");
            tr.removeClass("odd");

            if (hide) {
              tr.removeClass("visible");
              tr.addClass("hide");
              setTimeout(function() {
                tr.find("td").addClass("hidden");
              }, 300);
              setTimeout(function() {
                tr.addClass("hidden");
              }, 600);
            } else {
              tr.removeClass("hide");
              tr.removeClass("hidden");
              tr.addClass("visible");
              (parity) ? tr.addClass("odd"): tr.addClass("even");
              parity = !parity;
              setTimeout(function() {
                tr.find("td").removeClass("hidden");
              }, 500);
            }
          });
        });
        </script>
      </div>
      <div>
        <?php //echo do_shortcode("[table id=1 /]"); ?>
        <?php echo do_shortcode("[avp_prix_table]"); ?>
      </div>
      <br/>
      <div class='parc'>
        <p>Places de parc</p>
        <p>Places de parc en souterrain ainsi qu’à l’extérieur sont à disposition en supplément du prix de vente de
          l’appartement</p>
      </div>
    </div>

    <div id="lot-container">
      <div class="row w1280">
        <div><img id="lot-png" src=""></div>
        <div id="lot-data">
          <div id="lot-name">
            <h4 id="l2"></h4>
            <p id="status"></p>
          </div>

          <?php echo do_shortcode("[avp_lot_data]"); ?>
          <a id="lot-pdf" class="btn" href="" download>Télécharger le PDF</a>
          <a class="btn" href="<?php echo home_url("/"); ?>contact/">Contact</a>
        </div>
        <button class="close" onclick="closeFull()"></button>
      </div>
    </div>

  </section>

  <div id="tooltip">
    <div><?php echo do_shortcode("[avp_lot_data]"); ?></div>
  </div>

  <script>
  /////////////////////////////////////////////////////////
  //ADD m2 AND CHF
  /////////////////////////////////////////////////////////

  $(".avp-prix td").each(function() {
    if ($(this).text() == "") {
      $(this).text("-");
    }
  });

  $(".avp-prix td.column-6, .avp-prix td.column-7, .avp-prix td.column-8, .avp-prix td.column-9, .avp-prix td.column-10, .avp-prix td.column-11, .avp-prix td.column-12, .avp-prix td.column-13, .avp-prix td.column-14, .avp-prix td.column-15, .avp-prix td.column-16, .avp-prix td.column-17, .avp-prix td.column-18, .avp-prix td.column-19")
    .each(function() {
      $(this).text($(this).text().replace(",", "."));
      var text = $(this).text();
      if (text != "-") {
        $(this).append(" m<sup>2</sup>");
      }
    });

  $(".avp-prix td.column-20").each(function() {
    var text = $(this).text();
    if (text != "-") {
      text = text.replace(/\B(?=(\d{3})+(?!\d))/g, "'");
      $(this).text("CHF " + text + ".-");
    }
  });

  $(".avp-lot-data tr:eq(1)").addClass("table-header");
  $(".avp-lot-data tr:eq(0)").insertAfter(".table-header");

  /////////////////////////////////////////////////////////
  //SVG FLOOR MOVE ON MOUSE OVER
  /////////////////////////////////////////////////////////

  $(".floor").mouseover(function() {
    var id = this.id;
    var bat = id.substring(6, 7);
    var nr = parseInt(id.substring(7, 9));
    $(".floor").removeClass("move");
    for (var x = nr; x < 7; x++) {
      $("#floor-" + bat + (x + 1)).addClass("move");
    }
  });

  $(".floor").mouseout(function() {
    $(".floor").removeClass("move");
  });

  /////////////////////////////////////////////////////////
  //TOOLTIP
  /////////////////////////////////////////////////////////

  $(".lot").on("mouseover", function() {
    $("#tooltip").addClass("visible");
    var tr = $("." + $(this).attr("id"));
    for (var x = 0; x < 21; x++) {
      var td = tr.find("td.column-" + x).html();
      $("#tooltip td.column-" + x).html(td);
    }
    var td = tr.find("td.column-21").text();
    $("#tooltip td.column-21").text(td);
  });

  $(".lot").on("mouseout", function() {
    $("#tooltip").removeClass("visible");
  });

  /////////////////////////////////////////////////////////
  //TOOLTIP POSITION
  /////////////////////////////////////////////////////////

  var left, top1, top2, wh, tooltip;
  $(window).on("mousemove", function(e) {
    wh = $(window).height();
    tooltip = $("#tooltip").height();

    (ww >= 1920 ? left = e.pageX + 15 - (ww - 1920) / 2 : left = e.pageX + 15);
    top1 = e.pageY + 15;
    top2 = e.clientY;
    if (top2 > wh - tooltip - 15) {
      top1 = top1 - top2 + wh - tooltip - 15;
    }

    $("#tooltip").css("left", left);
    $("#tooltip").css("top", top1);
  });

  /////////////////////////////////////////////////////////
  //ADD HOVER COLOR TO FACADE DEPENDING OF STATUS
  /////////////////////////////////////////////////////////

  $(document).ready(function() {
    $(".avp-prix tbody tr").each(function() {
      var id = this.classList;
      if (id[2] == "v") {
        $("#" + id[1]).addClass("v");
      }
      if (id[2] == "r") {
        $("#" + id[1]).addClass("r");
      }
      if (id[2] == "d") {
        $("#" + id[1]).addClass("d");
      }
    });
  })

  /////////////////////////////////////////////////////////
  //ADD HOVER EFFECT TO FACADE IF HOVER ON TABLE
  /////////////////////////////////////////////////////////

  $(".avp-prix tbody tr").mouseover(function() {
    var cl = this.classList[1];
    $("." + cl + ", #" + cl).addClass("hover");

    //var lotId = $(this).find(".column-2").text();
    //$("#lot-" + lotId).addClass("hover");
  });

  $(".avp-prix tbody tr").mouseout(function() {
    var cl = this.classList[1];
    $("." + cl + ", #" + cl).removeClass("hover");
  });

  /////////////////////////////////////////////////////////
  //RENAME TABLE HEADERS TO SHORTER VERSIONS IF RES<800
  /////////////////////////////////////////////////////////

  function renameTableHeades() {
    if (ww < 900) {
      $(".avp-prix th.column-15").text("Surface");
      $(".avp-prix th.column-21").text("Statut");
    }
    if (ww >= 500 && ww < 900) {
      $(".avp-prix th.column-1").text("Bât.");
      $(".avp-prix th.column-6").text("Surf. hab.");
      $(".avp-prix th.column-7").text("Balcon");
      $(".avp-prix th.column-9").text("Jardin");
      $(".avp-prix th.column-11").text("Terrasse");
      $(".avp-prix th.column-12").text("Surf.");
      $(".avp-prix th.column-13").text("Loggia");
      $(".avp-prix th.column-15").text("Surf. de vente");
      $(".avp-prix th.column-18").text("Cave");
      $(".avp-prix th.column-21").text("Statut");
    }
    if (ww >= 900 && ww <= 1600) {
      $(".avp-prix th.column-1").text("Bâtiment");
      $(".avp-prix th.column-6").text("Surface habitable");
      $(".avp-prix th.column-7").text("Balcon");
      $(".avp-prix th.column-9").text("Jardin");
      $(".avp-prix th.column-11").text("Terrasse");
      $(".avp-prix th.column-12").text("Surface");
      $(".avp-prix th.column-13").text("Loggia");
      $(".avp-prix th.column-15").text("Surface de vente");
      $(".avp-prix th.column-18").text("Surface cave");
      $(".avp-prix th.column-21").text("Statut");
    }
    if (ww > 1600) {
      $(".avp-prix th.column-1").text("Bâtiment");
      $(".avp-prix th.column-6").text("Surface habitable");
      $(".avp-prix th.column-7").text("Surface de balcon");
      $(".avp-prix th.column-9").text("Surface de jardin");
      $(".avp-prix th.column-11").text("Surface de terrasse");
      $(".avp-prix th.column-12").text("Surface");
      $(".avp-prix th.column-13").text("Surface loggia");
      $(".avp-prix th.column-15").text("Surface de vente");
      $(".avp-prix th.column-18").text("Surface cave");
      $(".avp-prix th.column-21").text("Statut");
    }
  }

  $(window).resize(function() {
    renameTableHeades();
  });
  renameTableHeades();

  /////////////////////////////////////////////////////////
  //CHANGE OPACITY OF NOT HOVERED BUILDINGS
  /////////////////////////////////////////////////////////

  $(".bat").mouseover(function() {
    $(".bat").addClass("hide");
    $(this).removeClass("hide");
  });

  $(".bat").mouseout(function() {
    $(".bat").removeClass("hide");
  });

  /////////////////////////////////////////////////////////
  //DISPLAY MOREBOX AFTER CLICK ON FACADE OR TABLE
  /////////////////////////////////////////////////////////

  $(".lot").click(function() {
    var id = $(this).attr("id");
    lotFullscreen(id);
  });

  $(".avp-prix tbody tr").click(function() {
    var id = this.classList[1];
    lotFullscreen(id);
  });

  function lotFullscreen(id) {
    $("#lot-container").addClass("active")
    $("html").addClass("overflow");

    for (var x = 0; x < 21; x++) {
      var td = $("." + id).find(".column-" + x).html();
      $(".avp-lot-data td.column-" + x).html(td);
    }
    $(".avp-lot-data td.column-21").text($("." + id).find(".column-21").text());

    var path = "../wp-content/themes/avp/plans/taou-" + id;
    $("#lot-png").attr("src", path + ".png");
    $("#lot-pdf").attr("href", path + ".pdf");
  }

  //CLOSE LOT POPUP
  function closeFull() {
    $("#lot-container").removeClass("active");
    $("html").removeClass("overflow");
    setTimeout(function() {
      $("#lot-png").attr("src", "");
    }, 300);
  }

  /////////////////////////////////////////////////////////
  //TABLE SORT AFTER CLICK ON TH
  /////////////////////////////////////////////////////////

  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementsByClassName("avp-prix")[0];
    switching = true;
    dir = "asc";
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByClassName("column-" + n)[0];
        y = rows[i + 1].getElementsByClassName("column-" + n)[0];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }

    var parity = true;
    $(".avp-prix tbody tr").each(function() {
      $(this).removeClass("even");
      $(this).removeClass("odd");
      (parity) ? $(this).addClass("odd"): $(this).addClass("even");
      parity = !parity;
    });
  }
  </script>


</main>

<?php get_footer();