<script>
import { ref } from "vue";
import Table from "./partials/Table.vue";
import APIController from "../controllers/api";

export default {
    components: {
        Table,
    },
    setup() {
        const contacts = ref([]);
        const loading = true;

        const fetchContacts = async () => {
            contacts.value = await APIController.FetchContacts();
        };

        const removeTableContact = (id) => {
            // get removed contact id
            const contactID = contacts.value.findIndex(
                (contact) => contact.id === id
            );

            // remove contact
            contacts.value.splice(contactID, 1);
        };

        return {
            loading,
            contacts,
            fetchContacts,
            removeTableContact,
        };
    },
    created() {
        this.loading = false;
        this.contacts = this.fetchContacts();
    },
};
</script>

<template>
    <Table
        :contacts="contacts"
        :loading="loading"
        @removeContact="removeTableContact"
    />
</template>
