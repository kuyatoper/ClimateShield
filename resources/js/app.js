const authForms = document.querySelectorAll('[data-auth-form]');

authForms.forEach((form) => {
	form.addEventListener('submit', (event) => {
		const password = form.querySelector('[name="password"]');
		const confirmation = form.querySelector('[name="password_confirmation"]');

		if (confirmation && password.value !== confirmation.value) {
			event.preventDefault();
			confirmation.setCustomValidity('Passwords must match.');
			confirmation.reportValidity();
			return;
		}

		if (confirmation) {
			confirmation.setCustomValidity('');
		}

		const submitButton = form.querySelector('button[type="submit"]');

		if (submitButton) {
			submitButton.disabled = true;
			submitButton.textContent = 'Please wait...';
		}
	});
});
//
