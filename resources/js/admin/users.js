
import Alpine from '../shared/alpine';

Alpine.data("users", () => ({
    users: [],
    pagination: {
        total: 0,
        currentPage: 0,
        pageCount: 0,
        next: null,
        previous: null,
    },
    loading: true,

    /**
     * Fetches users and pagination data.
     * @param {string} uri
     */
    async init(uri = "/api/users") {
        this.loading = true;

        try {
            const response = await fetch(uri);
            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || "Failed to fetch users.");
            }

            this.users = data.users;
            this.pagination = data.pagination;

        } catch (error) {
            console.error(error);
        } finally {
            this.loading = false;
        }
    },

    /**
     * Loads the next page of users.
     * @param {Event} e
     */
    async next(e) {
        const btn = e.currentTarget;

        if (!(btn instanceof HTMLButtonElement)) return;
        if (!btn.dataset.uri) return;

        await this.init(btn.dataset.uri);
    },

    /**
     * Loads the previous page of users.
     * @param {Event} e
     */
    async prev(e) {
        const btn = e.currentTarget;

        if (!(btn instanceof HTMLButtonElement)) return;
        if (!btn.dataset.uri) return;

        await this.init(btn.dataset.uri);
    },

    /**
     * Searches users by the entered keyword.
     * @param {Event} e
     */
    async search(e) {
        const target = e.currentTarget;

        if (!(target instanceof HTMLInputElement)) return;

        const uri = new URL("/api/users", location.origin);
        uri.searchParams.set("search", target.value);

        await this.init(uri.toString());
    },
}));

Alpine.start();