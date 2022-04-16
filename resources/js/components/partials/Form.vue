<script setup>
import { reactive } from "vue";
import { useRouter, useRoute } from "vue-router";
import APIController from "../../controllers/api";
import { validateForm, populateForm } from "../../helpers";

const router = useRouter();

const action = window.location.pathname.split("/")[1].toUpperCase();
const contactID = useRoute().query.contact;

// const changedFields = ref([]);

const form = reactive({
    name: "",
    email: "",
    phone: "",
    country: "",
});

const errors = reactive({
    name: "",
    email: "",
    phone: "",
    country: "",
});

if (action === "UPDATE") {
    populateForm(form, contactID);
}

// watch for all the input fields that have changed
const handleFieldChange = (event) => {
    console.log(event.target);
};

const handleFormSubmit = async () => {
    const isValidForm = validateForm(form, errors);
    if (!isValidForm) return;
    let contact = null;

    // create new contact
    if (action === "CREATE") {
        contact = JSON.stringify(form);
        const { success } = await APIController.CreateContact(contact);
        if (success) router.push("/");
    }

    // update contact
    if (action === "UPDATE") {
        contact = JSON.stringify(form);
        const { success } = await APIController.UpdateContact(
            contact,
            contactID
        );

        if (success) router.push("/");
    }
    return {
        handleFieldChange,
        handleFormSubmit,
    };
};
</script>

<template>
    <form class="form" @submit.prevent="handleFormSubmit(action)">
        <section class="form__input">
            <div class="input-container">
                <label for="name">Name</label>
                <input
                    @change="handleFieldChange"
                    required
                    class="input"
                    id="name"
                    type="text"
                    placeholder="Enter name..."
                    name="name"
                    v-model="form.name"
                />
                <div class="error">{{ errors.name }}</div>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input
                    @change="handleFieldChange"
                    required
                    class="input"
                    id="email"
                    type="email"
                    placeholder="email@example.com"
                    name="email"
                    v-model="form.email"
                />
                <div class="error">{{ errors.email }}</div>
            </div>
            <div class="input-container">
                <label for="phone">Phone</label>
                <input
                    @change="handleFieldChange"
                    required
                    class="input"
                    id="phone"
                    type="number"
                    placeholder="9xx xxx xxx"
                    name="phone"
                    v-model="form.phone"
                />
                <div class="error">{{ errors.phone }}</div>
            </div>
            <div class="input-container">
                <label for="country">Country</label>
                <input
                    @change="handleFieldChange"
                    required
                    class="input"
                    id="country"
                    type="text"
                    placeholder="Country name..."
                    name="country"
                    v-model="form.country"
                />
                <div class="error">{{ errors.country }}</div>
            </div>
        </section>
        <section class="form__submit">
            <router-link class="stretch" to="/">
                <input class="btn btn--clear" type="button" value="cancel" />
            </router-link>
            <div class="stretch">
                <input class="btn btn--primary" type="submit" value="Save" />
            </div>
        </section>
    </form>
</template>
