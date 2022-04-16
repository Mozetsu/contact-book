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

        const removeContact = (id) => {
            // get removed contact id
            const contactID = contacts.value.findIndex(
                (contact) => contact.id === id
            );

            // remove contact from contacts array
            contacts.value.splice(contactID, 1);
        };

        return {
            loading,
            contacts,
            fetchContacts,
            removeContact,
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
        @removeContact="removeContact"
    />
</template>
