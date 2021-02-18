/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function UsernameValidationCheck()
{
    var val = document.getElementById("txtUsername").value;
    if (val === "")
    {
        document.getElementById("err_username").innerHTML = "SORRY, USERNAME IS MISSING";
    }
    else if (val.length !== 15)
    {
        document.getElementById("err_username").innerHTML = "REQUIRED 15 DIGITS";
    }
    else
    {
        document.getElementById("err_username").innerHTML = "";
    }
}