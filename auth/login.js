const passwordInput = document.getElementById('password'),
      showPassButton = document.querySelector('.showPass');
        

showPassButton.addEventListener('click', (e) => {
    e.preventDefault(); // Mencegah reload halaman
    
    if(passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPassButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
    }else {
        passwordInput.type = 'password';
        showPassButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
    }
});