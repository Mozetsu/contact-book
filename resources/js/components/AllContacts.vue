<script>
import { ref } from "vue";
import Table from "./partials/Table.vue";
import APIController from "../controllers/api";
import { computed } from "@vue/reactivity";

export default {
    components: {
        Table,
    },
    setup() {
        const loading = true;
        const contacts = ref([]);
        const query = ref("");

        const fetchContacts = async () => {
            const { success, response } = await APIController.FetchContacts();
            if (success) contacts.value = response.contacts;
        };

        const filterContacts = (queryStr) => {
            query.value = queryStr;
        };

        const filteredContacts = computed(() => {
            if (!contacts.value.length) return;

            const data = contacts.value.filter((contact) => {
                if (
                    contact.name.includes(query.value) ||
                    contact.email.includes(query.value) ||
                    contact.phone.toString().includes(query.value) ||
                    contact.country.includes(query.value)
                )
                    return contact;
            });

            return data;
        });

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
            filteredContacts,
            fetchContacts,
            filterContacts,
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
        :filteredContacts="filteredContacts"
        @filterContacts="filterContacts"
        @removeContact="removeContact"
    />
</template>
