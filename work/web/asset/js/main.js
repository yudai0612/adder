var selected = document.querySelector('select');
const ckbxWraps = [];
ckbxWraps[0] = document.getElementById('ckbxWrap0');
ckbxWraps[1] = document.getElementById('ckbxWrap1');

selected.addEventListener('input', ()=>{
    var bit = selected.value;

    ckbxWraps.forEach( ckbxWrap => {
        while(ckbxWrap.firstChild) ckbxWrap.removeChild(ckbxWrap.firstChild);
        for(var i=bit-1; i>=0; i--){
            const ckbx = document.createElement('input');
            ckbx.type = 'checkbox';

            switch (ckbxWrap.id) {
                case 'ckbxWrap0': ckbx.id = `former${i}`; break;
                case 'ckbxWrap1': ckbx.id = `latter${i}`; break;
                default: break;
            }
            ckbxWrap.appendChild(ckbx);
        }
    });
});

ckbxWraps.forEach( ckbxWrap => {
    ckbxWrap.addEventListener('click', ()=>{
        var bit = selected.value;
        for(var i=bit-1; i>=0; i--){
            var ck = [];
            switch (ckbxWrap.id) {
                case 'ckbxWrap0':
                    ck[i] = document.getElementById(`former${i}`);
                    ck[i].name = `former[]`;
                    break; 
                case 'ckbxWrap1':
                    ck[i] = document.getElementById(`latter${i}`);
                    ck[i].name = `latter[]`;
                    break;
                default:
                    break; 
            }
            var arr = [];
            arr.push( Number(ck[i].checked) );
            ck[i].value = arr; 
        }
    });
});