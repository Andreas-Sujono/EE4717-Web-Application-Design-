<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = 'f32ee';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_GET){
    foreach($_GET as $key => $value)
    {
        if(is_int($key)){
            $sql = "UPDATE Menu set price=$value where id=$key";
            $result = $conn->query($sql);
        }
    }
}

$sql = "SELECT * FROM `Menu`";
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ${$row["name"]} = $row["price"];
        ${'id_'.$row["name"]} = $row["id"];
    }
} else {
    echo "0 results";
}



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>JavaJam Coffee House</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="root">
        <header>
            <img 
                src="./headerImage.gif" 
                class="header-image"
            />
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="menu.php">Menu</a></li>
                    <li><a href="music.html">Music</a></li>
                    <li><a href="jobs.html">Jobs</a></li>
                    <li><a href="salesReport.php">Daily Sales Report</a></li>
                </ul>
            </nav>
            <div class="right-column">
                <h1 class="title">Coffee at JavaJam</h1>

                <table class="menu">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Quantity</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div type="checkbox" class="menu-checkbox menu-checkbox1"></div></td>
                            <td>Just Java</td>
                            <td>Regular house blend, decaffeinated coffee, or flavor of the day. <br/>
                                <form id="radio_group1">
                                    <input type="radio" value="<?php  echo ${"Just Java"}; ?>" name="Just Java" checked> Endless Cup 
                                        <span style="display:inline">
                                            $<?php  echo ${"Just Java"}; ?>
                                        </span>
                                        <input type="number" value="<?php  echo ${"Just Java"}; ?>" style="display:none" name="<?php  echo ${"id_Just Java"}; ?>"/>
                                    <input type="submit" value="edit price" style="display: none;"/>
                                </form> 
                            </td>
                            <td>
                                <input type="number" value="0" id="quantity1" min="0"/>
                            </td>
                            <td id="subtotal1"></td>
                        </tr>
                        <tr>
                            <td><div type="checkbox" class="menu-checkbox menu-checkbox2"></div></td>
                            <td>Cafe au Lait</td>
                            <td>House blended coffee infused into a smooth, steamed milk. <br/> 
                                <form id="radio_group2" name="etst">
                                    <input type="radio" value="<?php  echo ${"Cafe au Lait (single)"}; ?>" name="Cafe au Lait" checked> Single 
                                        <span style="display:inline">$<?php  echo ${"Cafe au Lait (single)"}; ?></span>
                                        <input type="number" value="<?php  echo ${"Cafe au Lait (single)"}; ?>" style="display:none" name="<?php  echo ${"id_Cafe au Lait (single)"}; ?>"/>

                                    <input type="radio" value="<?php  echo ${"Cafe au Lait (double)"}; ?>" name="Cafe au Lait"> Double 
                                        <span style="display:inline">$<?php  echo ${"Cafe au Lait (double)"}; ?>  </span>
                                        <input type="number" value="<?php  echo ${"Cafe au Lait (double)"}; ?>" style="display:none" name="<?php  echo ${"id_Cafe au Lait (double)"}; ?>"/>
                                    <input type="submit" value="edit price" style="display: none;"/>
                                </form>
                            </td>
                            <td>
                                <input type="number" value="0" id="quantity2" min="0"/>
                            </td>
                            <td id="subtotal2"></td>
                        </tr>
                        <tr>
                            <td><div type="checkbox" class="menu-checkbox menu-checkbox3"></div></td>
                            <td>Iced Cappucino</td>
                            <td>Sweetened expresso blended with icy-cold milk and served in a chilled glass. <br/> 
                                <form id="radio_group3">
                                    <input type="radio" value="<?php  echo ${"Iced Cappucino (single)"}; ?>" name="Iced Cappucino" checked> Single 
                                        <span style="display:inline">$<?php  echo ${"Iced Cappucino (single)"}; ?></span>
                                        <input type="number" value="<?php  echo ${"Iced Cappucino (single)"}; ?>" style="display:none" name="<?php  echo ${"id_Iced Cappucino (single)"}; ?>"/>
                                    <input type="radio" value="<?php  echo ${"Iced Cappucino (double)"}; ?>" name="Iced Cappucino"> Double 
                                        <span style="display:inline">$<?php  echo ${"Iced Cappucino (double)"}; ?></span>
                                        <input type="number" value="<?php  echo ${"Iced Cappucino (double)"}; ?>" style="display:none" name="<?php  echo ${"id_Iced Cappucino (double)"}; ?>"/>
                                    <input type="submit" value="edit price" style="display: none;"/>
                                </form>
                            </td>
                            <td>
                                <input type="number" value="0" id="quantity3" min="0"/>
                            </td>
                            <td id="subtotal3"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" id="totalprice"></td>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <i><small>
                    Copyright &copy; 2014 Javajam Coffee House <br/>
                    <a href="mailto:andreas@sujono.com">andreas@sujono.com</a>
                </small></i>
                
            </div>
        </footer>
    </div>
</body>
<script>

    let rows = document.querySelector('table tbody').getElementsByTagName("tr");
    let totalprice = document.querySelector('#totalprice')

    function calculate_price(){
        let total = 0;
        for(let i = 0 ; i < rows.length; i++){
            let current_row = rows[i]
            let cols = current_row.getElementsByTagName("td");

            let radio_input = cols[2].querySelectorAll(`form input[type="radio"]`)
            let radio_value = 0
            for(let j = 0 ; j < radio_input.length; j++){
                if(radio_input[j].checked)
                    radio_value = radio_input[j].value
            }

            let quantity_el = cols[3].querySelector('input')
            let subtotal_el = cols[4]
            let subtotal = parseFloat(quantity_el.value) * parseFloat(radio_value)
            total += subtotal

            subtotal_el.innerHTML = '$' + subtotal
        }
        totalprice.innerHTML = `Total Price: $${total}`
    }
    calculate_price()

    let boxClicked = null;

    function handleShowUpdate(form){
        if(boxClicked) return handleHideUpdate(form)
        boxClicked = form
        let spans = form.querySelectorAll('span')
        let inputs = form.querySelectorAll('input[type="number"]')
        let updateButton = form.querySelector('input[type="submit"]')

        updateButton.style.display = 'block'

        spans.forEach(span => {
            span.style.display = 'none'
        })
        inputs.forEach(input => {
            input.style.display = 'inline'
        })
    }

    function handleHideUpdate(form){
        boxClicked = null
        let spans = form.querySelectorAll('span')
        let inputs = form.querySelectorAll('input[type="number"]')
        let updateButton = form.querySelector('input[type="submit"]')

        updateButton.style.display = 'none'

        spans.forEach(span => {
            span.style.display = 'inline'
        })
        inputs.forEach(input => {
            input.style.display = 'none'
        })
    }


    for(let i = 0 ; i < rows.length; i++){
        let current_row = rows[i]
        let cols = current_row.getElementsByTagName("td");

        let box_update = cols[0].querySelector('div')
        let radio_input = cols[2].querySelectorAll('form input[type="radio"]')
        let quantity_el = cols[3].querySelector('input')

        box_update.onclick = () => handleShowUpdate(cols[2].querySelector('form'))      

        for(let j = 0 ; j < radio_input.length; j++){
            radio_input[j].onchange = () => {
                calculate_price()
            }
        }

        quantity_el.onchange = () => {
            calculate_price()
        }
    }

</script>
</html>
