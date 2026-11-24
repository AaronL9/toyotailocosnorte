import Alpine from '../shared/alpine';

Alpine.data('contact_us_form', () => ({
    submitting: false,

    /**
     * Submits the contact form asynchronously.
     * 
     * @param {Event} event 
     */
    async submitForm(event) {
        event.preventDefault();
        this.submitting = true;

        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const result = await response.json();
            console.log('Form submitted successfully:', result);
            // Handle success (e.g., show a success message, reset the form, etc.)
        } catch (error) {
            console.error('Error submitting form:', error);
            // Handle error (e.g., show an error message)
        } finally {
            this.submitting = false;
        }
    },
}));

Alpine.start();