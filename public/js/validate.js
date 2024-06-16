validateForm = () => {
    const require = document.querySelectorAll('.js-require');
    const form = document.querySelector('.js-form');
    const submitBtn = document.querySelector('.js-submit-btn');
    submitBtn.addEventListener('click', () => {
        let emptyFlag = false;
        let errorElmList = document.querySelectorAll('.js-error');
        errorElmList.forEach(e => {
            e.remove();
        });
        require.forEach(i => {
            let input = i.querySelector('input, select');
            if(input){
                let inputValue = input.value;
                if(!inputValue) {
                    emptyFlag = true;
                    let errorWrap = i.querySelector('.js-error-wrap');
                    let errorElm = document.createElement('span');
                    errorElm.className = 'js-error mt-2 block font-bold';
                    errorElm.style.color = '#b21f31';
                    errorElm.textContent = '必須項目です。';
                    errorWrap.appendChild(errorElm);
                }
            }
        });
        if(emptyFlag) {
            const firstError = document.querySelector('.js-error').closest('.js-require');
            if(firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });
            }
        } else {
            form.submit();
        }
    });
}

const confirmForm = () => {
    const form = document.querySelector('.js-confirm-form');
    const confirmBtn = document.querySelector('.js-confirm-btn');
    confirmBtn.addEventListener('click', () => {
        if(confirm('本当に削除しますか？')) {
            form.submit();
        }
    });
}

validateForm();
confirmForm();
