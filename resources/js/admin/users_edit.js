import Alpine from '../shared/alpine';
import HSOverlay from "@preline/overlay/non-auto";
import "@preline/remove-element";

Alpine.store('alert', {
    init() {
        console.log('alert store initialized');
    },
    show: false,
    message: '',

    toggle(message = '') {
        this.show = !this.show;
        this.message = message;
    }
});

Alpine.data('users_edit', () => ({
    init() {
        console.log('user_edit component initialized');
    },

    /**
     * Resets the password for the user.
     * 
     * @param {Event} event - The event object from the form submission.
     */
    async resetPassword(event) {
        const form = event.currentTarget;

        if (!(form instanceof HTMLFormElement)) return;

        const uri = form.action;

        try {
            const response = await fetch(uri, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: new FormData(form),
            });

            const data = await response.json();

            console.log(data);

            Alpine.store('alert').toggle('Password reset successfully.');
            document.querySelector('button[data-hs-remove-element="#dismiss-alert"]').addEventListener('click', () => {
                Alpine.store('alert').show = false;
            });
        } catch (error) {
            console.error('Error resetting password:', error);
        } finally {
            HSOverlay.close('#reset-password-modal');
        }
    }
}));

Alpine.start();