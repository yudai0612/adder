var selected = document.querySelector('select');
selected.addEventListener('input', ()=>{
    console.log(selected.value);
});