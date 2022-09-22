
function send() {
    
    let password= document.getElementById('password');
    let confirm_password= document.getElementById('confirm_password');
    if(password.value != confirm_password.value){
        confirm_password.pattern= password.value;
    }

}

let form = document.querySelector('form');
let error= document.getElementsByClassName('error');
let submit= document.getElementsByClassName('submit');
let input= document.getElementsByTagName('input');

let check= form.dataset.check= true;
if(check){
	submit[0].classList.toggle('hide');
}

for(i=0; i<input.length; i++){
	input[i].disabled= false;
}

form.addEventListener('submit', function(event) {
	let promise = fetch('code.php', {
		method: 'POST',
		body: new FormData(this),
	}).then(
		response => {
			if (response.statusText == 'OK'){
				return response.json(); // ответ сервера
			}
		}
	).then(
		text => {
			if(text['status']){
				location="content.php"
			}else{
				error[0].innerHTML= text['message'];
				error[0].classList.toggle('show');
				setTimeout( ()=>{error[0].classList.toggle('show');}, 2000 );
			}
		}
	);
	event.preventDefault();
});











