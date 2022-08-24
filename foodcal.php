<?php
$title = "Food Calculator | GYM ";
include_once "layout/header.php";
include_once "layout/nav.php";
$breadcrumb = "Food Calculator";
include_once "layout/breadcrumb.php";

?>
<!-- style="overflow-x: auto; white-space: nowrap; " -->
<div >
<form style="overflow-x: auto; display:block; "action="" method="post">
    <div class="form-group offset-3 w-50 " style="position: relative;">
        <label  for=""></label>
        <input type="search" class="form-control pt-4 pb-4" style="font-size: 15px;" name="food" id="" required>
        <button type="submit"
            style="position: absolute;right: 8px;bottom: 0;font-size: 17px;background: none;border: none;"><i
                class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</form>
<?php if($_POST){
    function search($name)
    {
        $nutrition = array();
        if(($handle = fopen("nutrition.csv","r"))==True){
            $table = "<table id='dtHorizontalExample' class='table  
            table-striped table-bordered table-sm' cellspacing='0'
            style='overflow-x: auto; display:block; width:80%; height: 500px; margin: 0 auto; '>
            <thead>
            <tr>";
            while(($data = fgetcsv($handle,1000,","))==True){
            $nutrition[] = $data;
            }
            // echo(count($nutrition[0]));die;
            for ($i=0; $i < count($nutrition[0]); $i++) { 
                # code...
                $table .= "<th scope='col'>";
                $table .= $nutrition[0][$i];
                $table .= " </th> ";
                // print_r("<th scope='col'>$nutrition[0]</th>");die;
            }
            "</tr>
            </thead>
            <tbody>";
                // return $table;
        }
        $output = array();
        foreach ($nutrition as &$row) {
            // print_r($name);
            if(strpos(strtolower($row[0]),strtolower($name)) !== false){
                $output[] = $row;
            //  print_r($row);   
            }
        }
        // print_r(count($output));die;
        foreach ($output as $index) { 
            // print_r($index);  
                    $table  .= "<tr scope='row'>";
                    foreach ($index as $value) {
                        $table .= "<td>";
                        $table.= $value;
                        $table .= "</td>";
                    }
                    $table .= "</tr>";
                }
        $table .= "   
        </tbody>
        </table>";
        // print_r($output);
        return $table;
        }
        echo(search($_POST['food']));
    }
?>
</div>

<?php
unset($table);
include_once "layout/footer.php";
?>