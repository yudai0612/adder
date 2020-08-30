var select = document.querySelector('select');

const ckbxWraps = [];
ckbxWraps[0] = document.getElementById('ckbxWrap0');
ckbxWraps[1] = document.getElementById('ckbxWrap1');


select.addEventListener('input', ()=>{
    var bit = select.value;
    document.querySelector("input[type='hidden']").value = bit;

    ckbxWraps.forEach( ckbxWrap => {
        while(ckbxWrap.firstChild) ckbxWrap.removeChild(ckbxWrap.firstChild);
        for(var j=bit-1; j>=0; j--){
            const ckbx = document.createElement('input');
            ckbx.type = 'checkbox';

            switch (ckbxWrap.id) {
                case 'ckbxWrap0': ckbx.id = `former${j}`; break;
                case 'ckbxWrap1': ckbx.id = `latter${j}`; break;
                default: break;
            }
            ckbxWrap.appendChild(ckbx);
        }
    });
});

ckbxWraps.forEach( ckbxWrap => {
    ckbxWrap.addEventListener('click', ()=>{
        var bit = select.value;
        for(var j=bit-1; j>=0; j--){
            var ck = [];
            switch (ckbxWrap.id) {
                case 'ckbxWrap0':
                    ck[j] = document.getElementById(`former${j}`);
                    ck[j].name = `former[]`;
                    break; 
                case 'ckbxWrap1':
                    ck[j] = document.getElementById(`latter${j}`);
                    ck[j].name = `latter[]`;
                    break;
                default:
                    break; 
            }
            var arr = [];
            arr.push( Number(ck[j].checked) );
            ck[j].value = arr; 
        }
    });
});