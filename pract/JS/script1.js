let inputs = document.querySelectorAll('input[data-rule]');
for (let input of inputs){
    input.addEventListener('blur', function () {
        let rule = this.dataset.rule;
        console.log(rule);
        let value = this.value;
        let check;
        check = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(value);
        this.classList.remove('invalid');
        this.classList.remove('valid');
        if (check){
            this.classList.add('valid');
            document.getElementById('js-inval').disabled = false;
        }
        else{
            this.classList.add('invalid');
            document.getElementById('js-inval').disabled = true;
        }
    })
}