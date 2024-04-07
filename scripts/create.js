document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.create-account');
    const emailInput = document.getElementById('email');
    const userNameInput = document.getElementById('userName');
    const passwordInput = document.getElementById('password');
    const password2Input = document.getElementById('password2');

    function createError(message) {
        const error = document.createElement('div');
        error.textContent = message;
        error.classList.add('error-message');
        return error;
    }

    function removeErrors() {
        const errors = form.querySelectorAll('.error-message');
        errors.forEach(error => {
            error.remove();
        });
        form.querySelectorAll('input').forEach(input => {
            input.classList.remove('input-error');
        });
    }

    function applyError(input, message) {
        const error = createError(message);
        input.classList.add('input-error');
        input.after(error);
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validateForm() {
        let isValid = true;
        removeErrors();

        const email = emailInput.value.trim();
        const userName = userNameInput.value.trim();
        const password = passwordInput.value;
        const password2 = password2Input.value;

        if (!validateEmail(email)) {
            applyError(emailInput, '请输入有效的邮箱地址。');
            isValid = false;
        }

        if (userName.length < 4) {
            applyError(userNameInput, '用户名至少需要4个字符。');
            isValid = false;
        }

        if (password.length < 6) {
            applyError(passwordInput, '密码至少需要6个字符。');
            isValid = false;
        }

        if (password !== password2 || password2 === '') {
            applyError(password2Input, '验证密码不能为空或与密码不同。');
            isValid = false;
        }

        return isValid;
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        if (validateForm()) {
            alert('表单验证通过，准备提交数据！');

            form.submit();
        }
    });
});
