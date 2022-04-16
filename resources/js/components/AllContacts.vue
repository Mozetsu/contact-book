<script>
import { ref } from "vue";
import Table from "./partials/Table.vue";
import APIController from "../controllers/api";

export default {
    name: "AllContacts",
    components: {
        Table,
    },
    setup() {
        const contacts = ref([]);
        const loading = true;

        const fetchContacts = async () => {
            contacts.value = await APIController.FetchContacts();
        };

        return {
            loading,
            contacts,
            fetchContacts,
        };
    },
    created() {
        this.loading = false;
        this.contacts = this.fetchContacts();
    },
};
</script>

<template>
    <Table :contacts="contacts" :loading="loading" />
</template>
