<script>
import Contact from "./Contact.vue";

export default {
    components: { Contact },
    props: ["contacts", "loading", "currentContact", "currentContact"],
    emits: ["removeContact"],
    setup(props, context) {
        // custom event handlers
        const removeContact = (id) => context.emit("removeContact", id);

        return {
            removeContact,
        };
    },
};
</script>

<template>
    <main class="container">
        <table class="table">
            <thead class="table__head">
                <tr>
                    <th class="table__content">
                        <h3>Contacts</h3>
                    </th>
                    <th colspan="3" class="table__content">
                        <input
                            id="search-bar"
                            type="text"
                            placeholder="Search contact..."
                        />
                    </th>
                    <th class="table__content flex">
                        <router-link to="/create">
                            <input
                                class="btn btn--primary"
                                type="button"
                                value="Add Contact"
                            />
                        </router-link>
                    </th>
                </tr>
            </thead>
            <tbody class="table__body">
                <tr class="table__row">
                    <td class="table__filters">Name</td>
                    <td class="table__filters">Email</td>
                    <td class="table__filters">Phone</td>
                    <td class="table__filters">Country</td>
                </tr>
                <tr v-if="loading" class="table__row">
                    <td colspan="5" class="empty-table">
                        <p>Loading Contacts...</p>
                    </td>
                </tr>
                <tr v-if="!loading && !contacts.length">
                    <td colspan="5" class="empty-table">
                        <h3>Looks like there's nothing here</h3>
                        <p>Add a new contact to start</p>
                    </td>
                </tr>
                <Contact
                    v-if="!loading && contacts.length"
                    :contacts="contacts"
                    @removeContact="removeContact"
                />
            </tbody>
        </table>
    </main>
</template>
