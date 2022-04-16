<script>
import APIController from "../../controllers/api";

export default {
    props: ["contacts"],
    emits: ["removeContact"],
    setup(props, context) {
        const deleteContact = async (id) => {
            const success = await APIController.DeleteContact(id);
            if (success) context.emit("removeContact", id);
        };

        return {
            deleteContact,
        };
    },
};
</script>

<template>
    <tr v-for="contact in contacts" :key="contact.id" class="table__row">
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
            <router-link class="stretch" :to="`/update/${contact.id}`">
                <input class="btn btn--secondary" type="button" value="Edit" />
            </router-link>
        </td>
    </tr>
</template>
