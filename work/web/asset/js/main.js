var selected = document.querySelector('select');
const ckbxWrap = document.getElementById('ckbxWrap');

selected.addEventListener('input', ()=>{
    var bit = selected.value;
    while(ckbxWrap.firstChild) ckbxWrap.removeChild(ckbxWrap.firstChild);

    for(var i=bit-1; i>=0; i--){
        const ckbx = document.createElement('input');
        ckbx.type = 'checkbox';
        ckbx.id = `bit${i}`;
        ckbxWrap.appendChild(ckbx);
    }
});

ckbxWrap.addEventListener('click', ()=>{
    var bit = selected.value;
    for(var i=bit-1; i>=0; i--){
        var ck = [];
        ck[i] = document.getElementById(`bit${i}`);
        ck[i].name = `bit${i}`;
        ck[i].value = Number(ck[i].checked);
    }
});