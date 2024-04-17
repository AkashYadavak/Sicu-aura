function checkFormValidity()
{
    const form = document.getElementById('signup-form');
    // Function to check if any field in the form is empty
        const inputs = form.querySelectorAll('input[required]');
        let isEmpty = false;

        inputs.forEach(input =>{
            if(input.value.trim() === '')
            {
                isEmpty = true;
            }
        });

    
};






document.getElementById('login-button').onclick = function(){
    location.href = "login.php";
}


function validate_password()
{
    let pass = document.getElementById('password').value;
    let confirm_pass = document.getElementById('confirm_password').value;

    if(pass != confirm_pass)
    {
        document.getElementById('wrong_pass_alert').style.color = 'red';

        document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';

        // document.getElementById('create').disabled = true;

        // document.getElementById('create').style.backgroundColor = 'white';
        // document.getElementById('create').style.border = 'none';

        document.getElementById('create').style.display = 'none';
    }
    else
    {
        document.getElementById('wrong_pass_alert').style.color = 'green';

        document.getElementById('wrong_pass_alert').innerHTML = '🗹 Password Matched';

        // document.getElementById('create').disabled = false;

        // document.getElementById('create').style.backgroundColor =  ' rgba(38, 30, 59, 1)';
        // document.getElementById('create').style.border = '2px solid black';

        document.getElementById('create').style.display = 'inline';


    }
}


function createRandomString()
{   

    const len = document.getElementById('password').value.length;
    const word = document.getElementById('password').value + 'SICU-aura';

    let result = '';

    for(let i = 0; i<len; i++)
    {
        result += word.charAt(Math.floor(Math.random() * word.length));
    }

    document.getElementById('code').value = result;

    document.getElementById('special_access_code').innerHTML = result;

    document.getElementById('overlay').style.height = document.body.scrollHeight + 'px';
    document.getElementById('overlay').style.display = 'flex';  
    
}




