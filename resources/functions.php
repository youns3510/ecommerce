<?php
function redirect($location)
{
  header('location:' . $location);
}

function query($sql)
{
  global $connection;
  return mysqli_query($connection, $sql);
}

function confirm($result)
{
  global $connection;
  if (!$result) {
    die("Query Failed : " . mysqli_error($connection));
  }
}


function escape_sting($string)
{
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}


function fetch_array($sql)
{
  return mysqli_fetch_array($sql);
}
function count_data($result)
{
  return mysqli_num_rows($result);
}

// get products index page

function get_products()
{
  $q = query("SELECT * FROM  `products`;");
  confirm($q);
  while ($row = fetch_array($q)) {
    echo '
      <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
      <a href="/public/item.php?id=' . $row["product_id"] . '">
          <img src="/resources/templates/front/uploads/' . $row["product_image"] . '" alt=""></a>
          <div class="caption">
              <h4 class="pull-right">&dollar;' . $row["product_price"] . '</h4>
              <h4><a href="/public/item.php?id=' . $row["product_id"] . '">product ' . $row["product_id"] . '</a>
              </h4>
              <p>' . $row["product_short_desc"] . '</p>
          </div>
          <div class="ratings">
              <p class="pull-right">15 reviews</p>
              <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
              </p>
          </div>
        </div>
      </div>';
  }
}

// get category_ products
function get_category_products($id)
{
  if (!is_int($id)) {
    die("Qeury Error: no category found");
  }
  $result = query("SELECT * FROM  `products` WHERE `product_category_id` = {$id};");
  confirm($result);
  echo  count_data($result) > 0 ? '<h5>No.Prodcuts: ' . count_data($result) . '</h5>' : '<h5>No Prodcuts  here </h5>';
  while ($row = fetch_array($result)) {
    echo '
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
        <a href="/public/item.php?id=' . $row["product_id"] . '">
        <img src="/resources/templates/front/uploads/' . $row["product_image"] . '" alt="">
        </a> 
            <div class="caption">
            <h4 class="pull-right">&dollar;' . $row["product_price"] . '</h4>
            <h4><a href="/public/item.php?id=' . $row["product_id"] . '">product ' . $row["product_id"] . '</a>
            </h4>
            <p>' . $row["product_short_desc"] . '</p>
            </div>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="/public/item.php?id=' . $row["product_id"] . '" class="btn btn-default">More Info</a>
                </p>
          
                </div>
    </div>';
  }
}
function get_category()
{
  $q = query("SELECT * FROM `categories`;");
  confirm($q);
  while ($row = fetch_array($q)) {

    echo ' <a id="' . $row['cat_id'] . '" href="category.php?id=' . $row['cat_id'] . '" class="list-group-item">' . $row['cat_title'] . '</a>';
  }
}
