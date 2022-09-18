
function send() {
    
    let password= document.getElementById('password');
    let confirm_password= document.getElementById('confirm_password');
    if(password.value != confirm_password.value){
        confirm_password.pattern= password.value;
    }

}

let form = document.querySelector('form');

form.addEventListener('submit', function(event) {
	let promise = fetch('code.php', {
		method: 'POST',
		body: new FormData(this),
	}).then(
		response => {
			return response.json(); // ответ сервера
		}
	).then(
		text => {
            
		}
	);
	
});