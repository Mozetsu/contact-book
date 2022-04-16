<script>
export default {
    props: ["contacts"],
};
</script>

<template>
    <tr v-for="contact in contacts" :key="contact.id" class="table__row">
        <td class="table__content">{{ contact.name }}</td>
        <td class="table__content">{{ contact.email }}</td>
        <td class="table__content">{{ contact.phone }}</td>
        <td class="table__content">{{ contact.country }}</td>
        <td class="table__content controls">
            <input class="btn btn--clear" type="button" value="Delete" />
            <input class="btn btn--secondary" type="button" value="Edit" />
        </td>
    </tr>
</template>
