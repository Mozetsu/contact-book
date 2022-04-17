<script>
import { reactive } from "vue";
import APIController from "../../controllers/api";

export default {
    props: ["contacts", "loading", "filteredContacts"],
    emits: ["filterContacts", "removeContact"],
    setup(props, context) {
        const search = reactive({
            query: "",
        });

        const deleteContact = async (id) => {
            const success = await APIController.DeleteContact(id);
            if (success) context.emit("removeContact", id);
        };

        const filterContacts = (event) => {
            const query = event.target.value;
            context.emit("filterContacts", query);
        };

        // custom event handlers
        const removeContact = (id) => context.emit("removeContact", id);

        return {
            search,
            filterContacts,
            deleteContact,
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
                            @input="filterContacts"
                            id="search-bar"
                            type="text"
                            placeholder="Search contact..."
                            name="search"
                            v-model="search.query"
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
                <tr v-if="!contacts.length || !filteredContacts.length">
                    <td colspan="5" class="empty-table">
                        <h3>Looks like there's nothing here</h3>
                        <p>Much empty...</p>
                    </td>
                </tr>
                <!-- contacts -->
                <tr
                    v-else
                    :filteredContacts="filteredContacts"
                    @removeContact="removeContact"
                    v-for="contact in filteredContacts"
                    :key="contact.id"
                    class="table__row"
                >
                    <td class="table__content">{{ contact.name }}</td>
                    <td class="table__content">{{ contact.email }}</td>
                    <td class="table__content">{{ contact.phone }}</td>
                    <td class="table__content">{{ contact.country }}</td>
                    <td class="table__content controls">
                        <input
                            @click="deleteContact(contact.id)"
                            class="btn btn--clear"
                            type="button"
                            value="Delete"
                        />
                        <router-link
                            class="stretch"
                            :to="`/update?contact=${contact.id}`"
                        >
                            <input
                                class="btn btn--secondary"
                                type="button"
                                value="Edit"
                            />
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</template>
