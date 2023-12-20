<!DOCTYPE html>
<html>
    <head>
        <title>Input Review</title>
    </head>
    <body>
        <h1>Input Review</h1>
        <form action="userinput.php" method="POST">
            <table border="1">
                <tr>
                    <td>Text Input</td>
                    <td><input type="text" 
                        name="text1" id="text1"
                        value="bubba"
                        required></td>
                </tr>
                <td>Phone input</td>
                    <td><input type="password" 
                        name="tel1" id="tel1"
                        value=""
                        ></td>
                </tr>
                <tr>
                    <td>input max length</td>
                    <td><input type="text" 
                        name="text2" id="text2"
                        maxlength="2"
                        size= "5"
                        value=""
                        required></td>
                </tr>
                <tr>
                    <td>DropDown</td>
                    <td>
                        <select name="title" id="title">
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms." selected>Ms.</option>
                            <option value="Guru">Guru</option>
                        </select>
                    </td>
                </tr>
				<tr>
					<td>Radio</td>
					<td>
					
						<input type = "radio" value = "Mr" id = "rd1" name = "rtittle"><label for = "rd1">Mr</label><br>
						<input type = "radio" value = "Msr" id = "rd2" name = "rtittle"><label for = "rd2">Msr</label><br>
						<input type = "radio" value = "Ms" id = "rd3" name = "rtittle"><label for = "rd3">Ms</label><br>
						<input type = "radio" value = "Dr" id = "rd4" name = "rtittle"><label for = "rd4">Dr</label><br>
					
					</td>
				</tr>
				<tr>
                    <td>checkbox</td>
                    <td><input type = "checkbox" id = "ba" name = "ba"><label for = "ba">same as billing</label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>

        <br><hr><br>

        <?php
            if(!empty($_POST['text1']))
            {
                print_r($_POST);

				var_dump($_POST);
				
				echo("Text boxes says: ". $_POST['text1']);

            }

        ?>
    </body>
</html>

