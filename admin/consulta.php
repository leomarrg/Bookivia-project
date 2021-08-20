<?php
  $sql = "";
  function ejecutarQuery($sql){
  require_once '../connections.php';

    $result = mysqli_query($db,$sql);
    $data = array();
    if( mysqli_num_rows($result) > 0 ){
      while( $row = mysqli_fetch_array($result) ){
        $data[] = $row;
      }
    }
    return $data;
  }

  function buscarFechas($fecha1,$fecha2){
    //$sql = "SELECT * FROM fechas WHERE fecha BETWEEN '".$fecha1."' AND '".$fecha2."'";
    $sql = 'SELECT
              ot.Order_ID AS "idOrden",
              sum(dt.product_price * dt.Product_Quantity) AS "precioOrden",
              dt.Product_Quantity AS "cantidadOrden"
            FROM
              order_details AS dt INNER JOIN order_table AS ot ON ot.Order_ID = dt.Order_ID
            WHERE
              ot.Order_Date BETWEEN "'.$fecha1.'" AND "'.$fecha2.'"
            GROUP BY ot.Order_ID
            ;';

    return ejecutarQuery($sql);
  }

  function buscarFechasPorRev($fecha1, $fecha2){

    $sql = 'SELECT sum(bookivia_books.Book_Price * order_details.Product_Quantity) as "revenue",
                   sum(bookivia_books.Book_Cost * order_details.Product_Quantity) as "cost",
                   sum(bookivia_books.Book_Price * order_details.Product_Quantity) - sum(bookivia_books.Book_Cost*order_details.Product_Quantity) as "profit"
              from bookivia_books join order_details
              ON bookivia_books.Book_ISBN = order_details.Book_ISBN
              join order_table
              on order_table.Order_ID = order_details.Order_ID
              where order_table.Order_Date between "'.$fecha1.'" and "'.$fecha2.'";';

      return ejecutarQuery($sql);
  }

  function buscarCategoria($descripcion){
    //$sql = "SELECT * FROM categorias WHERE descripcion = '".$descripcion."' ";
    $sql = 'SELECT
              `pb`.`Book_Genre` AS "categoria",
              `dt`.`Order_ID` AS "ordenID",
              `dt`.`Product_Quantity` AS "unidades",
              SUM( `dt`.`Product_Quantity` * `dt`.`Product_Price` ) AS "total"
            FROM
              `order_details` AS `dt` INNER JOIN `bookivia_books` AS `pb` ON `dt`.`Book_ISBN` = `pb`.`Book_ISBN`
            WHERE
              `pb`.`Book_Genre` = "'.$descripcion.'";';

    return ejecutarQuery($sql);
  }

  function buscarCategoriaPorRev($descripcion){

    $sql = 'SELECT sum(products_books.Product_Price * details_table.Order_Quantity) as "revenue",
                   sum(products_books.Product_Cost * details_table.Order_Quantity) as "cost",
                   sum(products_books.Product_Price * details_table.Order_Quantity) - sum(products_books.Product_Cost*details_table.Order_Quantity) as "profit"
            from products_books join details_table
            ON products_books.ISBN = details_table.ISBN
            join order_table
            on order_table.Order_ID = details_table.Order_ID
            where products_books.Genre =  "'.$descripcion.'";';

      return ejecutarQuery($sql);


  }

  function buscarCategorias(){
    //$sql = "SELECT * FROM categorias WHERE descripcion = '".$descripcion."' ";
    $sql = 'SELECT
              `pb`.`Book_Genre` AS "categoria",
              `dt`.`Order_ID` AS "ordenID",
              `dt`.`Product_Quantity` AS "unidades",
              SUM( `dt`.`Product_Quantity` * `dt`.`Product_Price` ) AS "total"
            FROM
              `order_details` AS `dt` INNER JOIN `bookivia_books` AS `pb` ON `dt`.`Book_ISBN` = `pb`.`Book_ISBN`
            WHERE
              `pb`.`Book_Genre` = "'.$descripcion.'";';

    return ejecutarQuery($sql);
  }

  function crearTabla($opcion,$fecha1,$fecha2,$categoria){

    $titulo = "";
    $data = "";
    $columnas = array();
    switch ($opcion) {
      case 1:
        $titulo = "Tabla Fechas";
        $data = buscarFechas($fecha1,$fecha2);
        $columnas = ["idOrden","precioOrden","cantidadOrden"];
        break;
      case 2:
        $titulo = "Tabla Categoría";
        $data = buscarCategoria($categoria);
        $columnas = ["categoria","unidades","total"];
        break;
      case 3:
        $data = buscarCategorias();
        break;
    }

    $thCabeceras = "";
    $tbody = "";
    foreach ($columnas as $key => $value) {
      $thCabeceras .= "<th>".$value."</th>";
    }

    foreach ($data as $i => $value) {
      $tbody .= "<tr>";
      foreach ($columnas as $j => $value2) {
        $tbody .= "<td>".$value[$value2]."</td>";
      }
      $tbody .= "</tr>";
    }

    $table = "";
    $table = "
      <h1> ".$titulo." </h1>
      <table>
        <tehead>
          <tr>
            ".$thCabeceras."
          </tr>
        </thead>
        <tbody>
          ".$tbody."
        </tbody>
      </table>
    ";

    return $table;

  }

?>
